<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ivivu - {{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('clients/css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/css/custom-css.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



</head>

<body>
    <header>
        <div class="nav-bar">
            <div class="container">
                <div class="nav-bar1">
                    <div class="nav-bar2">
                        <div class="navbar-header">
                            <a href="{{ route('home') }}"><img
                                    src="https://www.ivivu.com/du-lich/content/img/logo-ivivu.svg" alt="" /></a>
                        </div>
                        <div class="navbar-collapse">
                            <ul>
                                <li><a class="{{ Route::is('home') ? 'active-1' : '' }}"
                                        href="{{ route('home') }}">Home</a></li>
                                <li><a class="{{ Route::is('tourList') ? 'active-1' : '' }}"
                                        href="{{ route('tourList') }}">Tours</a></li>
                                <li><a href="#">Vé Máy Bay</a></li>
                                <li><a href="#">Vé vui chơi</a></li>
                                <li><a href="#">Vé Tàu</a></li>
                                <li>
                                    <a href="#"><i class="fa-solid fa-ellipsis"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-custom-menu">
                        <ul>

                            <div class="menu-sidebar">
                                <li class="user-login drop-down">
                                    <div>
                                        <div class="img-wrapper" id="userDropdown">
                                            @if (session()->has('avatar'))
                                                @php
                                                    $avatar = session()->get('avatar', 'user_avatar.jpg');
                                                @endphp
                                                <img id="avatarPreview" class="img-account-profile rounded-circle mb-2"
                                                    src="{{ asset('admin/assets/img/user-profile/' . $avatar) }}"
                                                    style="width:40px; height: 40px;">
                                                    <i style="color: #fff"
                                                    class="fa-solid fa-chevron-down fa-beat chevron-icon"></i>
                                            @else
                                                <img id="avatarPreview" class="img-account-profile rounded-circle mb-2"
                                                    src="https://www.ivivu.com/du-lich/content/img/avatars/avatar-default-white.svg" alt="Avatar mặc định">
                                                <i style="color: #fff"
                                                    class="fa-solid fa-chevron-down fa-beat chevron-icon"></i>
                                            @endif
                                        </div>
                                        <ul class="dropdown-menu" id="dropdownMenu">
                                            @if (session()->has('username'))
                                                <li>
                                                    {{ session()->get('username') }}
                                                </li>
                                                <li><a href="{{ route('user-profile') }}">Thông tin cá nhân</a></li>
                                                <li><a href="{{ route('logout') }}">Đăng Xuất</a></li>
                                            @else
                                                <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                            @endif
                                        </ul>

                                    </div>
                                </li>
                            </div>



                            <li>
                                <div class="hotline">
                                    <div class="hotline-item1" style="margin-bottom: 10px">
                                        <a href="#"><i class="fa-solid fa-phone"></i><span>1900 2045</span></a>
                                    </div>
                                    <div class="hotline-item2">
                                        <a href="#"><i class="fa-regular fa-clock"></i>7h30 → 21h</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>
