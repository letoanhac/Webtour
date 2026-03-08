<style>
    body {
        background-color: lightblue;
    }

    .invoice-box {
        max-width: 800px;
        margin: 50px auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        color: #333;
        background: #fff;
        border-radius: 10px;
    }

    .invoice-box h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #2c3e50;
    }

    .info-table, .price-table {
        width: 100%;
        margin-bottom: 20px;
    }

    .info-table td, .price-table th, .price-table td {
        padding: 10px;
    }

    .info-table td:first-child {
        font-weight: bold;
        color: #555;
        width: 30%;
    }

    .price-table {
        border-collapse: collapse;
    }

    .price-table th {
        background-color: #f5f5f5;
        text-align: left;
    }

    .price-table th, .price-table td {
        border: 1px solid #ddd;
    }

    .total {
        text-align: right;
        font-weight: bold;
        font-size: 18px;
        color: #e74c3c;
    }
    .button {
        display:flex;
        gap:20px;
    }
    .btn-print,
    .btn-back {
        display: block;
        width: 200px;
        margin: 20px 0 0 120px;
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    .btn-print:hover,
    .btn-back:hover {
        background-color: #2980b9;
    }

    @media print {
        body * {
            visibility: hidden;
        }
        .invoice-box, .invoice-box * {
            visibility: visible;
        }
        .invoice-box {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .btn-print {
            display: none;
        }
        .btn-back {
            display: none;
        }
    }
</style>

<div class="invoice-box">
    <h2>HÓA ĐƠN ĐẶT TOUR</h2>
    <table class="info-table">
        <tr>
            <td>Mã đơn:</td>
            <td>{{ $bookingCheck->bookingID ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Người đặt:</td>
            <td>{{ $bookingCheck->user->fullName ?? 'Chưa đăng ký' }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $bookingCheck->user->email ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td>{{ $bookingCheck->user->phoneNumber ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Tên tour:</td>
            <td>{{ $bookingCheck->tour->title ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Ngày đặt:</td>
            <td>{{ \Carbon\Carbon::parse($bookingCheck->bookingDate)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td>Ngày xuất hóa đơn:</td>
            <td>{{ \Carbon\Carbon::parse($invoiceCheck->dateIssued ?? now())->format('d/m/Y') }}</td>
        </tr>
    </table>

    <table class="price-table">
        <tr>
            <th>Hạng mục</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
        <tr>
            <td>Người lớn</td>
            <td>{{ $bookingCheck->numAdults }}</td>
            <td>{{ number_format($bookingCheck->tour->priceAdult ?? 0, 0, ',', '.') }} đ</td>
            <td>{{ number_format($bookingCheck->numAdults * ($bookingCheck->tour->priceAdult ?? 0), 0, ',', '.') }} đ</td>
        </tr>
        <tr>
            <td>Trẻ em</td>
            <td>{{ $bookingCheck->numChildren }}</td>
            <td>{{ number_format($bookingCheck->tour->priceChild ?? 0, 0, ',', '.') }} đ</td>
            <td>{{ number_format($bookingCheck->numChildren * ($bookingCheck->tour->priceChild ?? 0), 0, ',', '.') }} đ</td>
        </tr>
        <tr>
            <td colspan="3" class="total">Tổng cộng:</td>
            <td class="total">{{ number_format($invoiceCheck->amount ?? 0, 0, ',', '.') }} đ</td>
        </tr>
    </table>

    @if ($bookingCheck->specialRequests)
        <p><strong>Yêu cầu đặc biệt:</strong> {{ $bookingCheck->specialRequests }}</p>
    @else
        <p><strong>Yêu cầu đặc biệt:</strong> Không có yêu cầu</p>
    @endif

    <p><strong>Trạng thái thanh toán:</strong> {{ $bookingCheck->paymentStatus }}</p>
    <div class="button">
        <button class="btn-print" onclick="window.print()">In hóa đơn</button>
        <button class="btn-back" onclick="window.location.href='{{ route('admin.tour.index') }}' ">Quay về</button>
    </div>
</div>
