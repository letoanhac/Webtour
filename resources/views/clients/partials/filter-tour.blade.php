 @foreach ($tours as $tour)
     <div class="tourItem">
         <a href="#">
             <div class="warpTour">
                 <span class="v-ribbon">
                     <span>Nhóm 4 giảm 3 triệu</span>
                 </span>
                 <div class="tourItemLeft">
                     <picture>
                         <img src="{{ asset('clients/img/gallery-tours/' . $tour->images[0]) }}" alt="" />
                     </picture>
                 </div>
                 <div class="tourItemContent">
                     <div class="tourItemContentLeft">
                         <h2 class="tourItemName">
                             {{ $tour->title }}
                         </h2>
                         <span class="score-container__inner">
                             <span class="score">9.7</span>
                             <span class="scorw-description" style="padding: 0 4px">Tuyệt vời</span>
                             <span>| 7 đánh giá</span>
                         </span>
                     </div>
                     <div class="tourItemContentPrice">
                         <span class="tourItemDateTime">
                             <i class="fa-regular fa-calendar"></i>
                             {{ $tour->startDate }}
                         </span>
                     </div>
                     <div class="tourNote">
                         <div class="tourTime">
                             <i class="fa-regular fa-clock"></i>
                             {{ $tour->time }}
                         </div>
                         <div class="wrapItemPrice">
                             <span class="tourItemPrice">
                                 {{ number_format($tour->priceAdult, 0, ',', '.') }}
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
