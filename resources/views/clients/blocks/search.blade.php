<form action="{{ route('search') }}" method="GET" id="search_form">
<div class="search-filter-inner container">
        <div class="filter-item">
            <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
            <div class="title">Điểm đến</div>
             <select name="destination" id="destination" style="padding: 8px">
                        <option value="">Chọn điểm đến</option>
                        <option value="dn">Đà Nẵng</option>
                        <option value="cd">Côn Đảo</option>
                        <option value="hn">Hà Nội</option>
                        <option value="hcm">TP. Hồ Chí Minh</option>
                        <option value="hl">Hạ Long</option>
                        <option value="nb">Ninh Bình</option>
                        <option value="pq">Phú Quốc</option>
                        <option value="dl">Đà Lạt</option>
                        <option value="qt">Quảng Trị</option>
                        <option value="kh">Khánh Hòa (Nha Trang)</option>
                        <option value="ct">Cần Thơ</option>
                        <option value="vt">Vũng Tàu</option>
                        <option value="qn">Quảng Ninh</option>
                        <option value="la">Lào Cai (Sa Pa)</option>
                        <option value="bd">Bình Định (Quy Nhơn)</option>
                    </select>
        </div>
        <div class="filter-item">
            <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
            <div class="title">Ngày khởi hành</div>
            <input type="text" placeholder="Chọn ngày đi" id="start_date" name="start_date" class="datetimepicker datetimepicker-custom">
    
        </div>
        <div class="filter-item">
            <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
            <div class="title">Ngày kết thúc</div>
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



