<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="category-search">
        <div class="search-filter-inner container mt-30">
            <div class="filter-item">
                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="title">Điểm đến</div>
                <select name="city" id="city" style="display: none">
                    <option value="0">Hồ Chí Minh</option>
                    <option value="1">Hà Nội</option>
                    <option value="2">Đà Nẵng</option>
                </select>
                <div class="nice-select">
                    <span>Hồ Chí Minh</span>
                    <ul class="list">
                        <li class="option selected">Hồ Chí Minh</li>
                        <li class="option">Hà Nội</li>
                        <li class="option">Đà Nẵng</li>
                    </ul>
                </div>
            </div>
            <div class="filter-item">
                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="title">Điểm đến</div>
                <select name="city" id="city" style="display: none">
                    <option value="0">Hồ Chí Minh</option>
                    <option value="1">Hà Nội</option>
                    <option value="2">Đà Nẵng</option>
                </select>
                <div class="nice-select">
                    <span>Hồ Chí Minh</span>
                    <ul class="list">
                        <li class="option selected">Hồ Chí Minh</li>
                        <li class="option">Hà Nội</li>
                        <li class="option">Đà Nẵng</li>
                    </ul>
                </div>
            </div>
            <div class="filter-item">
                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="title">Điểm đến</div>
                <select name="city" id="city" style="display: none">
                    <option value="0">Hồ Chí Minh</option>
                    <option value="1">Hà Nội</option>
                    <option value="2">Đà Nẵng</option>
                </select>
                <div class="nice-select">
                    <span>Hồ Chí Minh</span>
                    <ul class="list">
                        <li class="option selected">Hồ Chí Minh</li>
                        <li class="option">Hà Nội</li>
                        <li class="option">Đà Nẵng</li>
                    </ul>
                </div>
            </div>
            <div class="search-button">
                <button class="theme-btn">
                    <span>Tìm Kiếm</span>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </div>

    <ul class="ls-tour-groups">
        <li class="wrap-backgroup" style="background-color: #EBF0F2;">
            <div class="container">
                <section class="content">
                    <div class="tourHomeContainer">
                        <h2 class="title-group" style="color: #3f3b3b;">Tour Ưu Đãi Tốt Nhất Hôm Nay</h2>
                        <span class="title-group-sub">Nhanh Tay Đặt Ngay.Để Mai Sẽ Lỡ</span>
                        <div class="row item-m">
                            @if ($tours->isEmpty())
                                <h4 class="alert alert-danger">Không có tour nào liên quan đến tìm kiếm của bạn. Thử tìm
                                    kiếm với từ khóa khác nhé!</h4>
                            @else
                                @foreach ($tours as $tour)
                                    <div class="card">
                                        <div class="cardItem">
                                            <a href="#">
                                                <div class="cardItemContainer">
                                                    <div class="cardItemImage">
                                                        <div class="ribbonContainerOuter">
                                                            <div class="ribbonContainerInner">
                                                                <div class="v-ribbon">
                                                                    <span>{{ $tour->description }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <figure>
                                                            <picture>
                                                                @if (count($tour->images) > 0)
                                                                    <img src="{{ asset( $tour->images[0]) }}"
                                                                        alt="Tour List">
                                                                @else
                                                                    <img src="{{ asset('admin/assets/img/user-profile/No_image_available.svg.png') }}"
                                                                        alt="No Image Available">
                                                                @endif
                                                            </picture>
                                                        </figure>
                                                    </div>
                                                    <div class="cardItemContent">
                                                        <div class="cardItemTourNameDiv">
                                                            <span class="cardItemTourName">{{ $tour->title }}</span>
                                                        </div>
                                                        <div class="cardItemTourDetailDiv">
                                                            <span class="score-container__inner">
                                                                <div class="score">9.7</div>
                                                                <div class="score-description">Tuyệt vời</div>
                                                                <span> | 7 đánh giá</span>
                                                            </span>
                                                            <div class="cardItemDepartDiv">
                                                                <ul class="tourListPros">
                                                                    <li>{{ $tour->destination }}</li>
                                                                </ul>
                                                            </div>
                                                            <div class="cardItemPrice">
                                                                <span class="price">
                                                                    {{ number_format($tour->priceAdult, 0, ',', '.') }}
                                                                    <small style="font-size: 20px; padding-left: 8px">đ
                                                                    </small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="text-center" style="display: block; text-align: center">
                            <a href="{{ route('tourList') }}" class="btn-readmore">Xem thêm tours</a>
                        </div>
                    </div>
                </section>
            </div>
        </li>
    </ul>
    @include('clients.blocks.footer')
