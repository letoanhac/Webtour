@include('clients.blocks.header')

    <div class="content-wrapper">
      <div class="container-fluid">
        <h1>Tour & Travel</h1>
        <div
          class="main-hero-image"
          style="background-image: url({{ asset('clients/img/banner.jpg') }})"
        ></div>
      </div>
      <div class="container">
        <div class="search-filter-inner">
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
    </div>

    <ul class="ls-tour-groups">
      <li class="wrap-backgroup">
        <div class="container">
          <section class="content">
            <div class="tourHomeContainer">
              <h2 class="title-group">Tour Ưu Đãi Tốt Nhất Hôm Nay</h2>
              <span class="title-group-sub"
                >Nhanh Tay Đặt Ngay.Để Mai Sẽ Lỡ</span
              >
              <div class="row item-m">
                <div class="card">
                  <div class="cardItem">
                    <a href="#">
                      <div class="cardItemContainer">
                        <div class="cardItemImage">
                          <div class="ribbonContainerOuter">
                            <div class="ribbonContainerInner">
                              <div class="v-ribbon">
                                <span>Nhóm 4 giảm 3 triệu</span>
                              </div>
                            </div>
                          </div>
                          <figure>
                            <picture>
                              <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                            </picture>
                          </figure>
                        </div>
                        <div class="cardItemContent">
                          <div class="cardItemTourNameDiv">
                            <span class="cardItemTourName"
                              >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                              - Osaka Mùa Hè</span
                            >
                          </div>
                          <div class="cardItemTourDetailDiv">
                            <span class="score-container__inner">
                              <div class="score">9.7</div>
                              <div class="score-description">Tuyệt vời</div>
                              <span> | 7 đánh giá</span>
                            </span>
                            <div class="cardItemDepartDiv">
                              <ul class="tourListPros">
                                <li>Du Thuyền Kawaguko</li>
                                <li>Chùa Vàng Kinkakuji</li>
                                <li>Trải Nghiệm Mặc Đồ Yukata</li>
                              </ul>
                            </div>
                            <div class="cardItemPrice">
                              <span class="price">
                                32.900.000
                                <small
                                  style="font-size: 20px; padding-left: 8px"
                                  >đ
                                </small>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                
              </div>

              <div
                class="text-center"
                style="display: block; text-align: center"
              >
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
              <h2 class="title-group" style="color: #3f3b3b;">Tour Ưu Đãi Tốt Nhất Hôm Nay</h2>
              <span class="title-group-sub"
                >Nhanh Tay Đặt Ngay.Để Mai Sẽ Lỡ</span
              >
              <div class="row item-m">
                <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
              </div>

              <div
                class="text-center"
                style="display: block; text-align: center"
              >
                <a href="#" class="btn-readmore">Xem thêm tours</a>
              </div>
            </div>
          </section>
        </div>
      </li>
      <li class="wrap-backgroup">
        <div class="container">
          <section class="content">
            <div class="tourHomeContainer">
              <h2 class="title-group">Tour Ưu Đãi Tốt Nhất Hôm Nay</h2>
              <span class="title-group-sub"
                >Nhanh Tay Đặt Ngay.Để Mai Sẽ Lỡ</span
              >
              <div class="row item-m">
                <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="cardItem">
                      <a href="#">
                        <div class="cardItemContainer">
                          <div class="cardItemImage">
                            <div class="ribbonContainerOuter">
                              <div class="ribbonContainerInner">
                                <div class="v-ribbon">
                                  <span>Nhóm 4 giảm 3 triệu</span>
                                </div>
                              </div>
                            </div>
                            <figure>
                              <picture>
                                <img src="{{ asset('clients/img/product1.jpg') }}" alt="" />
                              </picture>
                            </figure>
                          </div>
                          <div class="cardItemContent">
                            <div class="cardItemTourNameDiv">
                              <span class="cardItemTourName"
                                >Tour Nhật Bản 6N5Đ: Tokyo - Fuji - Nagoya - Kyoto
                                - Osaka Mùa Hè</span
                              >
                            </div>
                            <div class="cardItemTourDetailDiv">
                              <span class="score-container__inner">
                                <div class="score">9.7</div>
                                <div class="score-description">Tuyệt vời</div>
                                <span> | 7 đánh giá</span>
                              </span>
                              <div class="cardItemDepartDiv">
                                <ul class="tourListPros">
                                  <li>Du Thuyền Kawaguko</li>
                                  <li>Chùa Vàng Kinkakuji</li>
                                  <li>Trải Nghiệm Mặc Đồ Yukata</li>
                                </ul>
                              </div>
                              <div class="cardItemPrice">
                                <span class="price">
                                  32.900.000
                                  <small
                                    style="font-size: 20px; padding-left: 8px"
                                    >đ
                                  </small>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>

              </div>

              <div
                class="text-center"
                style="display: block; text-align: center"
              >
                <a href="#" class="btn-readmore">Xem thêm tours</a>
              </div>
            </div>
          </section>
        </div>
      </li>
    </ul>

@include('clients.blocks.footer')

