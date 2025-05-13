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
                    <form class="sis__content-wrapper">
                        <div class="auth-login__form-field">
                            <span class="auth-login__label">Email / Số điện thoại di động</span>
                            <div>
                                <input type="text" class="auth-login__input">
                            </div>
                        </div>
                        <div class="auth-login__form-field">
                            <span class="auth-login__label">Mật khẩu</span>
                            <div>
                                <input type="password" class="auth-login__input">
                            </div>
                        </div>
                        <div class="sis__more-options-wrapper">
                            <a href="#">Quên mật khẩu?</a>
                            <span id="sign-up">Đăng ký?</span>
                        </div>
                        <button class="auth-login__button" type="submit">Đăng nhập</button>
                    </form>
                    <div class="als__footer-wrapper">
                        <div class="als__divider">
                            <span class="als__divider-text">Hoặc</span>
                        </div>
                        <div class="als__social-method-wrapper">
                            <button class="als__social-method-button">
                                <span class=""><img width="22px" height="22px" src="{{ asset('clients/img/2023_Facebook_icon.svg.png') }}" alt=""></span>
                                <span class="als__social-method-text">Facebook</span>
                            </button>
    
                            <button class="als__social-method-button">
                                <span class=""><img width="22px" height="22px" src="{{ asset('clients/img/gg.png') }}" alt=""></span>
                                <span class="als__social-method-text">Google</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="signup" >
        <div class="container">
      <div class="sis__container">
        <div class="auth-login__spacing-container">
          <div class="alh__header-wrapper">
            <span class="alh__header-text">Đăng ký</span>
            <span class="trip-back_arrow alh__header-back">
              <i class="fa-solid fa-arrow-left"></i>
            </span>
          </div>
          <form class="sis__content-wrapper">
            <div class="auth-login__form-field">
              <span class="auth-login__label"
                >Họ và tên</span
              >
              <div>
                <input type="text" class="auth-login__input" />
              </div>
            </div>
            <div class="auth-login__form-field">
              <span class="auth-login__label"
                >Email / Số điện thoại di động</span
              >
              <div>
                <input type="text" class="auth-login__input" />
              </div>
            </div>
            <div class="auth-login__form-field">
              <span class="auth-login__label">Mật khẩu</span>
              <div>
                <input type="password" class="auth-login__input" />
              </div>
            </div>
            <div class="auth-login__form-field">
              <span class="auth-login__label">Nhập lại mật khẩu</span>
              <div>
                <input type="password" class="auth-login__input" />
              </div>
            </div>
            <div class="sis__more-options-wrapper">
              
              <span id="login">Đăng nhập?</span>
            </div>
            <button class="auth-login__button" type="submit">Đăng ký</button>
          </form>
          <div class="als__footer-wrapper">
            <div class="als__divider">
              <span class="als__divider-text">Hoặc</span>
            </div>
            <div class="als__social-method-wrapper">
              <button class="als__social-method-button">
                <span class=""
                  ><img
                    width="22px"
                    height="22px"
                    src="{{ asset('clients/img/2023_Facebook_icon.svg.png') }}"
                    alt=""
                /></span>
                <span class="als__social-method-text">Facebook</span>
              </button>

              <button class="als__social-method-button">
                <span class=""
                  ><img width="22px" height="22px" src="{{ asset('clients/img/gg.png') }}" alt=""
                /></span>
                <span class="als__social-method-text">Google</span>
              </button>
            </div>
            <div class="sus__pocily">
              <span>Bằng cách đăng ký, Quý khách đồng ý tất cả </span>
              <a href="https://www.facebook.com/POTUS/?locale=vi_VN" target="_blank">điều kiện & điều khoản</a>
              <span>của iVIVU</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    

    
@include('clients.blocks.footer')