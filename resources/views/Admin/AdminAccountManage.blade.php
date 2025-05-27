<!-- resources/views/Admin/admins.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý Tài khoản Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        /* Giữ nguyên style từ layout tour, hoặc chỉnh theo ý */
        table th, table td {
            vertical-align: middle !important;
        }
        .form-control {
            min-width: 120px;
        }
        .btn {
            padding: 5px 12px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h2 class="text-center mb-4">Quản lý Tài khoản Admin</h2>
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        <a href="{{ route('admin.tour.index') }}">Quay lại </a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Admin ID</th>
                        <th>Username</th>
                        <th>Password (Mật khẩu mới)</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <form action="{{ route('admin.admins.update', $admin->adminID) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>{{ $admin->adminID }}</td>
                            <td><input name="username" class="form-control" value="{{ $admin->username }}" required></td>
                            <td>
                                <input name="password" type="password" class="form-control" placeholder="Đổi mật khẩu">
                                <small class="text-muted">Để trống nếu không đổi</small>
                            </td>
                            <td><input name="email" class="form-control" value="{{ $admin->email }}" required></td>
                            <td>{{ $admin->createDate }}</td>
                            <td>{{ $admin->updateDate }}</td>
                            <td>
                                <button class="btn btn-success btn-sm" title="Lưu"><i class="fas fa-save"></i></button>
                        </form>
                        <form action="{{ route('admin.admins.destroy', $admin->adminID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa admin này?')" title="Xóa">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                            </td>
                    </tr>
                    @endforeach
                    <tr>
                        <form action="{{ route('admin.admins.store') }}" method="POST">
                            @csrf
                            <td>--</td>
                            <td><input name="username" class="form-control" required></td>
                            <td><input name="password" type="password" class="form-control" required></td>
                            <td><input name="email" type="email" class="form-control" required></td>
                            <td>--</td>
                            <td>--</td>
                            <td>
                                <button class="btn btn-primary btn-sm" title="Thêm"><i class="fas fa-plus-circle"></i></button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
