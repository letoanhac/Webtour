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
                        <thead class="table-dark">
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th>Giá NL</th>
                                <th>Giá TE</th>
                                <th>Thời gian</th>
                                <th>Điểm đến</th>
                                <th>Chỗ trống</th>
                                <th>Lịch trình</th>
                                <th>Ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                                <tr>
                                    <form action="{{ route('admin.tour.update', $tour->tourID) }}" method="POST">
                                        @csrf
                                        <td><input name="title" class="form-control" value="{{ $tour->title }}"></td>
                                        <td><input name="description" class="form-control" value="{{ $tour->description }}"></td>
                                        <td><input name="quantity" type="number" class="form-control" value="{{ $tour->quantity }}"></td>
                                        <td><input name="priceAdult" type="number" class="form-control" value="{{ $tour->priceAdult }}"></td>
                                        <td><input name="priceChild" type="number" class="form-control" value="{{ $tour->priceChild }}"></td>
                                        <td><input name="duration" class="form-control" value="{{ $tour->duration }}"></td>
                                        <td><input name="destination" class="form-control" value="{{ $tour->destination }}"></td>
                                        <td>{{ $tour->availability }}</td>
                                        <td>
                                            <a style="background-color: white;" href="{{ route('admin.tour.itineraries.index', $tour->tourID) }}" class="btn btn-info btn-sm" title="Quản lý ảnh">
                                                <i class="fas fa-route"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.tour.image.manage', $tour->tourID) }}" class="btn btn-info btn-sm" title="Quản lý ảnh">
                                                <i class="fas fa-image"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" title="Lưu"><i class="fas fa-save"></i></button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            <tr>
                                <form action="{{ route('admin.tour.store') }}" method="POST">
                                    @csrf
                                    <td><input name="title" class="form-control" placeholder="Tiêu đề" required></td>
                                    <td><input name="description" class="form-control" placeholder="Mô tả" required></td>
                                    <td><input name="quantity" type="number" class="form-control" placeholder="Số lượng" required></td>
                                    <td><input name="priceAdult" type="number" class="form-control" placeholder="Giá NL" required></td>
                                    <td><input name="priceChild" type="number" class="form-control" placeholder="Giá TE" required></td>
                                    <td><input name="duration" class="form-control" placeholder="Thời gian" required></td>
                                    <td><input name="destination" class="form-control" placeholder="Điểm đến" required></td>
                                    <td>____</td>
                                    <td>____</td>
                                    <td>____</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" title="Thêm"><i class="fas fa-plus-circle"></i></button>
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
