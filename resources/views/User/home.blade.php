@include('User.blocks.header')

<div class="content-wrapper">
    <div class="container-fluid">
        <h1>Tour & Travel</h1>
        <div class="main-hero-image" style="background-image: url('https://media.vov.vn/sites/default/files/styles/large/public/2020-09/99-thuyen_hoa.jpg')"></div>
    </div>

    @include('User.blocks.search')

</div>

<ul class="ls-tour-groups">
    <li class="wrap-backgroup">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group">Tour Ưu Đãi Tốt Nhất Hôm Nay</h2>
                    <span class="title-group-sub">Nhanh Tay Đặt Ngay.Để Mai Sẽ Lỡ</span>
                    <div class="row item-m">
                        @foreach ($tours as $tour)
                              <div class="card">
                                  <div class="cardItem">
                                      <a href="{{ route('tour.show', ['id' => $tour->tourID]) }}">
                                          <div class="cardItemContainer">
                                              <div>
                                                  <div class="cardItemImage">
                                                      <figure>
                                                        @if($tour->firstImage)
                                                            <img src="{{ $tour->firstImage->imageURL }}" alt="{{ $tour->title }}">
                                                        @else
                                                            <img src="{{ asset('clients/img/default-image.jpg') }}" alt="No image">
                                                        @endif
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
                                                                <li>{{ $tour->description}}</li>
                                                                <li>{{ $tour->destination}}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="cardItemPrice">
                                                            <span class="price">
                                                                <span>{{ number_format($tour->priceAdult, 0, ',','.') }}</span>
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
                        <a href="{{ route('tourList') }}" class="btn-readmore">Xem thêm tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
@include('User.blocks.footer')
