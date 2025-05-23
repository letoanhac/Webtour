<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Báo cáo & Thống kê</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 20px;
    }
    .dashboard-container {
      max-width: 1200px;
      margin: auto;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    canvas {
      max-width: 100%;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h1>Theo dõi & Báo cáo Thống kê</h1>
    <div class="grid">
        @include('Admin.blocks.left-menu')
      <div class="card">
        <h3>Biểu đồ Doanh thu (Bar)</h3>
        <canvas id="revenueChart"></canvas>
      </div>
      <div class="card">
        <h3>Tỉ lệ Đơn hàng (Pie)</h3>
        <canvas id="orderChart"></canvas>
      </div>
      <div class="card">
        <h3>Lượt truy cập theo tháng (Line)</h3>
        <canvas id="trafficChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    const revenueCtx = document.getElementById('revenueChart');
    const orderCtx = document.getElementById('orderChart');
    const trafficCtx = document.getElementById('trafficChart');

    new Chart(revenueCtx, {
      type: 'bar',
      data: {
        labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6'],
        datasets: [{
          label: 'Doanh thu (triệu VNĐ)',
          data: [12, 19, 3, 5, 2, 15],
          backgroundColor: 'rgba(75, 192, 192, 0.6)',
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } }
      }
    });

    new Chart(orderCtx, {
      type: 'pie',
      data: {
        labels: ['Thành công', 'Đang xử lý', 'Thất bại'],
        datasets: [{
          label: 'Tỉ lệ đơn hàng',
          data: [60, 25, 15],
          backgroundColor: ['#4caf50', '#ffc107', '#f44336'],
        }]
      },
    });

    new Chart(trafficCtx, {
      type: 'line',
      data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5'],
        datasets: [{
          label: 'Lượt truy cập',
          data: [150, 200, 180, 220, 250],
          borderColor: '#3e95cd',
          fill: false
        }]
      },
    });
  </script>
</body>
</html>
