<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ivivu - {{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Bao toàn bộ style vào profile-page để tránh trùng */
        .profile-page {
            padding: 80px 20px;
            background-color: #f5f5f5;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .profile-page .profile-container {
            max-width: 1080px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            display: flex;
            gap: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }

        .profile-page .profile-sidebar {
            flex: 0 0 280px;
            text-align: center;
        }

        .profile-page .profile-sidebar img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-page .profile-sidebar .btn-upload {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        .profile-page .profile-sidebar .text-muted {
            font-size: 12px;
            color: #777;
            margin-top: 8px;
        }

        .profile-page .profile-main {
            flex: 1;
        }

        .profile-page .profile-main h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .profile-page .profile-main form input,
        .profile-page .profile-main form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .profile-page .profile-main form button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-page .profile-main form button:hover {
            background-color: #218838;
        }

        .profile-page .profile-main .change-password {
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .profile-page .profile-main label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .profile-page .profile-main .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
@if (session('error_password'))
    <div style="padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 15px;">
        {{ session('error_password') }}
    </div>
@endif

@if (session('success_password'))
    <div style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px;">
        {{ session('success_password') }}
    </div>
@endif
@include('User.blocks.header')

<div class="profile-page">
    <div class="profile-container">
        <div class="profile-sidebar">
            <img id="avatarPreview" src="{{ asset('admin/assets/img/user-profile/' . ($user->avatar ?? 'default-avatar.png')) }}" alt="Ảnh đại diện">
            <div class="text-muted">JPG hoặc PNG không quá 5MB</div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('change-avatar') }}">
                @csrf
                <input type="file" name="avatar" id="avatar" style="display: none" accept="image/*" onchange="this.form.submit()">
                <label for="avatar" class="btn-upload">Tải ảnh lên</label>
            </form>
        </div>

        <div class="profile-main">
            <h2>Thông tin tài khoản</h2>
            <form method="POST" action="{{ route('update-user-profile') }}">
                @csrf
                <div class="form-group">
                    <label for="inputFullName">Họ và tên</label>
                    <input id="inputFullName" type="text" name="fullName" value="{{ $user->fullName }}" required>
                </div>
                <div class="form-group">
                    <label for="inputLocation">Địa chỉ</label>
                    <input id="inputLocation" type="text" name="address" value="{{ $user->address }}" required>
                </div>
                <div class="form-group">
                    <label for="inputEmailAddress">Email</label>
                    <input id="inputEmailAddress" type="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="inputPhone">Số điện thoại</label>
                    <input id="inputPhone" type="tel" name="phoneNumber" value="{{ $user->phoneNumber }}" required>
                </div>
                <button type="submit">Cập nhật</button>
            </form>

            <div class="change-password">
                <h2>Đổi mật khẩu</h2>
                <form method="POST" action="{{ route('change_password') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputOldPass">Mật khẩu cũ</label>
                        <input id="inputOldPass" type="password" name="oldPass" required>
                    </div>
                    <div class="form-group">
                        <label for="inputNewPass">Mật khẩu mới</label>
                        <input id="inputNewPass" type="password" name="newPass" required>
                    </div>
                    <button type="submit">Thay đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('User.blocks.footer')

</body>
</html>
