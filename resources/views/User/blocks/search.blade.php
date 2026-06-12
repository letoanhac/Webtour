<form action="{{ route('search') }}" method="GET" id="search_form">
<div class="search-filter-inner container">
    <div class="filter-item">
        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
        <div class="title">Điểm đến</div>
        <input type="text" placeholder="Nhập điểm đến..." name="destination" id="destination" class="datetimepicker-custom" style="width: 100%; border: none; outline: none; background: transparent; padding: 10px 0; color: #333; font-size: 14px;">
    </div>
    <div class="filter-item">
        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
        <div class="title">Ngày bắt đầu đặt tour</div>
        <input type="text" placeholder="Chọn ngày đi" id="in_date" name="in_date" class="datetimepicker datetimepicker-custom">

    </div>
    <div class="filter-item">
        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
        <div class="title">Ngày khởi hành</div>
        <input type="text" placeholder="Chọn ngày về" id="end_date" name="end_date" class="datetimepicker datetimepicker-custom">

    </div>
    <div class="search-button">
        <button class="theme-btn" type="submit">
            <span>Tìm Kiếm</span>
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</div>
</form>


