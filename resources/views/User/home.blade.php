@include('User.blocks.header')

<div class="content-wrapper">
    <div class="container-fluid">
        <h1>Tour & Travel</h1>
        <div class="main-hero-image" style="background-image: url({{ asset('clients/img/banner.jpg') }})"></div>
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
                                                     
                                                  </div>
                                              </div>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                          @endforeach
                    </div>

                    <div class="text-center" style="display: block; text-align: center">
                        <a href="#" class="btn-readmore">Xem thêm tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
    <li class="wrap-backgroup" style="background-color: #EBF0F2;">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: #3f3b3b;">Tour Du Lịch Hè Nước Ngoài</h2>
                    <span class="title-group-sub">Chơi Hè Thả Ga, Không Lo Về Giá</span>
                    <div class="row item-m">
                        
                    </div>

                    <div class="text-center" style="display: block; text-align: center">
                        <a href="#" class="btn-readmore">Xem thêm tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
    <li class="wrap-backgroup" style="background-color: #FFF3E0">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: #3f3b3b">Tour Du Lịch Hè Trong Nước</h2>
                    <span class="title-group-sub">Thỏa Sức Khám Phá, Giá Siêu Ưu Đãi</span>
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
                                                     
                                                  </div>
                                              </div>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                          @endforeach
                    </div>

                    <div class="text-center" style="display: block; text-align: center">
                        <a href="#" class="btn-readmore">Xem thêm tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
    <li class="wrap-backgroup" style="background-color: #F2F7FA">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: #3f3b3b">Tour Du Lịch Âu - Úc - Mỹ</h2>
                    <span class="title-group-sub">Trải Nghiệm Đẳng Cấp, Nâng Tầm Cuộc Sống</span>
                    <div class="row item-m">
                        
                    </div>

                    <div class="text-center" style="display: block; text-align: center">
                        <a href="#" class="btn-readmore">Xem thêm tours</a>
                    </div>
                </div>
            </section>
        </div>
    </li>
    <li class="wrap-backgroup" style="background-color: #FFF">
        <div class="container">
            <section class="content">
                <div class="tourHomeContainer">
                    <h2 class="title-group" style="color: rgb(63, 59, 59)">Tour Ưu Đãi Tốt Nhất Hôm Nay</h2>
                    <span class="title-group-sub">Nhanh Tay Đặt Ngay.Để Mai Sẽ Lỡ</span>
                    <div class="destinations-grid">
                        <div class="destination-card featured-destination">
                            <img src="{{ asset('clients/img/van-ly-truong-thanh-bia--360x480.jpg') }}"
                                alt="Vạn Lý Trường Thành, Trung Quốc">
                            <div class="destination-info">
                                <h2>Trung Quốc</h2>
                                <p>145 Tours</p>
                            </div>
                        </div>

                        <div class="destination-card">
                            <img src="{{ asset('clients/img/gardens-by-the-bay-singapore-ivv-360x225.jfif') }}"
                                alt="Gardens by the Bay, Singapore">
                            <div class="destination-info">
                                <h2>Singapore</h2>
                                <p>40 Tours</p>
                            </div>
                        </div>

                        <div class="destination-card">
                            <img src="{{ asset('clients/img/ivivu-chua-binh-minh-wat-arun-360x225.jpg') }}"
                                alt="Wat Arun, Thái Lan">
                            <div class="destination-info">
                                <h2>Thái Lan</h2>
                                <p>48 Tours</p>
                            </div>
                        </div>

                        <div class="destination-card">
                            <img src="{{ asset('clients/img/ivivu-thap-eiffel-1-360x225.jfif') }}"
                                alt="Tháp Eiffel, Châu Âu">
                            <div class="destination-info">
                                <h2>Châu Âu</h2>
                                <p>27 Tours</p>
                            </div>
                        </div>

                        <div class="destination-card">
                            <img src="{{ asset('clients/img/nui-phu-si-vv-360x225.jfif') }}"
                                alt="Núi Phú Sĩ, Nhật Bản">
                            <div class="destination-info">
                                <h2>Nhật Bản</h2>
                                <p>56 Tours</p>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </li>
</ul>

@include('User.blocks.footer')
