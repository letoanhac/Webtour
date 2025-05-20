@include('clients.blocks.header')
<div class="login">
    <div class="container">
        <div class="sis__container">
            <div class="auth-login__spacing-container">
                <div class="alh__header-wrapper">
                    <span class="alh__header-text">Đăng nhập</span>
                    <span class="trip-back_arrow alh__header-back">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                </div>
                <form class="sis__content-wrapper" action="{{ route('user-login') }}" method="POST" class="login-form"
                    id="login-form" style="margin-top: 15px">
                    <!-- Changed to block-level elements with proper styling -->
                    <div id="error" class="alert alert-danger"
                        style="display: none; margin-bottom: 15px; padding: 10px; border-radius: 5px;"></div>
                    <div id="message" class="alert alert-success"
                        style="display: none; margin-bottom: 15px; padding: 10px; border-radius: 5px;"></div>
                    @if (session('message'))
                        <div class="alert alert-success"
                            style="margin-bottom: 15px; padding: 10px; border-radius: 5px;">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" style="margin-bottom: 15px; padding: 10px; border-radius: 5px;">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="auth-login__form-field">
                        <span class="auth-login__label">Tên tài khoản</span>
                        <div>
                            <input type="text" class="auth-login__input" id="username_login">
                        </div>
                        <div class="invalid-feedback" style="margin-top: 15px; display: none; color: red;"
                            id="validate_username">
                        </div>
                        @csrf
                    </div>
                    <div class="auth-login__form-field">
                        <span class="auth-login__label">Mật khẩu</span>
                        <div>
                            <input type="password" class="auth-login__input" id="password_login">
                        </div>
                        <div class="invalid-feedback" style="margin-top: 15px; display: none; color: red;"
                            id="validate_password">
                        </div>
                    </div>
                    <div class="sis__more-options-wrapper">
                        <a href="#">Quên mật khẩu?</a>
                        <span id="sign-up">Đăng ký?</span>
                    </div>
                    <button class="auth-login__button" name="signin" id="signin" type="submit">Đăng nhập</button>
                </form>
                <div class="als__footer-wrapper">
                    <div class="als__divider">
                        <span class="als__divider-text">Hoặc</span>
                    </div>
                    <div class="als__social-method-wrapper">
                        <a class="als__social-method-button" style="color: #333">
                            <span class=""><img width="22px" height="22px"
                                    src="{{ asset('clients/img/2023_Facebook_icon.svg.png') }}" alt=""></span>
                            <span class="als__social-method-text">Facebook</span>
                        </a>

                        <a href="{{ route('login-google') }}" class="als__social-method-button" style="color: #333">
                            <span class=""><img width="22px" height="22px"
                                    src="{{ asset('clients/img/gg.png') }}" alt=""></span>
                            <span class="als__social-method-text">Google</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="signup" style="display: none;">
    
    <div class="container">
        <div class="sis__container">
            <div class="auth-login__spacing-container">
                <div class="alh__header-wrapper">
                    <span class="alh__header-text">Đăng ký</span>
                    <span class="trip-back_arrow alh__header-back">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                </div>
                <div class="loader"></div>
                <form class="sis__content-wrapper" id="register-form" action="{{ route('register') }}" method="POST">
                    <!-- Changed to block-level elements with proper styling -->
                    <div id="error" class="alert alert-danger"
                        style="display: none; margin-bottom: 15px; padding: 10px; border-radius: 5px;"></div>
                    <div id="message" class="alert alert-success"
                        style="display: none; margin-bottom: 15px; padding: 10px; border-radius: 5px;"></div>

                    <div class="auth-login__form-field">
                        <span class="auth-login__label">Tên tài khoản</span>
                        <div>
                            <input type="text" class="auth-login__input" id="username_register" />
                        </div>
                        <div class="invalid-feedback" style="margin-top: 15px; display: none; color: red;"
                            id="validate_username_regis"></div>

                    </div>
                    @csrf
                    <div class="auth-login__form-field">
                        <span class="auth-login__label">Email </span>
                        <div>
                            <input type="text" class="auth-login__input" id="email_register" />
                        </div>
                        <div class="invalid-feedback" style="margin-top: 15px; display: none; color: red;"
                            id="validate_email_regis"></div>
                    </div>
                    <div class="auth-login__form-field">
                        <span class="auth-login__label">Mật khẩu</span>
                        <div>
                            <input type="password" class="auth-login__input" id="password_register" />
                        </div>
                        <div class="invalid-feedback" style="margin-top: 15px; display: none; color: red;"
                            id="validate_password_regis"></div>
                    </div>
                    <div class="auth-login__form-field">
                        <span class="auth-login__label">Nhập lại mật khẩu</span>
                        <div>
                            <input type="password" class="auth-login__input" id="re_pass" />
                        </div>
                        <div class="invalid-feedback" style="margin-top: 15px; display: none; color: red;"
                            id="validate_repass">
                        </div>
                    </div>
                    <div class="sis__more-options-wrapper">
                        <span id="login">Đăng nhập?</span>
                    </div>
                    <button class="auth-login__button" name="signup" id="signup" type="submit">Đăng ký</button>
                </form>
                <div class="als__footer-wrapper">
                    <div class="als__divider">
                        <span class="als__divider-text">Hoặc</span>
                    </div>
                    <div class="als__social-method-wrapper">
                        <button class="als__social-method-button">
                            <span class=""><img width="22px" height="22px"
                                    src="{{ asset('clients/img/2023_Facebook_icon.svg.png') }}"
                                    alt="" /></span>
                            <span class="als__social-method-text">Facebook</span>
                        </button>

                        <button class="als__social-method-button">
                            <span class=""><img width="22px" height="22px"
                                    src="{{ asset('clients/img/gg.png') }}" alt="" /></span>
                            <span class="als__social-method-text">Google</span>
                        </button>
                    </div>
                    <div class="sus__pocily">
                        <span>Bằng cách đăng ký, Quý khách đồng ý tất cả </span>
                        <a href="https://www.facebook.com/POTUS/?locale=vi_VN" target="_blank">điều kiện & điều
                            khoản</a>
                        <span>của iVIVU</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('clients.blocks.footer')
