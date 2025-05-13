<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt Tour</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
    }

    .booking-container {
      max-width: 500px;
      margin: 50px auto;
      background-color: #fff3e0;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      margin-bottom: 15px;
      color: #0d47a1;
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
    textarea {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
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
    }
  </style>
</head>
<body>

<div class="booking-container">
  <h2>Đặt Tour Du Lịch:  </h2>
  <h3>Xin chào khách hàng: </h3>
  <h3>Số điện thoại đặt hàng của quý khách là:</h3>
  <form action="/submit-booking" method="POST">
    
    <div class="item-row">
      <div>
        <strong>Người lớn</strong> <span style="color: #ff9800;">x 10.990.000</span><br>
        <small>&gt; 10 tuổi</small>
      </div>
      <div class="qty-control">
        <button type="button" onclick="changeQty('adult', -1)">−</button>
        <span id="qty-adult">0</span>
        <input type="hidden" name="numAdults" id="input-adult" value="0">
        <button type="button" onclick="changeQty('adult', 1)">+</button>
      </div>
    </div>

    <!-- Trẻ em -->
    <div class="item-row">
      <div>
        <strong>Trẻ em</strong><br>
        <small>2 - 10 tuổi</small>
      </div>
      <div class="qty-control">
        <button type="button" onclick="changeQty('child', -1)">−</button>
        <span id="qty-child">0</span>
        <input type="hidden" name="numChildren" id="input-child" value="0">
        <button type="button" onclick="changeQty('child', 1)">+</button>
      </div>
    </div>

    <div class="form-group">
      <label for="bookingDate">Ngày khởi hành:</label>
      <input type="date" name="bookingDate" id="bookingDate" required>
    </div>

    <div class="form-group">
      <label for="specialRequests">Yêu cầu đặc biệt:</label>
      <textarea name="specialRequests" id="specialRequests" rows="3" placeholder="Ghi chú thêm nếu có..."></textarea>
    </div>

    <div class="total-price" id="totalPriceDisplay">Tổng giá tour: 0 đ</div>
    <input type="hidden" name="totalPrice" id="totalPrice" value="0">
    
    <button type="submit" class="submit-btn">Đặt Tour</button>
  </form>
</div>

<script>
  const adultPrice = 10990000;
  const childPrice = 7000000;

  function changeQty(type, delta) {
    const qtySpan = document.getElementById(`qty-${type}`);
    const input = document.getElementById(`input-${type}`);
    let current = parseInt(qtySpan.textContent);
    current = isNaN(current) ? 0 : current;
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

    document.getElementById("totalPriceDisplay").textContent = `Tổng giá tour: ${total.toLocaleString()} đ`;
    document.getElementById("totalPrice").value = total;
  }
</script>

</body>
</html>
