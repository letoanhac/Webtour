<div style="background: #fff; padding: 20px; max-width: 2500px; font-family: Arial, sans-serif; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">

    <h4 style="font-weight: bold; color: #333;">
        Đánh giá khách hàng về: {{ $tour->title }}
    </h4>

    <div style="margin-top: 10px; display: flex; align-items: center;">
        <div style="background: #2b7a78; color: white; font-weight: bold; font-size: 20px; padding: 5px 12px; border-radius: 6px;">
            {{ $avgRating }}/5
        </div>
        @if ($avgRating >= 5)
            <div style="margin-left: 10px; font-weight: 600; color: #3aafa9;">Tuyệt vời</div>
        @elseif ($avgRating >= 4)
            <div style="margin-left: 10px; font-weight: 600; color: #3aafa9;">Rất Tốt</div>
        @elseif ($avgRating >= 3)
            <div style="margin-left: 10px; font-weight: 600; color: #3aafa9;">Bình Thường</div>
        @elseif ($avgRating >= 2)
            <div style="margin-left: 10px; font-weight: 600; color: #3aafa9;">Cần cải Thiện</div>
        @endif
        <div style="margin-left: auto; color: #666;">{{ $totalReviews }} đánh giá</div>
    </div>

    <hr>

    <h5 style="margin-top: 20px;">Đánh giá gần đây</h5>

    @forelse ($reviews as $review)
        <div style="border-bottom: 1px solid #ddd; padding: 15px 0;">
            <strong style="font-size: 16px;">{{ $review->user->username ?? 'Ẩn danh' }}</strong>
            <div style="display: flex; align-items: center; margin: 5px 0;">
                <span style="background: #2b7a78; color: white; font-weight: bold; padding: 3px 10px; border-radius: 4px;">
                    {{ number_format($review->rating, 1) }}
                </span>
                <span style="margin-left: 8px; color: #3aafa9; font-weight: 600;">
                    @if ($review->rating >= 5)
                        Tuyệt vời
                    @elseif ($review->rating >= 4)
                        Rất tốt
                    @elseif ($review->rating >= 3)
                        Bình thường
                    @else
                        Cần cải thiện
                    @endif
                </span>
                <span style="margin-left: auto; color: #999;">
                    {{ \Carbon\Carbon::parse($review->timestamp)->format('d-m-Y') }}
                </span>
            </div>
            <div style="color: #444; font-size: 14px;">
                {{ $review->comment }}
            </div>
        </div>
    @empty
        <p style="color: #888; font-style: italic;">Chưa có đánh giá nào.</p>
    @endforelse

    @if ($reviews->hasPages())
        <div class="review-pagination">
            @if ($reviews->onFirstPage())
                <span class="review-page-btn review-page-disabled">&laquo;</span>
            @else
                <a class="review-page-btn" href="{{ $reviews->previousPageUrl() }}#reviews">&laquo;</a>
            @endif

            @foreach ($reviews->getUrlRange(1, $reviews->lastPage()) as $page => $url)
                @if ($page == $reviews->currentPage())
                    <span class="review-page-btn review-page-active">{{ $page }}</span>
                @else
                    <a class="review-page-btn" href="{{ $url }}#reviews">{{ $page }}</a>
                @endif
            @endforeach

            @if ($reviews->hasMorePages())
                <a class="review-page-btn" href="{{ $reviews->nextPageUrl() }}#reviews">&raquo;</a>
            @else
                <span class="review-page-btn review-page-disabled">&raquo;</span>
            @endif
        </div>
    @endif
</div>

<style>
    .review-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        gap: 5px;
    }
    .review-page-btn {
        display: inline-block;
        padding: 5px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.2s, border-color 0.2s;
    }
    .review-page-btn:hover {
        background-color: #f1f1f1;
        text-decoration: none;
        color: #333;
    }
    .review-page-active {
        background-color: #2b7a78;
        color: white;
        border-color: #2b7a78;
    }
    .review-page-disabled {
        color: #aaa;
        border-color: #eee;
        cursor: not-allowed;
    }
</style>
