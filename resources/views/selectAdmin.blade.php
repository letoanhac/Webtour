<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Chọn Admin hỗ trợ</title>
<style>
  /* Body và container */
  body, html {
    height: 100%;
    margin: 0; padding: 0;
    background: rgb(180, 134, 134);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .container {
    background: #1f1f2a;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgb(0 213 213 / 0.4);
    height: 400px;
    width: 720px;
    text-align: center;
  }
  h2 {
    margin-bottom: 25px;
    color: #00d5d5;
    text-shadow: 0 0 6px #00d5d5;
  }
  select {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border-radius: 10px;
    border: 2px solid #00d5d5;
    background: #181820;
    color: #eee;
    box-shadow: inset 0 0 8px rgb(0 213 213 / 0.5);
    outline: none;
    cursor: pointer;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }
  select:hover, select:focus {
    border-color: #cc3399;
    box-shadow: 0 0 10px #cc3399;
    color: #fff;
  }
  option {
    background: #181820;
    color: #eee;
  }
  button {
    margin-top: 25px;
    width: 100%;
    padding: 12px;
    font-size: 16px;
    font-weight: 600;
    color: white;
    background: #00bfbf;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 0 8px rgba(0, 255, 255, 0.4);
    transition: background 0.3s ease, box-shadow 0.3s ease;
  }
  button:hover {
    background: #00d5d5;
    box-shadow: 0 0 12px #00d5d5;
  }

  /* Nút quay lại trang chủ cố định dưới trái */
  .back-home {
    position: fixed;
    bottom: 20px;
    left: 20px;
    background: #00bfbf;
    color: white;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    box-shadow: 0 0 8px rgba(0, 255, 255, 0.5);
    transition: background 0.3s ease, box-shadow 0.3s ease;
  }
  .back-home:hover {
    background: #00d5d5;
    box-shadow: 0 0 12px #00d5d5;
  }
</style>
</head>
<body>
  <div class="container">
    <h2>Chọn admin hỗ trợ</h2>
    <form action="{{ url('/chatmode') }}" method="GET">
      <select name="peer" required>
        <option value="" disabled selected>-- Chọn admin --</option>
        @foreach ($admins as $admin)
          <option value="{{ $admin->adminID }}">{{ $admin->username }}</option>
        @endforeach
      </select>
      <button type="submit">Bắt đầu chat</button>
    </form>
  </div>

  <a href="{{ route('home') }}" class="back-home"> Quay lại trang chủ</a>
</body>
</html>
