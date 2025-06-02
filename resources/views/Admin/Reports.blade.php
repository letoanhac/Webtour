<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thống kê tổng quan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg,rgb(64, 79, 94),rgb(89, 46, 110));
        }

        .container {
            display: flex;
        }

        .main-content {
            flex: 1;
            padding: 20px 40px;
        }

        .header-title {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
            color:rgb(183, 199, 225);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .stat-box {
            background: linear-gradient(135deg, #dbeafe, #93c5fd);
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            color: #1e3a8a;
            transition: transform 0.2s ease;
            cursor: pointer;
        }

        .stat-box:hover {
            transform: translateY(-4px);
        }

        .stat-box h3 {
            font-size: 32px;
            margin: 0;
        }

        .stat-box p {
            margin: 5px 0 0;
            font-weight: 600;
        }

        .detail-table {
            margin-top: 40px;
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: none;
        }

        .detail-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .detail-table th, .detail-table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        .detail-table th {
            background-color: #f1f5f9;
            color: #1e293b;
        }

        .detail-table h2 {
            margin-bottom: 20px;
            color: #1e293b;
        }
        .return-btn {
            border-radius:20px;
            height: 50px;
            width : 150px;
            background: linear-gradient(100deg, green, red);
        }
    </style>
</head>
<body>
    @include('Admin.blocks.manage-top')
    <div class="container">
        <div class="main-content">
            <div class="header-title">Thống kê tổng quan hệ thống</div>
            <br>
            <a href="{{ route('admin.tour.index') }}">
                <button class="return-btn">Quay lại trang chính</button>
            </a>
            <div style="border-radius:30px; width :400px;height:100px; ;margin-left: 1400px;background: linear-gradient(135deg,rgb(105, 117, 99),rgb(254, 223, 66));">
                <div style="margin-bottom: 30px; text-align: center; ">
                    <label style="margin-bottom: 10px;display:block;">Tìm kiếm thông tin dữ liệu chi tiết</label>
                    <input type="text" id="searchInput" placeholder="Tìm kiếm..." style="padding: 5px 10px;height:30px ;width: 350px; border-radius:30px;" onkeyup="filterTable()">
                </div>
            </div>
            <div class="stats-grid">
                <div class="stat-box" data-key="booking">
                    <h3>{{ $totalBookings }}</h3>
                    <p>Lượt đặt tour thành công</p>
                </div>
                <div class="stat-box" data-key="user">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Tổng người dùng</p>
                </div>
                <div class="stat-box" data-key="revenue">
                    <h3>{{ number_format($totalRevenue) }}₫</h3>
                    <p>Tổng doanh thu</p>
                </div>
                <div class="stat-box" data-key="tour">
                    <h3>{{ $totalTours }}</h3>
                    <p>Tổng số tour</p>
                </div>
            </div>
            <div id="detail-booking" class="detail-table">
                <h2>Đặt tour có giá trị cao nhất</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tour</th>
                            <th>Khách</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($highestBooking)
                        <tr>
                            <td>{{ $highestBooking->bookingID }}</td>
                            <td>{{ $tours[$highestBooking->tourID]->title ?? 'Không rõ' }}</td>
                            <td>{{ $users[$highestBooking->userID]->fullname ?? 'Không rõ' }}</td>
                            <td>{{ number_format($highestBooking->totalPrice) }}₫</td>
                        </tr>
                        @else
                        <tr><td colspan="4">Không có dữ liệu.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div id="detail-user" class="detail-table">
                <h2>Người dùng có nhiều lượt đặt tour nhất</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Số lượt đặt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($topUser)
                        <tr>
                            <td>{{ $topUser->userID }}</td>
                            <td>{{ $users[$topUser->userID]->fullname ?? 'Không rõ' }}</td>
                            <td>{{ $topUser->total }}</td>
                        </tr>
                        @else
                        <tr><td colspan="3">Không có dữ liệu.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Chi tiết: Từng lượt đặt tour -->
            <div id="detail-revenue" class="detail-table">
                <h2>Chi tiết các lượt đặt tour và doanh thu</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tour</th>
                            <th>Ngày đặt</th>
                            <th>Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookingDetails as $r)
                        <tr>
                            <td>{{ $r->bookingID }}</td>
                            <td>{{ $tours[$r->tourID]->title ?? 'Không rõ' }}</td>
                            <td>{{ $r->bookingDate }}</td>
                            <td>{{ number_format($r->totalPrice) }}₫</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Chi tiết: Tour được đặt nhiều nhất -->
            <div id="detail-tour" class="detail-table">
                <h2>Tour có lượt đặt nhiều nhất</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Lượt đặt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mostBookedTour)
                        <tr>
                            <td>{{ $mostBookedTour->tourID }}</td>
                            <td>{{ $tours[$mostBookedTour->tourID]->title ?? 'Không rõ' }}</td>
                            <td>{{ $mostBookedTour->total }}</td>
                        </tr>
                        @else
                        <tr><td colspan="3">Không có dữ liệu.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const statBoxes = document.querySelectorAll('.stat-box');
        const detailTables = document.querySelectorAll('.detail-table');

        statBoxes.forEach(box => {
            box.addEventListener('click', () => {
                const key = box.getAttribute('data-key');
                detailTables.forEach(table => table.style.display = 'none');
                const selected = document.getElementById(`detail-${key}`);
                if (selected) selected.style.display = 'block';
            });
        });
        function filterTable() {
        const input = document.getElementById("searchInput");
        const filter = input.value.toLowerCase();
        const tables = document.querySelectorAll(".detail-table table");

        tables.forEach(table => {
            const rows = table.querySelectorAll("tbody tr");
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    }
    </script>
</body>
</html>
