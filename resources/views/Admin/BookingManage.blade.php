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
        .body {
            background: linear-gradient(135deg,rgb(64, 79, 94),rgb(89, 46, 110));
        }
        .admin-layout {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg,rgb(64, 79, 94),rgb(89, 46, 110));
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
        .button-cancel {
            height: 30px;
            width: 170px;
            margin:5px;
            text-align: center;
            background: linear-gradient(120deg,white,red);
            border-radius: 20px;

        }
        .button-accept {
            height: 30px;
            width: 170px;
            margin:5px;
            text-align: center;
            background: linear-gradient(120deg,white,green);
            border-radius: 20px;
        }
        .check-status .success-status {
            background: linear-gradient(310deg,rgb(196, 248, 210),rgb(162, 218, 8));
            border-radius: 30px;
            height: 25px;
            width: 200px;
        }
        .wait-status {
            background: linear-gradient(150deg,rgb(188, 188, 183),rgb(229, 225, 15));
            border-radius: 30px;
            height: 25px;
            width: 200px;
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
            <br>
            <h2 class="text-center mb-4">Quản lý Thanh toán Đặt tour</h2>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif
            <div style="margin-bottom: 15px; text-align: right;">
                <input type="text" id="searchInput" placeholder="Tìm kiếm..." style=" border-radius: 120px;background: linear-gradient(120deg,white,lightgreen); padding: 5px 10px; width: 250px;" onkeyup="filterTable()">
            </div>
            @if($bookings->count()>0)
            <div class="table-responsive" style="border-top-left-radius: 20px;border-top-right-radius: 20px">
                <table id="bookingTable" class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Checkout ID</th>
                            <th>Booking ID</th>
                            <th>Phương thức thanh toán</th>
                            <th>Ngày thanh toán</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Mã tour</th>
                            <th>Ngày đặt</th>
                            <th>Số người lớn</th>
                            <th>Số trẻ em</th>
                            <th>Tổng tiền</th>
                            <th>Yêu cầu đặc biệt</th>
                            <th>Hành động</th>
                            <th>In hóa đơn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $item)
                            <tr>
                                <td>{{'CE-'.$item->checkoutID }}</td>
                                <td>{{'BKID-'.$item->bookingID }}</td>
                                <td>{{ $item->paymentMethod }}</td>
                                <td>{{ $item->paymentDate }}</td>
                                <td>
                                    @if($item->paymentStatus === 'Đã thanh toán')
                                    <div class="check-status">
                                        <span class="success-status">Đã thanh toán</span>
                                    </div>
                                    @elseif($item->paymentStatus === 'Đang chờ thanh toán')
                                    <div class="check-status">
                                        <span class="wait-status">Đang chờ</span>
                                    </div>
                                    @else
                                    <div class="check-status">
                                        <span class="wait-status">{{ $item->paymentStatus }}</span>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ 'CTVTOAN-'.$item->tourID }}</td>
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
                                            <button type="submit" class="button-cancel">Hủy giao dịch</button>
                                        @else
                                            <input type="hidden" name="paymentStatus" value="Đã thanh toán">
                                            <button type="submit" class="button-accept">Xác nhận thanh toán</button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('invoice.admin.view',['bookingID'=>$item->bookingID]) }}">
                                        <button style="border-radius: 30px;background:linear-gradient(100deg,white,blue);">In Hóa đơn</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else 
            <div>
                <h1>Xin lỗi khách nghèo quá nên không có tiền để đặt tour</h1>
            </div>
            @endif
            <!-- Pagination controls -->
            <div id="pagination" style="margin-top: 15px; text-align: center;"></div>
        </main>
    </div>
    @include('Admin.blocks.overlay')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const rowsPerPage = 8;
        let currentPage = 1;
        let filteredRows = [];

        function setupPagination() {
            const tbody = document.querySelector('#bookingTable tbody');
            filteredRows = Array.from(tbody.querySelectorAll('tr'));
            currentPage = parseInt(localStorage.getItem('bookingCurrentPage')) || 1;
            const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
            if(currentPage > totalPages) currentPage = 1;
            showPage(currentPage);
            renderPagination();
            localStorage.removeItem('bookingCurrentPage');
        }
        function showPage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            filteredRows.forEach((row, i) => {
                row.style.display = (i >= start && i < end) ? '' : 'none';
            });
        }
        function renderPagination() {
            const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
            const paginationDiv = document.getElementById('pagination');
            paginationDiv.innerHTML = '';
            if (totalPages <= 1) return;
            const prevBtn = document.createElement('button');
            prevBtn.textContent = 'Prev';
            prevBtn.disabled = currentPage === 1;
            prevBtn.classList.add('btn', 'btn-secondary', 'mx-1');
            prevBtn.onclick = () => {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                    renderPagination();
                }
            };
            paginationDiv.appendChild(prevBtn);
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.textContent = i;
                btn.classList.add('btn', 'mx-1');
                if (i === currentPage) {
                    btn.classList.add('btn-primary');
                } else {
                    btn.classList.add('btn-outline-primary');
                }
                btn.onclick = () => {
                    currentPage = i;
                    showPage(currentPage);
                    renderPagination();
                };
                paginationDiv.appendChild(btn);
            }
            const nextBtn = document.createElement('button');
            nextBtn.textContent = 'Next';
            nextBtn.disabled = currentPage === totalPages;
            nextBtn.classList.add('btn', 'btn-secondary', 'mx-1');
            nextBtn.onclick = () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    showPage(currentPage);
                    renderPagination();
                }
            };
            paginationDiv.appendChild(nextBtn);
        }
        function filterTable() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const tbody = document.querySelector('#bookingTable tbody');

            filteredRows = Array.from(tbody.querySelectorAll('tr')).filter(row => {
                return row.textContent.toLowerCase().includes(input);
            });

            tbody.querySelectorAll('tr').forEach(r => r.style.display = 'none');

            currentPage = 1;
            showPage(currentPage);
            renderPagination();
        }
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', () => {
                localStorage.setItem('bookingCurrentPage', currentPage);
            });
        });

        window.onload = setupPagination;
    </script>
</body>
</html>