@include('clients.blocks.header')
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
    .tour-detail {
      background: #feffff;
      max-width: 2260px;
      margin: auto;
      padding: 20px 150px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      line-height: 1.6;
    }
    .tour-detail h1 {
      font-size: 26px;
    }
    .tour-detail p {
      color: #17252a;
    }
    .highlight {
      font-weight: 700;
      color: #17252a;
    }
    p {
      font-size: 20px;
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
      background: #2b7a78;
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
      background: #2b7a77df;
      transform: translateY(-2px);
    }
    .img-container {
      display: flex;
      gap: 10px;
      height: 500px;
      margin-bottom: 10px;
    }
    .main-image {
      flex: 3;
      overflow: hidden;
      position: relative;
    }
    .main-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: opacity 0.5s;
    }
    .thumbnails {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 10px;
      overflow-y: auto;
    }
    .thumbnails::-webkit-scrollbar {
      width: 6px;
    }
    .thumbnails::-webkit-scrollbar-thumb {
      background: #ccc;
      border-radius: 4px;
    }
    .thumb-wrapper {
      flex-grow: 0;
      flex-shrink: 0;
      flex-basis: calc(100%/3 - 7px);
      overflow: hidden;
      cursor: pointer;
    }
    .thumb-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.8;
      border: 3px solid transparent;
      box-sizing: border-box;
      transition: opacity 0.3s, border 0.3s;
    }
    .thumb-wrapper.active {
      display: none !important;
    }
    .thumb-wrapper:hover img {
      opacity: 1;
      border-color: #ff9800;
    }
    .a-expired {
      color: black;
      font-size: 20px;
    }
    .a-expired:hover {
      color: green;
      font-size: 21px;
    }
  </style>
</head>
<body>
@include('User.blocks.progress-bar')

<div class="tour-detail">

  <div style="display: flex; justify-content: space-between; align-items: flex-end; gap: 20px; margin-bottom: 20px;">
    <div style="flex: 1; min-width: 0;">
      <h1 style="margin-bottom: 0; word-wrap: break-word;">{{ $tour->title }}</h1>
      <p style="margin: 5px 0 0 0;"><span style="color: grey; font-size: 16px">Số chỗ đặt tour còn lại: {{ $tour->quantityleft}}/{{ $tour->quantity}}</span></p>
    </div>
    <div style="flex-shrink: 0; font-size: 20px; color: #ff9800; white-space: nowrap; text-align: right;">
      <span class="highlight">Đánh giá: &nbsp; &nbsp; {{ $avgRating }}/5 &nbsp;</span>
      @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $avgRating)
          <i class="fas fa-star"></i>
        @elseif ($i - 0.5 <= $avgRating)
          <i class="fas fa-star-half-alt"></i>
        @else
          <i class="far fa-star"></i>
        @endif
      @endfor
    </div>
  </div>
  
  <div class="img-container">
    <div class="main-image">
      <img id="mainImg" src="{{ $images->isNotEmpty() ? $images[0]->imageURL : 'default-image.jpg' }}" alt="Ảnh chính">
    </div>
    <div class="thumbnails" id="thumbsContainer">
      @foreach ($images as $index => $image)
        <div class="thumb-wrapper {{ $loop->first ? 'active' : '' }}" onclick="changeImage(this, '{{ $image->imageURL }}')">
          <img src="{{ $image->imageURL }}">
        </div>
      @endforeach
    </div>
  </div>



  <div style="display: flex; justify-content: space-between;">
    <div>
      <p><span class="highlight">Ngày khởi hành:</span> {{ $tour->endDate }} </p>
      <p><span class="highlight">Thời lượng:</span> {{ $tour->time }}</p>
    </div>
    <p><span class="highlight">Điểm đến cụ thể:</span> {{ $tour->destination }}</p>
  </div>
  <h2 style="text-align: center;  margin-top: 10px;">Mô tả Tour</h2>
  <p style="text-align: justify; margin-top: 10px;">&nbsp; &nbsp; &nbsp; {!! $tour->description !!}</p>  


  <div class="Itinerary">
    <h2 style="text-align: center;  margin-top: 20px;">Lịch trình của tour</h2>
    @include('User.blocks.Itinerary')
  </div>

  <p><span class="highlight">Giá người lớn:</span> {{ number_format($tour->priceAdult) }} VND | <span class="highlight">Giá trẻ em:</span> {{ number_format($tour->priceChild) }} VND</p>

  <p><span class="highlight">Box chat cộng đồng của {{ $tour->title }} là: </span> <a style="color:green;" href="{{ route('chat.show', ['tourID' => $tour->tourID]) }}">Boxchat</a></p>
  
  @if($tour->availability == 1)
    <div class="button-group">
      <a href="{{ route('booking.index', ['tourID' => $tour->tourID]) }}" onclick="showOverlayThenGo(this.href); return false;">
        <button>Đặt Tour</button>
      </a>
    </div>
  @else
    <p style="text-align: center;">Tour đã hết hạn hoặc chưa mở bán! Vui lòng chọn <a class="a-expired" href="{{ route('tourList') }}">Tour Khác</a></p>
  @endif
  
  <div id="reviews">
    <br>
    @include('User.Review')
    <br>
  </div>


</div>

<script>
  function changeImage(wrapper, src) {
    const mainImg = document.getElementById('mainImg');
    mainImg.src = src;
    document.querySelectorAll('.thumb-wrapper').forEach(el => el.classList.remove('active'));
    wrapper.classList.add('active');
  }
</script>

</body>
</html>
@include('User.blocks.footer')
