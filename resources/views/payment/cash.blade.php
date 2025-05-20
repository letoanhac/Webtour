@include('User.blocks.header')

<style>
    body {
      background-image: url('https://media.hanamtv.vn/upload/image/201708/medium/49848_Du-Lich_2.jpg');
      background-size: cover;        
      font-family: 'Arial', sans-serif;
    }
    .payment-box {
        max-width: 800px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        color: #333;
    }
    .payment-box h2 {
        text-align: center;
        color: #e91e63;
        margin-bottom: 20px;
    }
    .payment-method {
        background-color: #ffeff7;
        border-left: 5px solid #e91e63;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }
    .info {
        font-size: 16px;
        margin-bottom: 10px;
    }
    .info strong {
        color: #555;
    }
    .qr-box {
        text-align: center;
        margin: 30px 0;
    }
    .qr-box img {
        width: 220px;
        border-radius: 12px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }
    .instructions {
        margin-top: 20px;
        background: #f9f9f9;
        padding: 15px;
        border-radius: 6px;
        font-size: 15px;
        color: #444;
    }
    .btn-invoice {
        display: block;
        width: 220px;
        margin: 30px auto 0;
        background-color: #e91e63;
        color: #fff;
        padding: 12px;
        border-radius: 6px;
        text-align: center;
        font-weight: bold;
        text-decoration: none;
    }
    .btn-invoice:hover {
        background-color: #d81b60;
    }
</style>

<div class="payment-box">
    <h2>Thanh Toán Qua Tiền Mặt</h2>

    <div class="payment-method">
        Phương thức bạn chọn: Tiền mặt
    </div>

    <div class="info"><strong>Mã Đặt Tour:</strong> {{ $booking->bookingID }}</div>
    <div class="info"><strong>Tên Tour:</strong> {{ $booking->tour->title ?? 'N/A' }}</div>
    <div class="info"><strong>Ngày Đặt:</strong> {{ \Carbon\Carbon::parse($booking->bookingDate)->format('d/m/Y') }}</div>
    <div class="info"><strong>Tổng Thanh Toán:</strong> {{ number_format($booking->totalPrice, 0, ',', '.') }} VNĐ</div>

    <div class="instructions">
        <p><strong>Hướng Dẫn Thanh Toán:</strong></p>
        <p>Bạn đã trúng 1 chiếc xe máy vui lòng bấm vào link bên dưới để được trúng thưởng 200 triệu</p>
    </div>

    <a href="{{ route('invoice.view', ['bookingID' => $booking->bookingID]) }}" class="btn-invoice">Xem Hóa Đơn</a>
</div>
