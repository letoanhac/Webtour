<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form đánh giá tour</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #111;
            padding: 30px;
            color: #eee;
        }

        a {
            color: #00d5d5;
            text-decoration: none;
            font-weight: 600;
            border: 1px solid #00d5d5;
            padding: 6px 12px;
            border-radius: 10px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #00d5d5;
            color: #111;
        }

        .review-card {
            max-width: 600px;
            margin: auto;
            background-color: #222;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 213, 213, 0.5);
            padding: 30px;
        }

        .review-card h2 {
            color: #00d5d5;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #00d5d5;
        }

        select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #00d5d5;
            border-radius: 10px;
            font-size: 16px;
            background-color: #111;
            color: #eee;
            transition: border-color 0.3s ease;
        }

        select:focus, textarea:focus {
            outline: none;
            border-color: #00fff7;
            box-shadow: 0 0 8px #00fff7;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-submit {
            background-color: #00d5d5;
            color: #111;
            border: none;
            padding: 15px;
            width: 100%;
            font-size: 18px;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 0 10px #00d5d5;
        }

        .btn-submit:hover {
            background-color: #00b3b3;
            box-shadow: 0 0 15px #00b3b3;
        }

        .alert {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .alert-success {
            background-color: #004d40;
            color: #a5d6a7;
            box-shadow: 0 0 10px #a5d6a7;
        }

        .alert-error {
            background-color: #5d2120;
            color: #ef9a9a;
            box-shadow: 0 0 10px #ef9a9a;
        }

        .alert-info {
            background-color: #003366;
            color: #90caf9;
            box-shadow: 0 0 10px #90caf9;
        }

        .alert-warning {
            background-color: #665c00;
            color: #fff59d;
            box-shadow: 0 0 10px #fff59d;
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
        <script>
            alert("Bạn cần thanh toán mới có thể đánh giá");
            window.location.href = "{{ route('history.index') }}";
        </script>
    @endif
@else
    <div class="alert alert-warning review-card">
        Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để gửi đánh giá.
    </div>
@endif

</body>
</html>
