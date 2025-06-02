@foreach ($tours as $tour)
    <div class="tourItem">
        <a href="{{ route('tour.show', ['id' => $tour->tourID]) }}" >
            <div class="warpTour">
                <span class="v-ribbon">
                    <span>Nhóm 4 giảm 3 triệu</span>
                </span>
                <div class="tourItemLeft">
                    <picture>
                        @if (!empty($tour->images) && isset($tour->images[0]))
                           <img src="{{ asset($tour->images[0]) }}"
                               alt="" />
                       @endif
                    </picture>
                </div>
                <div class="tourItemContent">
                    <div class="tourItemContentLeft">
                        <h2 class="tourItemName">
                            {{ $tour->title }}
                        </h2>
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

{{-- Pagination --}}
@if(isset($pagination) && $pagination['total_pages'] > 1)
<div class="col-lg-12">
    <ul class="pagination justify-content-center pt-15 flex-wrap pagination-tours" data-aos="fade-up"
        data-aos-duration="1500" data-aos-offset="50">
        
        {{-- Previous Page Link --}}
        @if($pagination['prev_page'])
            <li class="page-item">
                <a class="page-link pagination-link" href="#" data-page="{{ $pagination['prev_page'] }}">
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
                <a class="page-link pagination-link" href="#" data-page="{{ $i }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Next Page Link --}}
        @if($pagination['next_page'])
            <li class="page-item">
                <a class="page-link pagination-link" href="#" data-page="{{ $pagination['next_page'] }}">
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
@endif