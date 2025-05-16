<div class="container mt-4">
    <h2>Quản lý người dùng</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>IP</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Hành động</th>
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
                    <td><input name="status" class="form-control" placeholder="Trạng thái" value="active"></td>
                    <td colspan="2"><input name="password" type="password" class="form-control" placeholder="Mật khẩu" required></td>
                    <td><button class="btn btn-primary btn-sm" title="Thêm"><i class="fas fa-plus-circle"></i></button></td>
                </form>
            </tr>
        </tbody>
    </table>
</div>