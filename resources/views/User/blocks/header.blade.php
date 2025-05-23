<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ivivu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('User/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/custom-css.css') }}">

    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            list-style: none;
            padding: 10px 0;
            border-radius: 8px;
            min-width: 180px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            z-index: 9999;
            top: 100%;
            right: 0;
        }

        .dropdown-menu li {
            padding: 8px 20px;
        }

        .dropdown-menu li a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .dropdown-menu li a:hover {
            color: #007bff;
            background-color: #f0f0f0;
        }

        .img-wrapper {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            position: relative;
        }

        .menu-sidebar {
            position: relative;
        }

        /* Fix ul inside navbar */
        .navbar-custom-menu > ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            align-items: center;
            gap: 20px;
        }
    </style>
</head>

<body>
    <header>
        <div class="nav-bar">
            <div class="container">
                <div class="nav-bar1">
                    <div class="nav-bar2">
                        <div class="navbar-header">
                            <a href="#"><img
                                    src="https://www.ivivu.com/du-lich/content/img/logo-ivivu.svg" alt="Logo Ivivu" /></a>
                        </div>
                        <div class="navbar-collapse">
                            <ul>
                                <li><a class="{{ Route::is('home.index') ? 'active-1' : '' }}"
                                        href="{{ route('home.index') }}">Home</a></li>
                                <li><a class="{{ Route::is('tourList') ? 'active-1' : '' }}"
                                        href="{{ route('tourList') }}">Tours</a></li>
                                <li><a href="#"><i class="fa-solid fa-ellipsis"></i></a></li>
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
                                                    <img id="avatarPreview"
                                                        class="img-account-profile rounded-circle mb-2"
                                                        src="{{ asset('admin/assets/img/user-profile/' . $avatar) }}"
                                                        style="width:40px; height: 40px;">
                                                    <i style="color: #fff"
                                                        class="fa-solid fa-chevron-down fa-beat chevron-icon"></i>
                                                @else
                                                    <img id="avatarPreview"
                                                        class="img-account-profile rounded-circle mb-2"
                                                        src="https://www.ivivu.com/du-lich/content/img/avatars/avatar-default-white.svg"
                                                        alt="Avatar mặc định">
                                                    <i style="color: #fff"
                                                        class="fa-solid fa-chevron-down fa-beat chevron-icon"></i>
                                                @endif
                                            </div>
                                            <ul class="dropdown-menu" id="dropdownMenu">
                                                @if (session()->has('username'))
                                                    <li>
                                                        {{ session()->get('username') }}
                                                    </li>
                                                    <li><a href="{{ route('user-profile') }}">Thông tin cá nhân</a>
                                                    </li>
                                                    <li><a href="{{ route('history.index') }}">Lịch sử đặt tour</a></li>
                                                    <li><a href="{{ route('logout') }}">Đăng Xuất</a></li>
                                                @else
                                                    <li><a href="{{ route('showlogin') }}">Đăng nhập</a></li>
                                                    <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                                    <li><a href="{{ route('admin.login.form') }}">Đăng nhập cho admin</a></li>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userDropdown = document.getElementById('userDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            userDropdown.addEventListener('click', function (e) {
                e.stopPropagation();
                const isVisible = dropdownMenu.style.display === 'block';
                dropdownMenu.style.display = isVisible ? 'none' : 'block';
                // Accessibility toggle
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
            });

            // Click outside dropdown: hide it
            document.addEventListener('click', function (event) {
                if (!userDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                    userDropdown.setAttribute('aria-expanded', 'false');
                }
            });

            // Optional: hide dropdown on Escape key
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    dropdownMenu.style.display = 'none';
                    userDropdown.setAttribute('aria-expanded', 'false');
                }
            });
        });
    </script>
</body>

</html>
