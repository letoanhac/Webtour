<div style="background: #fff; padding: 20px; max-width: 800px; margin: 0 auto; font-family: Arial, sans-serif; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">

    <h4 style="font-weight: bold; color: #333;">
        Đánh giá khách hàng về: {{ $tour->title }}
    </h4>

    {{-- Tính trung bình --}}
    @php
        $totalReviews = $reviews->count();
        $avgRating = $totalReviews > 0 ? number_format($reviews->avg('rating'), 1) : '0.0';
    @endphp

    <div style="margin-top: 10px; display: flex; align-items: center;">
        <div style="background: #4caf50; color: white; font-weight: bold; font-size: 20px; padding: 5px 12px; border-radius: 6px;">
            {{ $avgRating }}/10
        </div>
        <div style="margin-left: 10px; font-weight: 600; color: #4caf50;">Tuyệt vời</div>
        <div style="margin-left: auto; color: #666;">{{ $totalReviews }} đánh giá</div>
    </div>

    <hr>

    <h5 style="margin-top: 20px;">Đánh giá gần đây</h5>

    @forelse ($reviews as $review)
        <div style="border-bottom: 1px solid #ddd; padding: 15px 0;">
            <strong style="font-size: 16px;">{{ $review->user->username ?? 'Ẩn danh' }}</strong>

            {{-- Điểm và mức độ --}}
            <div style="display: flex; align-items: center; margin: 5px 0;">
                <span style="background: #4caf50; color: white; font-weight: bold; padding: 3px 10px; border-radius: 4px;">
                    {{ number_format($review->rating, 1) }}
                </span>
                <span style="margin-left: 8px; color: #4caf50; font-weight: 600;">
                    @if ($review->rating >= 9)
                        Tuyệt vời
                    @elseif ($review->rating >= 7)
                        Rất tốt
                    @elseif ($review->rating >= 5)
                        Bình thường
                    @else
                        Cần cải thiện
                    @endif
                </span>

                {{-- Ngày đánh giá --}}
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

    {{-- Nút xem thêm --}}
    @if ($totalReviews > 3)
        <div style="text-align: center; margin-top: 20px;">
            <a href="#" class="btn btn-outline-success">
                {{ $totalReviews - 3 }} nhận xét
            </a>
        </div>
    @endif
</div>
