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
        table th, table td {
            vertical-align: middle !important;
            white-space: nowrap;
        }
        .button-cancel {
            height: 30px;
            width: 170px;
            margin:5px;
            text-align: center;
            background: rgba(255, 0, 0, 0.858);
            color: white;
            border-radius: 20px;
        }
        .button-accept {
            height: 30px;
            width: 170px;
            margin:5px;
            text-align: center;
            background: green;
            color: white;
            border-radius: 20px;
        }
        .check-status .success-status {
            background: green;
            padding: 2px 8px;
            border-radius: 10px;
            color: white;
        }
        .wait-status {
            background: yellow;
            padding: 2px 8px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <nav class="sidebar">
            @include('Admin.blocks.left-menu')
        </nav>

        <main class="admin-content">
            <br>
            <h2 class="text-center mb-4">Quản lý Thanh toán Đặt tour</h2>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif
            <div style="margin-bottom: 15px; text-align: right;">
                <input type="text" id="searchInput" placeholder="Tìm kiếm..." style=" border-radius: 120px; padding: 5px 10px; width: 250px;" onkeyup="filterTable()">
            </div>
            @if($bookings->count()>0)
            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                <table id="bookingTable" class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Checkout ID</th>
                            <th>Booking ID</th>
                            <th>Mã tour</th>
                            <th>Phương thức thanh toán</th>
                            <th>Ngày thanh toán</th>
                            <th>Trạng thái thanh toán</th>                   
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
                                <td>{{ 'CTVTOAN-'.$item->tourID }}</td>
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
                                <td>{{ $item->bookingDate }}</td>
                                <td>{{ $item->numAdults }}</td>
                                <td>{{ $item->numChildren }}</td>
                                <td>{{ number_format($item->totalPrice, 0, ',', '.') }}đ</td>
                                <td>
                                    @if($item->specialRequests)
                                        <button class="btn btn-info btn-sm" onclick="showSpecialRequests('{{ $item->bookingID }}', '{{ addslashes($item->specialRequests) }}')" title="Xem yêu cầu đặc biệt">
                                            <i class="fas fa-eye"></i> Xem
                                        </button>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
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
                                        <button style="border-radius: 30px; color:white; background:linear-gradient(rgb(63, 63, 255));">In Hóa đơn</button>
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

            <div class="modal fade" id="specialRequestsModal" tabindex="-1" aria-labelledby="specialRequestsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="specialRequestsModalLabel">Yêu cầu đặc biệt - Booking ID: <span id="modalBookingId"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="modalSpecialRequests"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
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

        function showSpecialRequests(bookingId, specialRequests) {
            document.getElementById('modalBookingId').textContent = bookingId;
            document.getElementById('modalSpecialRequests').textContent = specialRequests;
            const modal = new bootstrap.Modal(document.getElementById('specialRequestsModal'));
            modal.show();
        }
    </script>
</body>
</html>