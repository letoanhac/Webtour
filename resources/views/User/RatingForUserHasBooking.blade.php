<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form đánh giá tour</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #f0f2f5;
            padding: 30px;
        }
        a {
            border-radius: 10px;
            color: green;
            background-color:rgb(176, 198, 231);
            display: inline-block;
        }
        .review-card {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .review-card h2 {
            color: #28a745;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-info {
            background-color: #cce5ff;
            color: #004085;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        a {
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>
<body>

@php
    $userID = session('userID');
    $hasPaid = \App\Models\Booking::where('userID', $userID)
        ->where('tourID', $tourID)
        ->where('paymentStatus', 'Đã thanh toán')
        ->exists();
@endphp

@if($userID)
    @if($hasPaid)
        <div class="review-card">
            <h2>Gửi đánh giá của bạn</h2>
            <a href="{{(route('history.index'))}}">Quay lại</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tourID" value="{{ $tourID }}">

                <div class="form-group">
                    <label for="rating">Chọn số sao:</label>
                    <select name="rating" id="rating" required>
                        <option value="">-- Chọn --</option>
                        <option value="5">★★★★★ - Tuyệt vời</option>
                        <option value="4">★★★★☆ - Rất tốt</option>
                        <option value="3">★★★☆☆ - Bình thường</option>
                        <option value="2">★★☆☆☆ - Tạm ổn</option>
                        <option value="1">★☆☆☆☆ - Tệ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comment">Lời nhắn:</label>
                    <textarea name="comment" id="comment" placeholder="Chia sẻ trải nghiệm của bạn..."></textarea>
                </div>

                <button type="submit" class="btn-submit">Gửi đánh giá</button>
            </form>
        </div>
    @else
        <div class="alert alert-info review-card">
            Bạn cần thanh toán tour này mới có thể gửi đánh giá.
        </div>
    @endif
@else
    <div class="alert alert-warning review-card">
        Vui lòng <a href="{{ route('showlogin') }}">đăng nhập</a> để gửi đánh giá.
    </div>
@endif

</body>
</html>
