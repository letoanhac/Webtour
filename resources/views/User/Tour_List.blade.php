@include("User.blocks.header")

    <div class="category-search mt-30">
      @include('User.blocks.search')
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
            <div class="price-filter-container">
              <h2 class="filter-title">Tìm kiếm theo giá tiền</h2>

              <div class="slider-container">
                <div class="slider-track"></div>
                <div class="slider-range"></div>
                <input
                  type="range"
                  min="0"
                  max="1000"
                  value="100"
                  class="slider"
                  id="min-price"
                />
                <input
                  type="range"
                  min="0"
                  max="1000"
                  value="750"
                  class="slider"
                  id="max-price"
                />
              </div>

              <div class="price-display">
                <span>Price </span>
                <span id="price-value">$100 - $750</span>
              </div>
            </div>
            <div class="widget widget-activity">
              <h6 class="widget-title">By Activities</h6>
              <ul class="radio-filter">
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    checked=""
                    name="ByActivities"
                    id="activity1"
                  />
                  <label for="activity1">Sea Beach <span>18</span></label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByActivities"
                    id="activity2"
                  />
                  <label for="activity2">Car Parking <span>29</span></label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByActivities"
                    id="activity3"
                  />
                  <label for="activity3">Laundry Service <span>23</span></label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByActivities"
                    id="activity4"
                  />
                  <label for="activity4">Outdoor Seating <span>25</span></label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByActivities"
                    id="activity5"
                  />
                  <label for="activity5">Reservations <span>26</span></label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByActivities"
                    id="activity6"
                  />
                  <label for="activity6">Smoking Allowed <span>28</span></label>
                </li>
              </ul>
            </div>
            <div class="widget widget-reviews">
              <h6 class="widget-title">By Reviews</h6>
              <ul class="radio-filter">
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    checked=""
                    name="ByReviews"
                    id="review1"
                  />
                  <label for="review1">
                    <span class="ratting">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </span>
                  </label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByReviews"
                    id="review2"
                  />
                  <label for="review2">
                    <span class="ratting">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt white"></i>
                    </span>
                  </label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByReviews"
                    id="review3"
                  />
                  <label for="review3">
                    <span class="ratting">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star white"></i>
                      <i class="fas fa-star-half-alt white"></i>
                    </span>
                  </label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByReviews"
                    id="review4"
                  />
                  <label for="review4">
                    <span class="ratting">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star white"></i>
                      <i class="fas fa-star white"></i>
                      <i class="fas fa-star-half-alt white"></i>
                    </span>
                  </label>
                </li>
                <li>
                  <input
                    class="form-check-input"
                    type="radio"
                    name="ByReviews"
                    id="review5"
                  />
                  <label for="review5">
                    <span class="ratting">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star white"></i>
                      <i class="fas fa-star white"></i>
                      <i class="fas fa-star white"></i>
                      <i class="fas fa-star-half-alt white"></i>
                    </span>
                  </label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tour-list-content">
          <div class="page-title">
            <h1>Tour Du Lịch Miền Trung</h1>
          </div>
          <div class="tourListContainerHeader">
            <div class="tour-title">
              <b class="title-result">Tổng cộng 20 Tour</b>
              <div class="dropdown">
                <!-- Input checkbox ẩn để toggle dropdown -->
                <input
                  type="checkbox"
                  id="dropdown-toggle"
                  class="dropdown-label"
                />

                <!-- Radio buttons ẩn để chọn option -->
                <input
                  type="radio"
                  name="sort-option"
                  id="option1"
                  class="option-input"
                  checked
                />
                <input
                  type="radio"
                  name="sort-option"
                  id="option2"
                  class="option-input"
                />
                <input
                  type="radio"
                  name="sort-option"
                  id="option3"
                  class="option-input"
                />
                <input
                  type="radio"
                  name="sort-option"
                  id="option4"
                  class="option-input"
                />
                <input
                  type="radio"
                  name="sort-option"
                  id="option5"
                  class="option-input"
                />
                <input
                  type="radio"
                  name="sort-option"
                  id="option6"
                  class="option-input"
                />
                <input
                  type="radio"
                  name="sort-option"
                  id="option7"
                  class="option-input"
                />

                <!-- Button dropdown -->
                <label for="dropdown-toggle" class="dropdown-btn">
                  <span
                    >Sắp xếp theo:
                    <strong class="selected-text" style="color: #00b6f3"
                      >IVIVU Đề Xuất</strong
                    ></span
                  >
                  <span class="dropdown-icon">▼</span>
                </label>

                <!-- Dropdown content -->
                <div class="dropdown-content">
                  <label for="option1" class="option-label"
                    >IVIVU Đề Xuất</label
                  >
                  <label for="option2" class="option-label"
                    >Ưu đãi tốt nhất</label
                  >
                  <label for="option3" class="option-label"
                    >Đánh giá cao nhất</label
                  >
                  <label for="option4" class="option-label"
                    >Thời lượng tour</label
                  >
                  <label for="option5" class="option-label"
                    >Ngày khởi hành</label
                  >
                  <label for="option6" class="option-label"
                    >Giá thấp đến cao</label
                  >
                  <label for="option7" class="option-label"
                    >Giá cao đến thấp</label
                  >
                </div>
              </div>
            </div>
          </div>

          <div class="tourList">
            @foreach ($tours as $tour)
              <div class="tourItem">
              <a href="{{ route('tour.show', ['id' => $tour->tourID]) }}">
                <div class="warpTour">
                  <span class="v-ribbon">
                    <span>Nhóm 4 giảm 3 triệu</span>
                  </span>
                  <div class="tourItemLeft">
                    <picture>
                      <img src="{{ asset('User/img/dich-vu-du-lich-2.jpg') }}" alt="Minh họa">
                    </picture>
                  </div>
                  <div class="tourItemContent">
                    <div class="tourItemContentLeft">
                      <h2 class="tourItemName">
                        {{$tour -> title}}
                      </h2>
                      <span class="score-container__inner">
                        <span class="score">9.7</span>
                        <span class="scorw-description" style="padding: 0 4px"
                          >Tuyệt vời</span
                        >
                        <span>| 7 đánh giá</span>
                      </span>
                    </div>
                    <div class="tourItemContentPrice">
                      <span class="tourItemDateTime">
                        <i class="fa-regular fa-calendar"></i>
                      </span>
                    </div>
                    <div class="tourNote">
                      <div class="tourTime">
                        <i class="fa-regular fa-clock"></i>
                      </div>
                      <div class="wrapItemPrice">
                        <span class="tourItemPrice">
                          {{ number_format($tour->priceAdult, 0, ',','.') }}
                          <span class="tourItemCurrency">đ</span>
                        </span>
                        <div class="tourViewDetail">
                          <button class="btn">
                            Xem tour<i class="fa-solid fa-chevron-right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
         
        </div>
      </div>
    </div>
   @include("User.blocks.footer")
