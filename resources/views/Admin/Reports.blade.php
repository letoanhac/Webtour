<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Báo cáo & Thống kê</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <style>
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #17252a;
        }
        .admin-content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border-left: 5px solid #3aafa9;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            background-color: #f0fdfa;
        }
        .stat-card h3 {
            font-size: 28px;
            font-weight: 700;
            color: #17252a;
            margin-bottom: 5px;
        }
        .stat-card p {
            margin: 0;
            color: #6c757d;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }
        .detail-table-section {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            display: none;
        }

        .search-container {
            max-width: 400px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <nav class="sidebar">
            @include('Admin.blocks.left-menu')
        </nav>

        <main class="admin-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark m-0">Thống kê & Báo cáo hệ thống</h2>
                    <div class="search-container">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" id="searchInput" class="form-control border-start-0 ps-0" placeholder="Tìm kiếm" onkeyup="filterTable()">
                        </div>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-card" data-key="booking">
                        <p><i class="fas fa-check-circle me-2 text-primary"></i>Lượt đặt thành công</p>
                        <h3>{{ $totalBookings }}</h3>
                    </div>
                    <div class="stat-card" data-key="user">
                        <p><i class="fas fa-users me-2 text-success"></i>Tổng người dùng</p>
                        <h3>{{ $totalUsers }}</h3>
                    </div>
                    <div class="stat-card" data-key="revenue">
                        <p><i class="fas fa-money-bill-wave me-2 text-warning"></i>Tổng doanh thu</p>
                        <h3>{{ number_format($totalRevenue) }}₫</h3>
                    </div>
                    <div class="stat-card" data-key="tour">
                        <p><i class="fas fa-map-marked-alt me-2 text-danger"></i>Tổng số tour</p>
                        <h3>{{ $totalTours }}</h3>
                    </div>
                </div>

                <!-- Detail sections -->
                <div id="detail-booking" class="detail-table-section">
                    <h4 class="mb-3 fw-bold">Đặt tour có giá trị cao nhất</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID Booking</th>
                                    <th>Tên Tour</th>
                                    <th>Khách hàng</th>
                                    <th>Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($highestBooking as $hb)
                                <tr>
                                    <td>#{{ $hb->bookingID }}</td>
                                    <td>{{ $tours[$hb->tourID]->title ?? 'Không rõ' }}</td>
                                    <td>{{ $users[$hb->userID]->fullName ?? ($users[$hb->userID]->username ?? 'Không rõ') }}</td>
                                    <td class="fw-bold text-success">{{ number_format($hb->totalPrice) }}₫</td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center text-muted">Không có dữ liệu.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="detail-user" class="detail-table-section">
                    <h4 class="mb-3 fw-bold">Khách hàng thân thiết nhất</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID User</th>
                                    <th>Họ và tên</th>
                                    <th>Tổng số lượt đặt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topUser as $tu)
                                <tr>
                                    <td>#{{ $tu->userID }}</td>
                                    <td>{{ $users[$tu->userID]->fullName ?? ($users[$tu->userID]->username ?? 'Không rõ') }}</td>
                                    <td class="fw-bold text-primary">{{ $tu->total }} lượt</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center text-muted">Không có dữ liệu.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="detail-revenue" class="detail-table-section">
                    <h4 class="mb-3 fw-bold">Chi tiết doanh thu giao dịch</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Tour</th>
                                    <th>Ngày đặt</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookingDetails as $r)
                                <tr>
                                    <td>#{{ $r->bookingID }}</td>
                                    <td>{{ $tours[$r->tourID]->title ?? 'Không rõ' }}</td>
                                    <td>{{ $r->bookingDate }}</td>
                                    <td class="fw-bold text-success">{{ number_format($r->totalPrice) }}₫</td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center text-muted">Không có dữ liệu giao dịch.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="detail-tour" class="detail-table-section">
                    <h4 class="mb-3 fw-bold">Tour có sức hút nhất</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID Tour</th>
                                    <th>Tên Tour</th>
                                    <th>Số lượt khách đặt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mostBookedTour as $mbt)
                                <tr>
                                    <td>#{{ $mbt->tourID }}</td>
                                    <td>{{ $tours[$mbt->tourID]->title ?? 'Không rõ' }}</td>
                                    <td class="fw-bold text-danger">{{ $mbt->total }} lượt</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center text-muted">Không có dữ liệu.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

    @include('Admin.blocks.overlay')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const statCards = document.querySelectorAll('.stat-card');
        const detailSections = document.querySelectorAll('.detail-table-section');

        statCards.forEach(card => {
            card.addEventListener('click', () => {
                const key = card.getAttribute('data-key');
                detailSections.forEach(section => section.style.display = 'none');
                
                const target = document.getElementById(`detail-${key}`);
                if (target) {
                    target.style.display = 'block';
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        function filterTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const visibleSection = Array.from(detailSections).find(s => s.style.display === 'block');
            
            if (visibleSection) {
                const rows = visibleSection.querySelectorAll("tbody tr");
                rows.forEach(row => {
                    const text = row.innerText.toLowerCase();
                    row.style.display = text.includes(filter) ? "" : "none";
                });
            }
        }
    </script>
</body>
</html>
