@include('clients.blocks.header')
<ul class="ls-tour-groups">
    <li class="wrap-backgroup" style="background-color: #EBF0F2;">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: #3f3b3b;">{{ $title }}</h2>
                    <span class="title-group-sub">Tất cả tours {{ $title }}</span>
                    <div class="row item-m">
                        @if ($tours->isEmpty())
                            <h4 class="alert alert-danger">Hiện tại chưa có tour nào trong khu vực này!</h4>
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
                                                                <img src="{{ asset($tour->images[0]) }}"
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
                    
                    {{-- Pagination --}}
                    @if(isset($pagination) && $pagination['total_pages'] > 1)
                    <div class="col-lg-12">
                        <ul class="pagination justify-content-center pt-15 flex-wrap pagination-tours" data-aos="fade-up"
                            data-aos-duration="1500" data-aos-offset="50">
                            
                            {{-- Previous Page Link --}}
                            @if($pagination['prev_page'])
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('tours.by.domain', ['domain' => $domain, 'page' => $pagination['prev_page']]) }}">
                                       <i class="fa-solid fa-arrow-left"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fa-solid fa-arrow-left"></i></span>
                                </li>
                            @endif

                            {{-- Page Numbers --}}
                            @for ($i = 1; $i <= $pagination['total_pages']; $i++)
                                <li class="page-item @if ($i == $pagination['current_page']) active @endif">
                                    <a class="page-link" href="{{ route('tours.by.domain', ['domain' => $domain, 'page' => $i]) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            {{-- Next Page Link --}}
                            @if($pagination['next_page'])
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('tours.by.domain', ['domain' => $domain, 'page' => $pagination['next_page']]) }}">
                                       <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fa-solid fa-arrow-right"></i></span>
                                </li>
                            @endif
                        </ul>
                    </div>
                    
                    {{-- Thông tin phân trang --}}
                    <div class="col-lg-12 text-center mt-3">
                        <p class="pagination-info">
                            Hiển thị {{ ($pagination['current_page'] - 1) * $pagination['per_page'] + 1 }} - 
                            {{ min($pagination['current_page'] * $pagination['per_page'], $pagination['total']) }} 
                            trong tổng số {{ $pagination['total'] }} tours
                        </p>
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </li>
</ul>
@include('clients.blocks.footer')