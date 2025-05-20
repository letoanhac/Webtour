<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý Thanh toán Đặt tour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        .admin-layout {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            box-shadow: 3px 0 10px rgba(0,0,0,0.1);
            border-radius: 0 15px 15px 0;
            padding: 30px 20px;
            user-select: none;
        }

        .sidebar h4 {
            color: #1e40af;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 40px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 18px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #334155;
            font-weight: 600;
            font-size: 16px;
            padding: 12px 20px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #cbd5e1;
            color: #1e40af;
            box-shadow: inset 5px 0 0 0 #1e40af;
            transform: translateX(8px);
        }

        .sidebar a.active {
            background-color: #1e40af;
            color: #f8fafc;
            box-shadow: inset 5px 0 0 0 #1e40af;
            transform: translateX(8px);
        }

        .admin-content {
            flex-grow: 1;
            padding: 30px;
            background-color: #fff;
            overflow-x: auto;
        }

        table th, table td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <nav class="sidebar">
            @include('Admin.blocks.left-menu')
        </nav>

        <main class="admin-content">
            @include('Admin.blocks.manage-top')
            <h2 class="text-center mb-4">Quản lý Thanh toán Đặt tour</h2>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Checkout ID</th>
                            <th>Booking ID</th>
                            <th>Phương thức thanh toán</th>
                            <th>Ngày thanh toán</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Mã giao dịch</th>
                            <th>Ngày đặt</th>
                            <th>Số người lớn</th>
                            <th>Số trẻ em</th>
                            <th>Tổng tiền</th>
                            <th>Yêu cầu đặc biệt</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $item)
                            <tr>
                                <td>{{ $item->checkoutID }}</td>
                                <td>{{ $item->bookingID }}</td>
                                <td>{{ $item->paymentMethod }}</td>
                                <td>{{ $item->paymentDate }}</td>
                                <td>
                                    @if($item->paymentStatus === 'Đã thanh toán')
                                        <span class="badge bg-success">Đã thanh toán</span>
                                    @elseif($item->paymentStatus === 'Đang chờ thanh toán')
                                        <span class="badge bg-warning text-dark">Đang chờ</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $item->paymentStatus }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->transactionID }}</td>
                                <td>{{ $item->bookingDate }}</td>
                                <td>{{ $item->numAdults }}</td>
                                <td>{{ $item->numChildren }}</td>
                                <td>{{ number_format($item->totalPrice, 0, ',', '.') }}đ</td>
                                <td>{{ $item->specialRequests }}</td>
                                <td>
                                    <form action="{{ route('admin.booking.updateStatus', $item->bookingID) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if($item->paymentStatus === 'Đã thanh toán')
                                            <input type="hidden" name="paymentStatus" value="Đang chờ thanh toán">
                                            <button type="submit" class="btn btn-warning btn-sm">Chuyển Chưa thanh toán</button>
                                        @else
                                            <input type="hidden" name="paymentStatus" value="Đã thanh toán">
                                            <button type="submit" class="btn btn-success btn-sm">Đánh dấu Đã thanh toán</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
