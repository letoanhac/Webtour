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
      background-color: #f0f2f5;
      margin: 0;
      padding: 20px;
    }
    .tour-detail {
      background: #fff;
      max-width: 960px;
      margin: auto;
      padding: 30px;
      border-radius: 12px;
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
    @media (max-width: 600px) {
      .button-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
      }
      .button-group button {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<div class="tour-detail">
  <h1>Chi tiết Tour: Việt Nam</h1>
  <p><span class="highlight">Mã tour:</span> Tour1</p>
  <p><span class="highlight">Tiêu đề tour:</span> Tour Vịnh hạ sờ long 5N4Đ</p>
  <p><span class="highlight">Mô tả:</span> Khám phá văn hóa Đông Nam Á, tham quan nhiều địa điểm nổi tiếng.</p>
  <img class="tour-image" src="https://disantrangan.vn/wp-content/uploads/2022/06/hinh_anh_dep_du_lich_5.jpg" alt="Ảnh tour">
  <p><span class="highlight">Số lượng:</span> 1 khách</p>
  <p><span class="highlight">Giá người lớn:</span> 1 VND</p>
  <p><span class="highlight">Giá trẻ em:</span> 1 VND</p>
  <p><span class="highlight">Thời lượng:</span> 5 ngày 4 đêm</p>
  <p><span class="highlight">Điểm đến:</span> VHL</p>
  <p><span class="highlight">Tình trạng:</span> Còn chỗ</p>
  <p><span class="highlight">Lịch trình:</span> SG - HN -VHL - SG</p>

  <div class="button-group">
    <a href="{{ route('booking') }}">
      <button>Đặt Tour</button>
    </a>
    <a href="{{ route('review') }}">
      <button>Xem Review</button>
    </a>
  </div>
</div>

</body>
</html>
@include('User.blocks.footer')
