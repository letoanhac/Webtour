document.addEventListener("DOMContentLoaded", function () {
    // Lấy tất cả các phần tử có class nice-select
    const niceSelects = document.querySelectorAll(".nice-select");

    niceSelects.forEach(function (select) {
        // Sự kiện click cho nice-select
        select.addEventListener("click", function (e) {
            // Ngăn sự kiện click lan tỏa để xử lý riêng
            e.stopPropagation();

            // Toggle class open
            this.classList.toggle("open");
        });

        // Lấy tất cả các option trong nice-select hiện tại
        const options = select.querySelectorAll(".option");

        // Thêm sự kiện click cho từng option
        options.forEach(function (option) {
            option.addEventListener("click", function (e) {
                // Ngăn sự kiện click lan tỏa
                e.stopPropagation();

                // Lấy text của option được chọn
                const selectedText = this.textContent;

                // Cập nhật text hiển thị của nice-select
                select.querySelector("span").textContent = selectedText;

                // Loại bỏ class selected khỏi tất cả các option
                options.forEach((opt) => opt.classList.remove("selected"));

                // Thêm class selected cho option được chọn
                this.classList.add("selected");

                // Đóng dropdown
                select.classList.remove("open");
            });
        });
    });

    // Khi click ra ngoài thì đóng tất cả các dropdown
    document.addEventListener("click", function () {
        niceSelects.forEach(function (select) {
            select.classList.remove("open");
        });
    });
});

toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-right",
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
};
