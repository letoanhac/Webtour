@include('clients.blocks.header')
    <ul class="ls-tour-groups">
        <li class="wrap-backgroup" style="background-color: #EBF0F2;">
            <div class="container">
                <section class="content">
                    <div class="tourHomeContainer">
                        <h2 class="title-group" style="color: #3f3b3b;">Trang tìm kiếm tour</h2>
                        <span class="title-group-sub">Kết quả tìm kiếm tour</span>
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
                                                            <span class="score-description"><b>Ngày bắt đầu:</b>
                                                                {{ \Carbon\Carbon::parse($tour->startDate)->format('d-m-Y') }}</span>
                                                            <span class="score-description"><b>Ngày kết thúc:</b>
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

                    </div>
                </section>
            </div>
        </li>
    </ul>
    @include('clients.blocks.footer')
