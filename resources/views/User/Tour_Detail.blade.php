@include('User.blocks.header')
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chi tiết Tour</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-image: url('https://media.hanamtv.vn/upload/image/201708/medium/49848_Du-Lich_2.jpg');
      background-size: cover;
      margin: 0;
      padding: 20px;
    }
    .tour-detail {
      background: #fff;
      max-width: 2260px;
      margin: auto;
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      line-height: 1.6;
    }
    .tour-detail h1 {
      color: #2b6cb0;
      font-size: 26px;
      margin-bottom: 20px;
    }
    .tour-detail p {
      margin: 8px 0;
      color: #333;
    }
    .highlight {
      font-weight: 600;
      color: #2d3748;
    }
    .tour-image {
      display: block;
      width: 100%;
      max-width: 450px;
      height: auto;
      border-radius: 10px;
      margin: 15px 0;
    }
    .button-group {
      text-align: center;
      margin-top: 40px;
    }
    .button-group a {
      text-decoration: none;
    }
    .button-group button {
      background: linear-gradient(135deg, #ff9800, #ff5722);
      color: #fff;
      padding: 14px 32px;
      margin: 0 15px;
      border: none;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }
    .button-group button:hover {
      background: linear-gradient(135deg, #e67e00, #e65100);
      transform: translateY(-2px);
    }
    .main-image {
      position: relative;
      width: 100%;
      height: 500px;
      border-radius: 10px;
      overflow: hidden;
    }
    .main-image img {
      width: 100%;
      height: 100%;
      background: cover;
      transition: opacity 0.5s;
    }
    .thumbnails {
      margin-top: 10px;
      display: flex;
      gap: 10px;
      overflow-x: auto;
    }
    .thumbnails img {
      height: 80px;
      border-radius: 6px;
      cursor: pointer;
      opacity: 0.7;
      border: 2px solid transparent;
      transition: opacity 0.3s, border 0.3s;
    }
    .thumbnails img.active, .thumbnails img:hover {
      opacity: 1;
      border-color: #ff9800;
    }
    table {

    }
  </style>
</head>
<body>

<div class="tour-detail">
  <h1>{{ $tour->title }}</h1>
  <div class="main-image">
    <img id="mainImg" src="{{ $images->isNotEmpty() ? $images[0]->imageURL : 'default-image.jpg' }}" alt="Ảnh chính">
  </div>
  <div class="thumbnails">
    @foreach ($images as $image)
      <img src="{{ $image->imageURL }}" onclick="changeImage(this)" class="{{ $loop->first ? 'active' : '' }}">
    @endforeach
  </div>
  <p><span class="highlight">Mã tour:</span> {{ $tour->tourID }}</p>
  <p><span class="highlight">Tiêu đề tour:</span> {{ $tour->title }}</p>
  <p><span class="highlight">Mô tả:</span> {{ $tour->description }}</p>  
  <p><span class="highlight">Số lượng:</span> {{ $tour->quantity }} khách</p>
  <p><span class="highlight">Giá người lớn:</span> {{ number_format($tour->priceAdult) }} VND</p>
  <p><span class="highlight">Giá trẻ em:</span> {{ number_format($tour->priceChild) }} VND</p>
  <p><span class="highlight">Thời lượng:</span> {{ $tour->duration }}</p>
  <p><span class="highlight">Điểm đến:</span> {{ $tour->destination }}</p>
  <p><span class="highlight">Tình trạng:</span> {{ $tour->availability ? 'Còn chỗ' : 'Hết chỗ' }}</p>
  <div class="Itinerary">
    <h1>Dưới đây là lịch trình của tour: {{ $tour->title }}</h1>
    @include('User.blocks.itinerary')
  </div>
  <div>
    <br>
    @include('User.Review')
    <br>
  </div>
  <div class="button-group">
    <a href="{{ route('booking.index', ['tourID' => $tour->tourID]) }}">
      <button>Đặt Tour</button>
    </a>
  </div>
</div>
<script>
  function changeImage(el) {
    const mainImg = document.getElementById('mainImg');
    mainImg.src = el.src;
    document.querySelectorAll('.thumbnails img').forEach(img => img.classList.remove('active'));
    el.classList.add('active');
  }
</script>

</body>
</html>
@include('User.blocks.footer')
