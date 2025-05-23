@include('User.blocks.header')

<style>
    h2 {
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    a {
        color: green;
    }
    .table {
        background: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }
    .table thead {
        background-color: #2c3e50;
        color: #fff;
    }
    .table th, .table td {
        vertical-align: middle !important;
        text-align: center;
        padding: 12px 8px;
    }
    .table tbody tr:nth-child(odd) {
        background-color: #f2f6fa;
    }
    .table tbody tr:hover {
        background-color: #dfeffc;
        transition: 0.3s;
    }
    .container {
        max-width: 1000px;
        margin: auto;
    }
    .no-history-message {
        text-align: center;
        color: #999;
        font-size: 18px;
        padding: 40px 0;
    }
</style>

<div class="container mt-4">
    <h2>Lịch sử đặt tour của bạn</h2>

    @if($histories->count())
        @php
            $displayedBookings = [];
            $stt = 1;
        @endphp

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã số đặt tour</th>
                    <th>Tên tour</th>
                    <th>Ngày đặt</th>
                    <th>Số người lớn</th>
                    <th>Trẻ em</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức</th>
                    <th>Hành động</th>
                    <th>Thời gian ghi nhận</th>
                    <th>Ghi chú</th>
                    <th>Tình trạng thanh toán</th>
                    <th>Hóa đơn</th>
                    <th>Đánh giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $item)
                    @php
                        $booking = $item->booking;
                        $bookingID = $booking->bookingID ?? null;
                    @endphp

                    @if($bookingID && !in_array($bookingID, $displayedBookings))
                        @php $displayedBookings[] = $bookingID; @endphp
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>{{ 'BKID-'.$bookingID }}</td>
                            <td>{{ $booking->tour->title ?? 'N/A' }}</td>
                            <td>{{ isset($booking->bookingDate) ? \Carbon\Carbon::parse($booking->bookingDate)->format('d/m/Y') : 'N/A' }}</td>
                            <td>{{ $booking->numAdults ?? 'N/A' }}</td>
                            <td>{{ $booking->numChildren ?? 'N/A' }}</td>
                            <td>{{ isset($booking->totalPrice) ? number_format($booking->totalPrice, 0, ',', '.') . 'đ' : 'N/A' }}</td>
                            <td>{{ $booking->checkout->paymentMethod ?? 'N/A' }}</td>
                            <td>{{ $item->actionType ?? 'N/A' }}</td>
                            <td>{{ isset($item->timestamp) ? \Carbon\Carbon::parse($item->timestamp)->format('d/m/Y H:i') : 'N/A' }}</td>
                            <td>{{ $booking->specialRequests ?? 'Không có' }}</td>
                            <td>{{ $booking->paymentStatus ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('invoice.view', ['bookingID' => $bookingID]) }}">Xem hóa đơn</a>
                            </td>
                            <td>
                                <a href="{{ route('reviews.create', ['tourID' => $booking->tour->tourID ?? 0]) }}">Gửi đánh giá</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-history-message">Bạn chưa có lịch sử đặt tour nào.</p>
    @endif
</div>
