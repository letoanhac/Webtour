$(document).ready(function () {
    // No need to hide signup initially as it's already hidden in CSS

    // When clicking sign up, hide login and show signup
    $("#sign-up").click(function () {
        $(".login").hide();
        $(".signup").css("display", "block"); // Force display block to override CSS
    });

    // When clicking login, hide signup and show login
    $("#login").click(function () {
        $(".signup").css("display", "none"); // Force display none
        $(".login").show();
    });

    $("#start_date, #end_date").datetimepicker({
        format: "d/m/Y",
        timepicker: false,
    });
    //user login

    $("#userDropdown").click(function (e) {
        e.stopPropagation(); // Prevent document click from immediately closing
        $("#dropdownMenu").toggleClass("show");
    });

    // Close dropdown when clicking outside
    $(document).click(function () {
        $("#dropdownMenu").removeClass("show");
    });

    // Prevent dropdown from closing when clicking inside
    $("#dropdownMenu").click(function (e) {
        e.stopPropagation();
    });

    // Định nghĩa mẫu kiểm tra SQL injection
    var sqlInjectionPattern = /['";=\-\(\)%\*\/\\]/;
    
    // Hide all message elements initially
    $("#login-form #message, #login-form #error").hide();
    $("#register-form #message, #register-form #error").hide();
    
    //Đăng nhập
    $("#login-form").on("submit", function (e) {
        e.preventDefault();
        var userName = $("#username_login").val().trim();
        var password = $("#password_login").val().trim();

        // Đặt lại nội dung thông báo lỗi và ẩn chúng
        $("#validate_username").hide().text("");
        $("#validate_password").hide().text("");

        var isValid = true;

        // Kiểm tra độ dài mật khẩu
        if (password.length < 6) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        // Kiểm tra tên đăng nhập và mật khẩu không chứa ký tự đặc biệt (SQL injection)
        if (sqlInjectionPattern.test(userName)) {
            isValid = false;
            $("#validate_username")
                .show()
                .text("Tên đăng nhập không được chứa ký tự đặc biệt.");
        }

        if (sqlInjectionPattern.test(password)) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        if (isValid) {
            var formData = {
                username: userName,
                password: password,
                _token: $('input[name="_token"]').val(),
            };
            console.log(formData, $(this).attr("action"));
            
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        window.location.href='/';
                    } else {
                        $("#login-form #message").hide();
                        $("#login-form #error")
                            .text(response.message)
                            .show();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("CÓ Lỗi Xảy Ra");
                },
            });
        }
    });

    //Đăng ký
    $("#register-form").on("submit", function (e) {
        e.preventDefault();

        // Lấy giá trị của các trường nhập liệu
        var userName = $("#username_register").val().trim();
        var email = $("#email_register").val().trim();
        var password = $("#password_register").val().trim();
        var rePass = $("#re_pass").val().trim();

        // Đặt lại nội dung thông báo lỗi và ẩn chúng
        $("#validate_username_regis").hide().text("");
        $("#validate_email_regis").hide().text("");
        $("#validate_password_regis").hide().text("");
        $("#validate_repass").hide().text("");

        // Kiểm tra lỗi
        var isValid = true;

        // Kiểm tra tên đăng nhập không chứa ký tự SQL injection
        if (sqlInjectionPattern.test(userName)) {
            isValid = false;
            $("#validate_username_regis")
                .show()
                .text("Tên tài khoản không được chứa ký tự đặc biệt.");
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            isValid = false;
            $("#validate_email_regis").show().text("Email không hợp lệ.");
        }

        if (password.length < 6) {
            isValid = false;
            $("#validate_password_regis")
                .show()
                .text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        if (sqlInjectionPattern.test(password)) {
            isValid = false;
            $("#validate_password_regis")
                .show()
                .text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        // Kiểm tra nhập lại mật khẩu
        if (password !== rePass) {
            isValid = false;
            $("#validate_repass").show().text("Mật khẩu nhập lại không khớp.");
        }

        if (isValid) {
            var formData = {
                username_regis: userName,
                email: email,
                password_regis: password,
                _token: $('input[name="_token"]').val(),
            };
            console.log(formData);

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        // Make sure we're selecting elements within the register form
                        $("#register-form #message").text(response.message).show();
                        $("#register-form #error").hide();
                        $('#register-form').trigger('reset');
                    } else {
                        $("#register-form #message").hide();
                        $("#register-form #error")
                            .text("Tên tài khoản hoặc email đã tồn tại")
                            .show();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("CÓ Lỗi Xảy Ra");
                },
            });
        }
    });
});