@include('clients.blocks.header')

<div class="content-wrapper">
    <div class="container-fluid">
        <h1>Tour & Travel</h1>
        <div class="main-hero-image" style="background-image: url({{ asset('clients/img/banner.jpg') }})"></div>
    </div>

    @include('clients.blocks.search')

</div>

<ul class="ls-tour-groups">
    <li class="wrap-backgroup" style="background-color: #feffff;">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: #3f3b3b;">Tour Du lịch Miền Nam</h2>
                    <span class="title-group-sub">Nhanh Tay Đặt Ngay. Để Mai Sẽ Lỡ</span>
                    <div class="row item-m">
                        @foreach ($toursN as $tour)
                            <div class="card">
                                <div class="cardItem">
                                    <a href="{{ route('tour.show', ['id' => $tour->tourID]) }}">
                                        <div class="cardItemContainer">
                                            <div>
                                                <div class="cardItemImage">
                                                    <div class="ribbonContainerOuter">
                                                        <div class="ribbonContainerInner">
                                                            <div class="v-ribbon">
                                                                <span>{{ $tour->tag }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <figure>
                                                        <picture>
                                                            @if (!empty($tour->images) && isset($tour->images[0]))
                                                                <img src="{{ asset($tour->images[0]) }}"
                                                                    alt="" />
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
                                                            <span class="score-description"><b>Mở bán:</b>
                                                                {{ \Carbon\Carbon::parse($tour->startDate)->format('d-m-Y') }}</span>
                                                            <span class="score-description"><b>Kết thúc bán:</b>
                                                                {{ \Carbon\Carbon::parse($tour->endDate)->format('d-m-Y') }}</span>
                                                        </span>
                                                        <span >
                                                            <div class="tourTime" style="margin: 4px 0px 0px 15px;">
                                                                <i class="fa-regular fa-clock"></i>
                                                                {{ $tour->time }}
                                                            </div>
                                                        </span>
                                                        <div class="cardItemDepartDiv">
                                                            <ul class="tourListPros">
                                                                @php
                                                                    $destinations = explode('-', $tour->destination);
                                                                @endphp
                                                                @foreach ($destinations as $dest)
                                                                    <li>{{ trim($dest) }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="cardItemPrice">
                                                            <span class="price">
                                                                <span>{{ number_format($tour->priceAdult, 0, ',', '.') }}</span>
                                                                <small style="font-size: 20px; padding-left: 8px">đ
                                                                </small>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="text-center" style="display: block; text-align: center">
                        <a href="{{ route('tours.by.domain', ['domain' => 'n']) }}" class="btn-readmore">Xem thêm
                            tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
    <li class="wrap-backgroup" style="background-color: #feffff;">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: #3f3b3b;">Tour Du Lịch Miền Bắc</h2>
                    <span class="title-group-sub">Chơi Hè Thả Ga, Không Lo Về Giá</span>
                    <div class="row item-m">
                        @foreach ($toursB as $tour)
                            <div class="card">
                                <div class="cardItem">
                                    <a href="{{ route('tour.show', ['id' => $tour->tourID]) }}">
                                        <div class="cardItemContainer">
                                            <div>
                                                <div class="cardItemImage">
                                                    <div class="ribbonContainerOuter">
                                                        <div class="ribbonContainerInner">
                                                            <div class="v-ribbon">
                                                                <span>{{ $tour->tag }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <figure>
                                                        <picture>
                                                            @if (!empty($tour->images) && isset($tour->images[0]))
                                                                <img src="{{ asset($tour->images[0]) }}"
                                                                    alt="" />
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
                                                            <span class="score-description"><b>Mở bán:</b>
                                                                {{ \Carbon\Carbon::parse($tour->startDate)->format('d-m-Y') }}</span>
                                                            <span class="score-description"><b>Kết thúc bán:</b>
                                                                {{ \Carbon\Carbon::parse($tour->endDate)->format('d-m-Y') }}</span>
                                                        </span>
                                                        <span >
                                                            <div class="tourTime" style="margin: 4px 0px 0px 15px;">
                                                                <i class="fa-regular fa-clock"></i>
                                                                {{ $tour->time }}
                                                            </div>
                                                        </span>
                                                        <div class="cardItemDepartDiv">
                                                            <ul class="tourListPros">
                                                                @php
                                                                    $destinations = explode('-', $tour->destination);
                                                                @endphp
                                                                @foreach ($destinations as $dest)
                                                                    <li>{{ trim($dest) }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="cardItemPrice">
                                                            <span class="price">
                                                                <span>{{ number_format($tour->priceAdult, 0, ',', '.') }}</span>
                                                                <small style="font-size: 20px; padding-left: 8px">đ
                                                                </small>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="text-center" style="display: block; text-align: center">
                        <a href="{{ route('tours.by.domain', ['domain' => 'b']) }}" class="btn-readmore">Xem thêm
                            tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
    <li class="wrap-backgroup" style="background-color: #feffff">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: #3f3b3b">Tour Du Lịch Miền Trung</h2>
                    <span class="title-group-sub">Thỏa Sức Khám Phá, Giá Siêu Ưu Đãi</span>
                    <div class="row item-m">
                        @foreach ($toursT as $tour)
                            <div class="card">
                                <div class="cardItem">
                                    <a href="{{ route('tour.show', ['id' => $tour->tourID]) }}">
                                        <div class="cardItemContainer">
                                            <div>
                                                <div class="cardItemImage">
                                                    <div class="ribbonContainerOuter">
                                                        <div class="ribbonContainerInner">
                                                            <div class="v-ribbon">
                                                                <span>{{ $tour->tag }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <figure>
                                                        <picture>
                                                            @if (!empty($tour->images) && isset($tour->images[0]))
                                                                <img src="{{ asset($tour->images[0]) }}"
                                                                    alt="" />
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
                                                            <span class="score-description"><b>Mở bán:</b>
                                                                {{ \Carbon\Carbon::parse($tour->startDate)->format('d-m-Y') }}</span>
                                                            <span class="score-description"><b>Kết thúc bán:</b>
                                                                {{ \Carbon\Carbon::parse($tour->endDate)->format('d-m-Y') }}</span>
                                                        </span>
                                                        <span >
                                                            <div class="tourTime" style="margin: 4px 0px 0px 15px;">
                                                                <i class="fa-regular fa-clock"></i>
                                                                {{ $tour->time }}
                                                            </div>
                                                        </span>
                                                        <div class="cardItemDepartDiv">
                                                            <ul class="tourListPros">
                                                                @php
                                                                    $destinations = explode('-', $tour->destination);
                                                                @endphp
                                                                @foreach ($destinations as $dest)
                                                                    <li>{{ trim($dest) }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="cardItemPrice">
                                                            <span class="price">
                                                                <span>{{ number_format($tour->priceAdult, 0, ',', '.') }}</span>
                                                                <small style="font-size: 20px; padding-left: 8px">đ
                                                                </small>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="text-center" style="display: block; text-align: center">
                        <a href="{{ route('tours.by.domain', ['domain' => 't']) }}" class="btn-readmore">Xem thêm
                            tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
</ul>

@include('clients.blocks.footer')
