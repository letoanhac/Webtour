@include('clients.blocks.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ivivu </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('clients/css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/css/custom-css.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('clients/css/user-profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .dark-mode {
            background-image: url('https://static.vinwonders.com/2022/11/khu-du-lich-viet-nam-1.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    <div>
        
    </div>
    <div style="margin-top: 60px; margin-bottom: 100px;">
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Ảnh đại diện</div>
                        <button style="margin: 20px;border-radius:120px;" onclick="myFunction()">Chế độ</button>
                        <div class="card-body text-center">
                            <img id="avatarPreview" class="img-account-profile rounded-circle mb-2"
                                src="{{ asset('admin/assets/img/user-profile/' . $user->avatar) }}"
                                style="width:200px; height: 200px;" alt="Ảnh đại diện {{ $user->avatar }}">
                            <div class="small font-italic text-muted mb-4">JPG hoặc PNG không lớn hơn 5 MB</div>
                            <input type="file" name="avatar" id="avatar" style="display: none" accept="img/*">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" class="__token">
                            <input type="hidden" name="" value="{{ route('change-avatar') }}"
                                class="label_avatar">
                            <label for="avatar" class="btn btn-primary">Tải ảnh lên</label>
                        </div>
                    </div>
                    <div class="card mb-4 mb-xl-0">
                        <button class="btn btn-primary" type="button" id="update-password-profile">Đổi mật
                            khẩu</button>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card mb-4">
                        <div class="card-header">Thông tin tài khoản</div>
                        <div class="card-body">
                            <form action="{{ route('update-user-profile') }}" method="POST" class="updateUser"
                                name="updateUser">

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputFullName">Họ và tên</label>
                                        <input class="form-control" id="inputFullName" type="text"
                                            placeholder="Nhập họ và tên" value="{{ $user->fullName }}" required>
                                    </div>
                                </div>
                                @csrf
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                        <input class="form-control" id="inputLocation" type="text"
                                            placeholder="Nhập địa chỉ" value="{{ $user->address }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"
                                        placeholder="Nhập địa chỉ email" value="{{ $user->email }}" required>
                                </div>

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                        <input class="form-control" id="inputPhone" type="tel"
                                            placeholder="Nhập số điện thoại" value="{{ $user->phoneNumber }}"
                                            required>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit" id="update-profile">Lưu</button>
                            </form>
                        </div>


                    </div>
                    <div class="card mb-4 ">
                        <div class="card-body" id="card_change_password">
                            <div class="invalid-feedback" style="margin-top:-15px" id="validate_password"></div>
                            <form action="{{ route('change_password') }}" method="post"
                                class="change_password_profile">
                                @csrf
                                <div class="row gx-3">
                                    <div class="col-md-4">
                                        <input class="form-control" id="inputOldPass" type="password"
                                            placeholder="Nhập mật khẩu cũ" value="" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" id="inputNewPass" type="password"
                                            placeholder="Nhập mật khẩu mới" value="" required>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="submit">Thay đổi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
        function myFunction() {
            var element = document.body;
            element.classList.toggle("dark-mode");
        }
        </script>
    @include('clients.blocks.footer')
