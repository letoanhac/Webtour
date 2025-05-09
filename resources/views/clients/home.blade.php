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
              <h2 class="title-group" style="color: #3f3b3b;">Tour Du Lịch Hè Nước Ngoài</h2>
              <span class="title-group-sub"
                >Chơi Hè Thả Ga, Không Lo Về Giá</span
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
      <li class="wrap-backgroup" style="background-color: #FFF3E0">
        <div class="container">
          <section class="content">
            <div class="tourHomeContainer">
              <h2 class="title-group" style="color: #3f3b3b">Tour Du Lịch Hè Trong Nước</h2>
              <span class="title-group-sub"
                >Thỏa Sức Khám Phá, Giá Siêu Ưu Đãi</span
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
      <li class="wrap-backgroup" style="background-color: #F2F7FA">
        <div class="container">
          <section class="content">
            <div class="tourHomeContainer">
              <h2 class="title-group" style="color: #3f3b3b">Tour Du Lịch Âu - Úc - Mỹ</h2>
              <span class="title-group-sub"
                >Trải Nghiệm Đẳng Cấp, Nâng Tầm Cuộc Sống</span
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
      <li class="wrap-backgroup" style="background-color: #FFF">
        <div class="container">
          <section class="content">
            <div class="tourHomeContainer">
              <h2 class="title-group" style="color: rgb(63, 59, 59)">Tour Ưu Đãi Tốt Nhất Hôm Nay</h2>
              <span class="title-group-sub"
                >Nhanh Tay Đặt Ngay.Để Mai Sẽ Lỡ</span
              >
              <div class="destinations-grid">
                <div class="destination-card featured-destination">
                    <img src="{{ asset('clients/img/van-ly-truong-thanh-bia--360x480.jpg') }}" alt="Vạn Lý Trường Thành, Trung Quốc">
                    <div class="destination-info">
                        <h2>Trung Quốc</h2>
                        <p>145 Tours</p>
                    </div>
                </div>
                
                <div class="destination-card">
                    <img src="{{ asset('clients/img/gardens-by-the-bay-singapore-ivv-360x225.jfif') }}" alt="Gardens by the Bay, Singapore">
                    <div class="destination-info">
                        <h2>Singapore</h2>
                        <p>40 Tours</p>
                    </div>
                </div>
                
                <div class="destination-card">
                    <img src="{{ asset('clients/img/ivivu-chua-binh-minh-wat-arun-360x225.jpg') }}" alt="Wat Arun, Thái Lan">
                    <div class="destination-info">
                        <h2>Thái Lan</h2>
                        <p>48 Tours</p>
                    </div>
                </div>
                
                <div class="destination-card">
                    <img src="{{ asset('clients/img/ivivu-thap-eiffel-1-360x225.jfif') }}" alt="Tháp Eiffel, Châu Âu">
                    <div class="destination-info">
                        <h2>Châu Âu</h2>
                        <p>27 Tours</p>
                    </div>
                </div>
                
                <div class="destination-card">
                    <img src="{{ asset('clients/img/nui-phu-si-vv-360x225.jfif') }}" alt="Núi Phú Sĩ, Nhật Bản">
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

@include('clients.blocks.footer')

