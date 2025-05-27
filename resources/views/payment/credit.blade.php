@include('clients.blocks.header')
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
        border: 1px solid #eee;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        background: #fff;
        border-radius: 10px;
        color: #333;
    }
    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .info p {
        margin: 8px 0;
    }
    .highlight {
        background-color: #ffeb3b;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
    .btn-invoice {
        display: block;
        width: 200px;
        margin: 30px auto 0;
        background-color: #3498db;
        color: #fff;
        padding: 12px 20px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
    }
    .btn-invoice:hover {
        background-color: #2980b9;
    }
</style>

<div class="payment-box">
    <h2>Thanh Toán Bằng Tiền Mặt</h2>

    <div class="highlight">💵 Phương thức bạn chọn: Tiền Mặt</div>

    <div class="info">
        <p><strong>Mã Đặt Tour:</strong> {{ $booking->bookingID }}</p>
        <p><strong>Tên Tour:</strong> {{ $booking->tour->title }}</p>
        <p><strong>Ngày Đặt:</strong> {{ \Carbon\Carbon::parse($booking->bookingDate)->format('d/m/Y') }}</p>
        <p><strong>Tổng Thanh Toán:</strong> {{ number_format($booking->totalPrice, 0, ',', '.') }} VNĐ</p>
        <p><strong>Hướng Dẫn Thanh Toán:</strong></p>
        <p>Vui lòng đến trực tiếp quầy thanh toán hoặc liên hệ nhân viên hướng dẫn để hoàn tất quá trình thanh toán. Sau khi hoàn tất, bạn có thể xem và in hóa đơn để lưu trữ.</p>
    </div>

    <a href="{{ route('invoice.view', ['bookingID' => $booking->bookingID]) }}" class="btn-invoice">Xem Hóa Đơn</a>
</div>
