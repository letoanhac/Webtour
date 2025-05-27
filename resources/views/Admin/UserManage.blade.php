<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý người dùng</title>
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
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #cbd5e1;
            color: #1e40af;
        }
        .sidebar a.active {
            background-color: #1e40af;
            color: #f8fafc;
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
            min-width: 120px;
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
                <h2 class="text-center mb-4">Quản lý Người dùng</h2>

                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Tên đăng nhập</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>IP</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th colspan="2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <form action="{{ route('admin.usermanage.user.update', $user->userID) }}" method="POST">
                                    @csrf
                                    <td><input name="username" value="{{ $user->username }}" class="form-control"></td>
                                    <td><input name="email" value="{{ $user->email }}" class="form-control"></td>
                                    <td><input name="phoneNumber" value="{{ $user->phoneNumber }}" class="form-control"></td>
                                    <td><input name="ipAddress" value="{{ $user->ipAddress }}" class="form-control"></td>
                                    <td><input name="status" value="{{ $user->status }}" class="form-control"></td>
                                    <td>{{ $user->createDate }}</td>
                                    <td>{{ $user->updateDate }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" title="Lưu"><i class="fas fa-save"></i></button>
                                    </td>
                                </form>
                                <td>
                                    <form action="{{ route('admin.usermanage.user.delete', $user->userID) }}" method="POST" onsubmit="return confirm('Bạn có chắc xoá không?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Xoá"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            {{-- Thêm mới --}}
                            <tr>
                                <form action="{{ route('admin.usermanage.user.store') }}" method="POST">
                                    @csrf
                                    <td><input name="username" class="form-control" placeholder="Tên đăng nhập" required></td>
                                    <td><input name="email" type="email" class="form-control" placeholder="Email" required></td>
                                    <td><input name="phoneNumber" class="form-control" placeholder="SĐT" required></td>
                                    <td><input name="ipAddress" class="form-control" placeholder="IP"></td>
                                    <td><input name="status" class="form-control" value="active"></td>
                                    <td colspan="2"><input name="password" type="password" class="form-control" placeholder="Mật khẩu" required></td>
                                    <td><button class="btn btn-primary btn-sm" title="Thêm"><i class="fas fa-plus-circle"></i></button></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
