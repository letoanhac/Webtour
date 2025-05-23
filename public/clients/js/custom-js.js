$(document).ready(function () {
    if ($(".price-slider-range").length) {
        $(".price-slider-range").slider({
            range: true,
            min: 0,
            max: 20000000,
            values: [0, 20000000],
            slide: function (event, ui) {
                $("#price1").val(
                    ui.values[0].toLocaleString("vi-VN") +
                        " vnđ" +
                        " - " +
                        ui.values[1].toLocaleString("vi-VN") +
                        " vnđ"
                );
            },
        });

        // Đặt giá trị ban đầu
        $("#price1").val(
            $(".price-slider-range")
                .slider("values", 0)
                .toLocaleString("vi-VN") +
                " vnđ" +
                " - " +
                $(".price-slider-range")
                    .slider("values", 1)
                    .toLocaleString("vi-VN") +
                " vnđ"
        );

        // Đảm bảo hiển thị đúng UI
        setTimeout(function () {
            $(".price-slider-range").slider("refresh");
        }, 100);
    }

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
                        window.location.href = "/";
                        // Hiển thị toastr
                        toastr.success(response.message, "Thành công");
                    } else {
                        $("#login-form #message").hide();
                        $("#login-form #error").text(response.message).show();
                        toastr.error(response.message, "Thất bại");
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
        // Show the loader
        $(".loader").show();

        // Hide the content while loading
        $("#register-form").addClass("hident-content");
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
                        // Hiển thị message trong form
                        $("#register-form #message")
                            .text(response.message)
                            .show();
                        $("#register-form #error").hide();
                        $("#register-form").trigger("reset");
                        $(".loader").hide();

                        // Show the content again by removing the hiding class
                        $("#register-form").removeClass("hident-content");

                        // Hiển thị toastr
                        toastr.success(response.message, "Thành công");
                    } else {
                        $("#register-form #message").hide();
                        $("#register-form #error")
                            .text("Tên tài khoản hoặc email đã tồn tại")
                            .show();

                        // Hiển thị toastr lỗi
                        toastr.error(
                            "Tên tài khoản hoặc email đã tồn tại",
                            "Lỗi"
                        );

                        $(".loader").hide();

                        // Show the content again by removing the hiding class
                        $("#register-form").removeClass("hident-content");
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("CÓ Lỗi Xảy Ra");
                },
            });
        }
    });

    if ($(".price-slider-range").length) {
        $(".price-slider-range").on("slide", function (event, ul) {
            filterTours(ul.values[0], ul.values[1]);
        });
    }
    $('input[name="domain"]').on("change", filterTours);
    $('input[name="filter_star"]').on("change", filterTours);
    $('input[name="duration"]').on("change", filterTours);

    $("#sorting_tours").on("change", function () {
        filterTours(null, null, $(this).val());
    });
    function filterTours(
        minPrice = null,
        maxPrice = null,
        sorting = "default"
    ) {
        // Show the loader
        $(".loader").show();

        // Hide the content while loading
        $("#tours-container").addClass("hident-content");

        if (minPrice === null || maxPrice === null) {
            minPrice = $(".price-slider-range").slider("values", 0);
            maxPrice = $(".price-slider-range").slider("values", 1);
        }

        var domain = $('input[name="domain"]:checked').val();
        var star = $('input[name="filter_star"]:checked').val();
        var duration = $('input[name="duration"]:checked').val();
        var sorting = $("#sorting_tours").val();

        var formDataFilter = {
            minPrice: minPrice,
            maxPrice: maxPrice,
            domain: domain,
            star: star,
            time: duration,
            sorting: sorting,
        };

        $.ajax({
            url: filterToursUrl,
            method: "GET",
            data: formDataFilter,
            success: function (res) {
                // Update the container with results
                $("#tours-container").html(res);

                // Hide the loader
                $(".loader").hide();

                // Show the content again by removing the hiding class
                $("#tours-container").removeClass("hident-content");
            },
            error: function () {
                // Also hide loader if there's an error
                $(".loader").hide();
                $("#tours-container").removeClass("hident-content");
            },
        });
    }

    $(".clear_filter").on("click", function (e) {
        e.preventDefault();

        $(".loader").show();
        $("#tours-container").addClass("hidden-content");
        // Reset slider giá về giá trị mặc định (ví dụ: 0 đến 20000000)
        $(".price-slider-range").slider("values", [0, 20000000]);

        // Bỏ chọn radio và checkbox
        $('input[name="domain"]').prop("checked", false);
        $('input[name="filter_star"]').prop("checked", false);
        $('input[name="duration"]').prop("checked", false);

        filterTours(0, 20000000);
    });

    //user-profile
    $(".updateUser").on("submit", function (e) {
        e.preventDefault();
        var fullName = $("#inputFullName").val();
        var address = $("#inputLocation").val();
        var email = $("#inputEmailAddress").val();
        var phone = $("#inputPhone").val();

        var dataUpdate = {
            fullName: fullName,
            address: address,
            email: email,
            phone: phone,
            _token: $('input[name="_token"]').val(),
        };

        console.log(dataUpdate);

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: dataUpdate,
            success: function (response) {
                console.log(response);

                if (response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                error("Có lỗi xảy ra. Vui lòng thử lại sau.");
            },
        });
    });

    $("#update-password-profile").on("click", function (e) {
        e.preventDefault();
        $("#card_change_password").show();
    });

    $(".change_password_profile").on("submit", function (e) {
        e.preventDefault();
        var oldPass = $("#inputOldPass").val();
        var newPass = $("#inputNewPass").val();
        var isValid = true;

        // Kiểm tra độ dài mật khẩu
        if (oldPass.length < 6 || newPass.length < 6) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        if (sqlInjectionPattern.test(newPass)) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        if (isValid) {
            $("#validate_password").hide().text("");
            var updatePass = {
                oldPass: oldPass,
                newPass: newPass,
                _token: $('input[name="_token"]').val(),
            };

            console.log(updatePass);

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: updatePass,
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        $("#validate_password").hide().text("");
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $("#validate_password")
                        .show()
                        .text(xhr.responseJSON.message);
                    error("Có lỗi xảy ra. Vui lòng thử lại sau.");
                },
            });
        }
    });

    //Update avatar
    $("#avatar").on("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            // Hiển thị ảnh vừa chọn trước khi gửi lên server
            const reader = new FileReader();
            reader.onload = function (e) {
                $("#avatarPreview").attr("src", e.target.result);
                $(".img-account-profile").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
            var __token = $(this)
                .closest(".card-body")
                .find("input.__token")
                .val();
            var url_avatar = $(this)
                .closest(".card-body")
                .find("input.label_avatar")
                .val();
            // Tạo FormData để gửi file qua AJAX
            const formData = new FormData();
            formData.append("avatar", file);

            console.log(url_avatar);

            // // Gửi AJAX đến server
            $.ajax({
                url: url_avatar,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": __token,
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log("Server response:", response);
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", xhr.responseText);
                    toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.", "Lỗi");
                },
            });
        }
    });

    //search

    $('#search_form').on('submit', function(event) {
        // Lấy giá trị các trường cần kiểm tra
        var destination = $('#destination').val();
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();

        if (destination === "") {
            event.preventDefault();
            toastr.error('Vui lòng chọn điểm đến.');
            return;
        }

        // Chuyển đổi định dạng ngày từ DD/MM/YYYY sang YYYY-MM-DD
        function convertDateFormat(date) {
            var parts = date.split('/');
            return parts[2] + '-' + parts[1] + '-' + parts[0];
        }

        if (startDate && endDate) {
            var startDateFormatted = new Date(convertDateFormat(startDate));
            var endDateFormatted = new Date(convertDateFormat(endDate));

            // Kiểm tra nếu "start_date" lớn hơn "end_date"
            if (startDateFormatted > endDateFormatted) {
                event.preventDefault();
                toastr.error('Ngày khởi hành không thể lớn hơn ngày kết thúc.');
                return;
            }
        }
    });
});
