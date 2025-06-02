@include('clients.blocks.header')
@include('User.blocks.overlay')
<div class="category-search mt-30">
    @include('clients.blocks.search')
</div>

<div class="container">
    <div class="content-header">
        <ul>
            <li>
                <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
            </li>
            <li><a href="#">Danh sách Tours</a></li>
        </ul>
    </div>
    <div class="tour-list-page">
        <div class="tour-list-sidebar">
            <div class="shop-sidebar">
                <div style="display: flex;justify-content: end;">
                    <button class="clear_filter" name="btn_clear">
                        Clear
                    </button>

                </div>
                <div class="widget widget-filter">
                    <h6 class="widget-title">Lọc theo giá</h6>
                    <div class="price-filter-wrap">
                        <div class="price-slider-range"></div>
                        <div class="price1">
                            <span>Giá </span>
                            <input type="text" id="price1" readonly>
                        </div>
                    </div>
                </div>
                <div class="widget widget-activity">
                    <h6 class="widget-title" style="margin-top: 20px">Điểm đến</h6>
                    <ul class="radio-filter">
                        <li>
                            <input class="form-check-input" type="radio" name="domain" id="id_mien_bac"
                                value="b" />
                            <label for="mien_bac">Miền Bắc <span>{{ $domainsCount['mien_bac'] }}</span></label>
                        </li>
                        <li>
                            <input class="form-check-input" type="radio" name="domain" id="id_mien_trung"
                                value="t" />
                            <label for="id_mien_trung">Miền Trung <span>{{ $domainsCount['mien_trung'] }}</span></label>
                        </li>
                        <li>
                            <input class="form-check-input" type="radio" name="domain" id="id_mien_nam"
                                value="n" />
                            <label for="id_mien_nam">Miền Nam <span>{{ $domainsCount['mien_nam'] }}</span></label>
                        </li>
                    </ul>
                </div>


                <div class="widget widget-duration">
                    <h6 class="widget-title">Thời gian</h6>
                    <ul class="radio-filter">
                        <li>
                            <input class="form-check-input" type="radio" name="duration" id="3ngay2dem"
                                value="3n2d" />
                            <label for="3ngay2dem">3 ngày 2 đêm</label>
                        </li>
                        <li>
                            <input class="form-check-input" type="radio" name="duration" id="4ngay3dem"
                                value="4n3d" />
                            <label for="4ngay3dem">4 ngày 3 đêm</label>
                        </li>
                        <li>
                            <input class="form-check-input" type="radio" name="duration" id="5ngay4dem"
                                value="5n4d" />
                            <label for="5ngay4dem">5 ngày 4 đêm</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tour-list-content">
            <div class="page-title">
                <h1>Danh sách Tour</h1>
            </div>
            <div class="tourListContainerHeader">
                <div class="tour-title">
                    <b class="title-result">
                        Tổng cộng {{ $totalTours }} Tour
                        
                    </b>
                    <div style="display:flex;align-items:center">
                        <div class="sort-text " style="width:100%">
                            Sắp xếp theo
                        </div>
                        <select id="sorting_tours" style="width:auto;padding:8px; margin-left: 8px">
                            <option value="default" selected="">Sắp xếp theo</option>
                            <option value="new">Mới nhất</option>
                            <option value="old">Cũ nhất</option>
                            <option value="hight-to-low">Cao đến thấp</option>
                            <option value="low-to-high">Thấp đến cao</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="loader"></div>
            <div class="tourList" id="tours-container">
                @include('clients.partials.filter-tour')
            </div>

        </div>
    </div>
</div>



@include('clients.blocks.footer')
<script>
    var filterToursUrl = "{{ route('filter-tours') }}";
</script>
