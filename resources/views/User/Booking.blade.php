@include('clients.blocks.header')
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt Tour</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://media.hanamtv.vn/upload/image/201708/medium/49848_Du-Lich_2.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
    }

    .booking-container {
      max-width: 900px;
      margin: 50px auto;
      background-color: #fff3e0;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #0d47a1;
    }

    .info-section {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      flex-wrap: wrap;
      gap: 20px;
    }

    .info-box {
      flex: 1;
      min-width: 250px;
      background-color: #fff;
      padding: 15px 20px;
      border-radius: 10px;
      border: 1px solid #ddd;
    }

    .info-box strong {
      display: block;
      margin-bottom: 5px;
      color: #ff5722;
    }

    .item-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #fff8f0;
      padding: 12px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ddd;
    }

    .qty-control button {
      padding: 4px 10px;
      font-size: 18px;
      background: #eee;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .qty-control span {
      min-width: 20px;
      display: inline-block;
      text-align: center;
    }

    .form-group {
      margin-top: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="date"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .total-price {
      font-size: 20px;
      font-weight: bold;
      color: #ff5722;
      margin: 20px 0;
    }

    .submit-btn {
      width: 100%;
      background-color: #ff9800;
      color: white;
      padding: 15px;
      font-size: 18px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>

<div class="booking-container">
  <h2>Đặt Tour Du Lịch</h2>
  <div class="info-section">
    <div class="info-box"><strong>Khách hàng:</strong>{{ $user->fullName??'Tên khách hàng nờ un nun' }}</div>
    <div class="info-box"><strong>Số điện thoại:</strong>{{ $user->phoneNumber??'Chưa đăng ký số' }}</div>
    <div class="info-box"><strong>Email:</strong>{{ $user->email }}</div>
    <div class="info-box"><strong>Tên Tour:</strong>{{ $tour->title }}<br><strong>Địa điểm:</strong>{{ $tour->destination }}</div>
  </div>

  <div class="info-section" style="margin-top: 20px;">
    <div class="info-box"><strong>Giá người lớn:</strong>{{ number_format($tour->priceAdult, 0, ',', '.') }} đ</div>
    <div class="info-box"><strong>Giá trẻ em:</strong>{{ number_format($tour->priceChild, 0, ',', '.') }} đ</div>
  </div>

  @if(session('success'))
    <div style="color: green; margin-top: 20px;">{{ session('success') }}</div>
  @endif

  <form action="{{ route('booking.submit') }}" method="POST" id="bookingForm">
    @csrf
    <input type="hidden" name="tourID" value="{{ $tour->tourID }}">

    <div class="item-row">
      <div><strong>Người lớn</strong> <span style="color: #ff9800;">x {{ number_format($tour->priceAdult, 0, ',', '.') }}</span></div>
      <div class="qty-control">
        <button type="button" onclick="changeQty('adult', -1)">−</button>
        <span id="qty-adult">0</span>
        <input type="hidden" name="numAdults" id="input-adult" value="0">
        <button type="button" onclick="changeQty('adult', 1)">+</button>
      </div>
    </div>

    <div class="item-row">
      <div><strong>Trẻ em</strong> <span style="color: #ff9800;">x {{ number_format($tour->priceChild, 0, ',', '.') }}</span></div>
      <div class="qty-control">
        <button type="button" onclick="changeQty('child', -1)">−</button>
        <span id="qty-child">0</span>
        <input type="hidden" name="numChildren" id="input-child" value="0">
        <button type="button" onclick="changeQty('child', 1)">+</button>
      </div>
    </div>

    <div class="form-group">
      <label for="bookingDate">Ngày khởi hành:</label>
      <input type="date" name="bookingDate" id="bookingDate" required
      min="{{ \Carbon\Carbon::parse($tour->startDate)->format('Y-m-d') }}"
      max="{{ \Carbon\Carbon::parse($tour->endDate)->format('Y-m-d') }}">
    </div>

    <div class="form-group">
      <label for="specialRequests">Yêu cầu đặc biệt:</label>
      <textarea name="specialRequests" id="specialRequests" rows="3" placeholder="Ghi chú thêm nếu có..."></textarea>
    </div>

    <div class="form-group">
      <label for="paymentMethod">Phương thức thanh toán:</label>
      <select name="paymentMethod" id="paymentMethod" required>
        <option value="Tiền mặt">Tiền mặt</option>
        <option value="Chuyển khoản">Chuyển khoản</option>
        <option value="vnpay">Thanh toán bằng vnpay</option>
        <option value="Momo">Momo</option>
      </select>
    </div>

    <div class="total-price" id="totalPriceDisplay">Tổng giá tour: 0 đ</div>
    <input type="hidden" name="totalPrice" id="totalPrice" value="0">

    <button type="submit" class="submit-btn" id="submitBtn">
      Đặt Tour
    </button>
  </form>
</div>
@include('User.blocks.overlay')
<script>
  const adultPrice = {{ $tour->priceAdult }};
  const childPrice = {{ $tour->priceChild }};

  function changeQty(type, delta) {
    const qtySpan = document.getElementById(`qty-${type}`);
    const input = document.getElementById(`input-${type}`);
    let current = parseInt(qtySpan.textContent) || 0;
    current += delta;
    if (current < 0) current = 0;
    qtySpan.textContent = current;
    input.value = current;
    updateTotalPrice();
  }

  function updateTotalPrice() {
    const adultQty = parseInt(document.getElementById("input-adult").value) || 0;
    const childQty = parseInt(document.getElementById("input-child").value) || 0;
    const total = adultQty * adultPrice + childQty * childPrice;
    document.getElementById("totalPriceDisplay").textContent = `Tổng giá tour: ${total.toLocaleString('vi-VN')} đ`;
    document.getElementById("totalPrice").value = total;
  }

  const form = document.getElementById('bookingForm');
  const submitBtn = document.getElementById('submitBtn');

  form.addEventListener("submit", function(e) {
    const total = parseInt(document.getElementById("totalPrice").value);
    if (total === 0) {
      alert("Bạn cần chọn ít nhất 1 người để đặt tour.");
      e.preventDefault();
      return;
    }

    document.getElementById('formOverlay').style.display = 'block';
    submitBtn.disabled = true;
  });
</script>

</body>
</html>
@include('User.blocks.footer')
