<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Checkout;

class VnpayController extends Controller
{
    protected function encodeData($data)
    {
        return str_replace('%20', '+', rawurlencode($data));
    }
    private function sortObject($obj)
    {
        $sorted = [];
        $str = array_keys($obj);
        sort($str);
        foreach ($str as $key) {
            $originalKey = $key;
            $sorted[$key] = str_replace('%20', '+', rawurlencode($obj[$originalKey]));
        }
        return $sorted;
    }
    public function createPayment($bookingID)
    {
        $booking = Booking::find($bookingID);
        if (!$booking) {
            return abort(404, "Booking not found");
        }

        // Cấu hình VNPAY
        $vnp_TmnCode = "G8WW4VH9";
        $vnp_HashSecret = "G74QSNAKSJZR2ZR2XPNAAAC7A5IZ9SPL";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('/vnpay-return');

        $vnp_TxnRef = $booking->bookingID;
        $vnp_OrderInfo = 'Thanh toán đơn tour #' . $booking->bookingID;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $booking->totalPrice * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);

        // Dùng hàm sortObject để encode và sửa %20 thành +
        $data = $this->sortObject($inputData);

        $hashData = "";
        $query = "";
        foreach ($data as $key => $value) {
            $hashData .= $key . "=" . $value . "&";
            $query .= $key . "=" . $value . "&";
        }
        $hashData = rtrim($hashData, "&");
        $query = rtrim($query, "&");

        // Tạo chữ ký
        $vnp_SecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        $paymentUrl = $vnp_Url . "?" . $query . "&vnp_SecureHash=" . $vnp_SecureHash;

        return redirect($paymentUrl);
    }
    public function vnpayReturn(Request $request)
    {
        $inputData = $request->all();
        $vnp_HashSecret = 'G74QSNAKSJZR2ZR2XPNAAAC7A5IZ9SPL';
        $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';
        unset($inputData['vnp_SecureHash']);
        unset($inputData['vnp_SecureHashType']);
        $sortedInput = $this->sortObject($inputData);
        $hashData = '';
        foreach ($sortedInput as $key => $value) {
            $hashData .= $key . '=' . $value . '&';
        }
        $hashData = rtrim($hashData, '&');
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                $bookingID = $inputData['vnp_TxnRef'];
                $amount = $inputData['vnp_Amount'] / 100;
                $transactionId = $inputData['vnp_TransactionNo'];
                $booking = Booking::where('bookingID', $bookingID)->first();
                if (!$booking) {
                    return "Không tìm thấy bookingID: $bookingID";
                }
                DB::beginTransaction();
                try {
                    $booking->update([
                        'paymentStatus' => 'Đã thanh toán',
                    ]);
                    Checkout::updateOrCreate(
                        ['bookingID' => $booking->bookingID],
                        [
                            'paymentMethod' => 'vnpay',
                            'paymentDate' => now(),
                            'paymentStatus' => 'Đã thanh toán',
                            'transactionID' => $transactionId,
                        ]
                    );

                    DB::commit();
                    return redirect()->route('invoice.generate', ['bookingID' => $bookingID]);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return "Lỗi khi lưu dữ liệu: " . $e->getMessage();
                }
            } else {
                $bookingID = $inputData['vnp_TxnRef'] ?? null;
                return redirect()->route('booking.show', ['bookingID' => $bookingID])
                    ->with('error', 'Bạn đã huỷ giao dịch.');
            }
        } else {
            return "Sai chữ ký. Vui lòng thử lại.";
        }
    }


}
