$(document).ready(function () {
    // ===== PRICE SLIDER CONFIGURATION =====
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

    // ===== LOGIN/SIGNUP TOGGLE =====
    $("#sign-up").click(function () {
        $(".login").hide();
        $(".signup").css("display", "block");
    });

    $("#login").click(function () {
        $(".signup").css("display", "none");
        $(".login").show();
    });

    // ===== DATE PICKER =====
    $("#start_date, #end_date").datetimepicker({
        format: "d/m/Y",
        timepicker: false,
    });

    // ===== USER DROPDOWN =====
    $("#userDropdown").click(function (e) {
        e.stopPropagation();
        $("#dropdownMenu").toggleClass("show");
    });

    $(document).click(function () {
        $("#dropdownMenu").removeClass("show");
    });

    $("#dropdownMenu").click(function (e) {
        e.stopPropagation();
    });

    // ===== TOUR LIST FUNCTIONALITY =====
    // Hàm lấy tất cả filter hiện tại
    function getCurrentFilters() {
        var filters = {};

        // Domain filter
        var selectedDomain = $('input[name="domain"]:checked').val();
        if (selectedDomain) {
            filters.domain = selectedDomain;
        }

        // Duration filter
        var selectedDuration = $('input[name="duration"]:checked').val();
        if (selectedDuration) {
            filters.time = selectedDuration;
        }

        // Price filter
        var priceRange = $('.price-slider-range').slider('values');
        if (priceRange && priceRange.length === 2) {
            filters.minPrice = priceRange[0];
            filters.maxPrice = priceRange[1];
        }

        // Sorting
        var sorting = $('#sorting_tours').val();
        if (sorting && sorting !== 'default') {
            filters.sorting = sorting;
        }

        return filters;
    }

    // Hàm load tours với AJAX - được tối ưu hóa
    function loadTours(page = 1) {
        $('.loader').show();

        var filters = getCurrentFilters();
        filters.page = page;

        $.ajax({
            url: typeof filterToursUrl !== 'undefined' ? filterToursUrl : '/filter-tours',
            method: 'GET',
            data: filters,
            success: function(response) {
                $('#tours-container').html(response);
                $('.loader').hide();

                // Cập nhật số lượng tour hiển thị
                var totalText = $('.title-result');
                if (totalText.length && filters.total) {
                    var paginationInfo = $('.pagination-tours').length > 0 ?
                        'Trang ' + $('.pagination .active .page-link').text() : '';
                    totalText.html('<b>Tổng cộng ' + filters.total + ' Tour ' + paginationInfo + '</b>');
                }
            },
            error: function() {
                $('.loader').hide();
                toastr.error('Có lỗi xảy ra khi tải dữ liệu tours');
            }
        });
    }

    // Xử lý click pagination
    $(document).on('click', '.pagination-link', function(e) {
        e.preventDefault();
        var page = $(this).data('page');
        loadTours(page);

        // Scroll to top của tour list
        $('html, body').animate({
            scrollTop: $('.tour-list-content').offset().top - 100
        }, 500);
    });

    // Xử lý filter changes
    $('input[name="domain"], input[name="duration"]').change(function() {
        loadTours(1); // Reset về trang 1 khi filter
    });

    $('#sorting_tours').change(function() {
        loadTours(1); // Reset về trang 1 khi sort
    });

    // Xử lý price slider changes
    if ($(".price-slider-range").length) {
        $(".price-slider-range").on("slidechange", function() {
            loadTours(1); // Reset về trang 1 khi thay đổi giá
        });
    }

    // Clear filter functionality
    $('.clear_filter').click(function(e) {
        e.preventDefault();
        
        // Reset tất cả filter
        $('input[name="domain"], input[name="duration"]').prop('checked', false);
        $('#sorting_tours').val('default');

        // Reset price slider nếu có
        if ($('.price-slider-range').length) {
            $('.price-slider-range').slider('values', [0, 20000000]);
            $("#price1").val("0 vnđ - 20.000.000 vnđ");
        }

        // Load lại tours
        loadTours(1);
    });

    // ===== FORM VALIDATION & SQL INJECTION PROTECTION =====
    var sqlInjectionPattern = /['";=\-\(\)%\*\/\\]/;

    // Hide all message elements initially
    $("#login-form #message, #login-form #error").hide();
    $("#register-form #message, #register-form #error").hide();

    // ===== LOGIN FORM =====
    $("#login-form").on("submit", function (e) {
        e.preventDefault();
        var userName = $("#username_login").val().trim();
        var password = $("#password_login").val().trim();

        $("#validate_username").hide().text("");
        $("#validate_password").hide().text("");

        var isValid = true;

        if (password.length < 6) {
            isValid = false;
            $("#validate_password").show().text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        if (sqlInjectionPattern.test(userName)) {
            isValid = false;
            $("#validate_username").show().text("Tên đăng nhập không được chứa ký tự đặc biệt.");
        }

        if (sqlInjectionPattern.test(password)) {
            isValid = false;
            $("#validate_password").show().text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        if (isValid) {
            var formData = {
                username: userName,
                password: password,
                _token: $('input[name="_token"]').val(),
            };

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        window.location.href = "/";
                        toastr.success(response.message, "Thành công");
                    } else {
                        $("#login-form #message").hide();
                        $("#login-form #error").text(response.message).show();
                        toastr.error(response.message, "Thất bại");
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr.error("Có lỗi xảy ra", "Lỗi");
                },
            });
        }
    });

    // ===== REGISTER FORM =====
    $("#register-form").on("submit", function (e) {
        e.preventDefault();
        $(".loader").show();
        $("#register-form").addClass("hident-content");

        var userName = $("#username_register").val().trim();
        var email = $("#email_register").val().trim();
        var password = $("#password_register").val().trim();
        var rePass = $("#re_pass").val().trim();

        $("#validate_username_regis").hide().text("");
        $("#validate_email_regis").hide().text("");
        $("#validate_password_regis").hide().text("");
        $("#validate_repass").hide().text("");

        var isValid = true;

        if (sqlInjectionPattern.test(userName)) {
            isValid = false;
            $("#validate_username_regis").show().text("Tên tài khoản không được chứa ký tự đặc biệt.");
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            isValid = false;
            $("#validate_email_regis").show().text("Email không hợp lệ.");
        }

        if (password.length < 6) {
            isValid = false;
            $("#validate_password_regis").show().text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        if (sqlInjectionPattern.test(password)) {
            isValid = false;
            $("#validate_password_regis").show().text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

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

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        $("#register-form #message").text(response.message).show();
                        $("#register-form #error").hide();
                        $("#register-form").trigger("reset");
                        toastr.success(response.message, "Thành công");
                    } else {
                        $("#register-form #message").hide();
                        $("#register-form #error").text("Tên tài khoản hoặc email đã tồn tại").show();
                        toastr.error("Tên tài khoản hoặc email đã tồn tại", "Lỗi");
                    }
                    $(".loader").hide();
                    $("#register-form").removeClass("hident-content");
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr.error("Có lỗi xảy ra", "Lỗi");
                    $(".loader").hide();
                    $("#register-form").removeClass("hident-content");
                },
            });
        } else {
            $(".loader").hide();
            $("#register-form").removeClass("hident-content");
        }
    });

    // ===== LEGACY FILTER FUNCTION (for backward compatibility) =====
    function filterTours(minPrice = null, maxPrice = null, sorting = "default") {
        $(".loader").show();
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
            url: typeof filterToursUrl !== 'undefined' ? filterToursUrl : '/filter-tours',
            method: "GET",
            data: formDataFilter,
            success: function (res) {
                $("#tours-container").html(res);
                $(".loader").hide();
                $("#tours-container").removeClass("hident-content");
            },
            error: function () {
                $(".loader").hide();
                $("#tours-container").removeClass("hident-content");
                toastr.error("Có lỗi xảy ra khi lọc tours");
            },
        });
    }

    

    // ===== USER PROFILE FUNCTIONS =====
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

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: dataUpdate,
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.");
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

        if (oldPass.length < 6 || newPass.length < 6) {
            isValid = false;
            $("#validate_password").show().text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        if (sqlInjectionPattern.test(newPass)) {
            isValid = false;
            $("#validate_password").show().text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        if (isValid) {
            $("#validate_password").hide().text("");
            var updatePass = {
                oldPass: oldPass, 
                newPass: newPass,
                _token: $('input[name="_token"]').val(),
            };

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: updatePass,
                success: function (response) {
                    if (response.success) {
                        $("#validate_password").hide().text("");
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $("#validate_password").show().text(xhr.responseJSON?.message || "Có lỗi xảy ra");
                    toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.");
                },
            });
        }
    });

    // ===== AVATAR UPDATE =====
    $("#avatar").on("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $("#avatarPreview").attr("src", e.target.result);
                $(".img-account-profile").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);

            var __token = $(this).closest(".card-body").find("input.__token").val();
            var url_avatar = $(this).closest(".card-body").find("input.label_avatar").val();
            
            const formData = new FormData();
            formData.append("avatar", file);

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
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.", "Lỗi");
                },
            });
        }
    });

    // ===== SEARCH FUNCTIONALITY =====
    $('#search_form').on('submit', function(event) {
        var destination = $('#destination').val();
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();

        if (destination === "") {
            event.preventDefault();
            toastr.error('Vui lòng chọn điểm đến.');
            return;
        }

        function convertDateFormat(date) {
            var parts = date.split('/');
            return parts[2] + '-' + parts[1] + '-' + parts[0];
        }

        if (startDate && endDate) {
            var startDateFormatted = new Date(convertDateFormat(startDate));
            var endDateFormatted = new Date(convertDateFormat(endDate));

            if (startDateFormatted > endDateFormatted) {
                event.preventDefault();
                toastr.error('Ngày khởi hành không thể lớn hơn ngày kết thúc.');
                return;
            }
        }
    });

    // Toggle search form
    $('#searchToggle').on('click', function() {
        const form = $('#searchForm');
        if (form.hasClass('hide')) {
            form.removeClass('hide');
            setTimeout(function() {
                $('input[name="keyword"]').focus();
            }, 100);
        } else {
            form.addClass('hide');
        }
    });
    
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.nav-search').length) {
            $('#searchForm').addClass('hide');
        }
    });
    
    // ===== VOICE SEARCH =====
    if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
        var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'vi-VN';
        recognition.continuous = false;
        recognition.interimResults = true;
        
        var isRecognizing = false;
        
        $('#voice-search').on('click', function(e) {
            e.preventDefault();
            
            if (isRecognizing) {
                recognition.stop();
                $(this).removeClass('fa-microphone-slash').addClass('fa-microphone');
            } else {
                try {
                    recognition.start();
                    $(this).removeClass('fa-microphone').addClass('fa-microphone-slash');
                } catch (error) {
                    console.error('Error starting recognition:', error);
                }
            }
        });
        
        recognition.onstart = function() {
            isRecognizing = true;
            $('#voice-search').removeClass('fa-microphone').addClass('fa-microphone-slash');
        };
        
        recognition.onresult = function(event) {
            var transcript = '';
            
            for (var i = event.resultIndex; i < event.results.length; ++i) {
                if (event.results[i].isFinal) {
                    transcript += event.results[i][0].transcript;
                } else {
                    transcript += event.results[i][0].transcript;
                }
            }
            
            $('input[name="keyword"]').val(transcript);
        };
        
        recognition.onerror = function(event) {
            isRecognizing = false;
            $('#voice-search').removeClass('fa-microphone-slash').addClass('fa-microphone');
        };
        
        recognition.onend = function() {
            $('#voice-search').removeClass('fa-microphone-slash').addClass('fa-microphone');
            isRecognizing = false;
        };
        
    } else {
        $('#voice-search').on('click', function(e) {
            e.preventDefault();
            toastr.error('Trình duyệt của bạn không hỗ trợ nhận diện giọng nói.');
        });
    }
    
    $('#searchForm').on('submit', function(e) {
        const keyword = $('input[name="keyword"]').val().trim();
        
        if (!keyword) {
            e.preventDefault();
            toastr.error('Vui lòng nhập từ khóa tìm kiếm.');
            return false;
        }
    });
    
    $(document).on('keydown', function(event) {
        if (event.key === 'Escape') {
            $('#searchForm').addClass('hide');
        }
    });
});