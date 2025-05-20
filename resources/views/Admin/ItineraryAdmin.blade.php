<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý Tour</title>
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
            box-shadow: inset 0 0 0 0 transparent;
            transition: 
                background-color 0.3s ease, 
                color 0.3s ease,
                box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.2s ease;
            cursor: pointer;
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
        .form-control {
            min-width: 100px;
        }
        .btn {
            padding: 4px 10px;
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
            <div class="container-fluid">
                <h2 class="text-center mb-4">Quản lý Tour</h2>

                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead style="background-color: black; color: white;" class="text-center">
                            <tr style="background-color: black;">
                                <th>Ngày</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Thông tin</th>
                                <th style="width: 150px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($itineraries as $item)
                            <tr>
                                <form method="POST" action="{{ route('admin.tour.itineraries.update', [$tour->tourID, $item->itineraryID]) }}">
                                    @csrf
                                    <td><input type="number" name="day" class="form-control" value="{{ $item->day }}" required min="1" /></td>
                                    <td><input type="text" name="title" class="form-control" value="{{ $item->title }}" required /></td>
                                    <td><input type="text" name="description" class="form-control" value="{{ $item->description }}" /></td>
                                    <td><input type="text" name="information" class="form-control" value="{{ $item->information }}" /></td>
                                    <td>
                                        <div class="d-grid gap-1">
                                            <button type="submit" class="btn btn-success btn-sm">Lưu</button>
                                </form>
                                <form method="POST" action="{{ route('admin.tour.itineraries.delete', [$tour->tourID, $item->itineraryID]) }}" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                                        </div>
                                    </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Chưa có lịch trình nào cho tour này.</td>
                            </tr>
                            @endforelse
                            <tr>
                                <form method="POST" action="{{ route('admin.tour.itineraries.store', $tour->tourID) }}">
                                    @csrf
                                    <td><input type="number" name="day" class="form-control" placeholder="Ngày" required min="1" /></td>
                                    <td><input type="text" name="title" class="form-control" placeholder="Tiêu đề" required /></td>
                                    <td><input type="text" name="description" class="form-control" placeholder="Mô tả" /></td>
                                    <td><input type="text" name="information" class="form-control" placeholder="Thông tin" /></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm w-100">Thêm</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
