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


document.addEventListener('DOMContentLoaded', function() {
    const minSlider = document.getElementById('min-price');
    const maxSlider = document.getElementById('max-price');
    const priceDisplay = document.getElementById('price-value');
    const range = document.querySelector('.slider-range');
    
    // Set initial range position
    setRangePosition();
    
    // Update slider values when moving sliders
    minSlider.addEventListener('input', function() {
        // Ensure min doesn't exceed max
        if (parseInt(minSlider.value) > parseInt(maxSlider.value)) {
            minSlider.value = maxSlider.value;
        }
        updateValues();
    });
    
    maxSlider.addEventListener('input', function() {
        // Ensure max doesn't go below min
        if (parseInt(maxSlider.value) < parseInt(minSlider.value)) {
            maxSlider.value = minSlider.value;
        }
        updateValues();
    });
    
    function updateValues() {
        // Format price display
        const minPrice = parseInt(minSlider.value);
        const maxPrice = parseInt(maxSlider.value);
        priceDisplay.textContent = `$${minPrice} - $${maxPrice}`;
        
        // Update range position
        setRangePosition();
    }
    
    function setRangePosition() {
        const min = parseInt(minSlider.value);
        const max = parseInt(maxSlider.value);
        const minPercentage = (min / minSlider.max) * 100;
        const maxPercentage = (max / maxSlider.max) * 100;
        
        // Update the range position
        range.style.left = minPercentage + '%';
        range.style.width = (maxPercentage - minPercentage) + '%';
    }
});
