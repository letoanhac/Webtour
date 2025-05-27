<style>
    form.login-form {
        max-width: 360px;
        margin: 40px auto;
        padding: 30px 25px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    form.login-form label {
        display: block;
        margin-bottom: 20px;
        font-weight: 600;
        color: #333;
    }

    form.login-form input[type="text"],
    form.login-form input[type="password"] {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 18px;
        border: 1.5px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    form.login-form input[type="text"]:focus,
    form.login-form input[type="password"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 6px #007bffaa;
    }

    form.login-form button[type="submit"] {
        width: 100%;
        background-color: #007bff;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.25s ease;
    }

    form.login-form button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .btn-home {
        display: block;
        text-align: center;
        margin: 20px auto 0;
        max-width: 360px;
        text-decoration: none;
        padding: 10px 0;
        background: #6c757d;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        transition: background-color 0.25s ease;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .btn-home:hover {
        background-color: #5a6268;
    }
    .messages {
        max-width: 360px;
        margin: 0 auto 20px;
        padding: 12px 18px;
        border-radius: 6px;
        font-size: 14px;
        line-height: 1.4;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .messages.error {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .messages.success {
        background-color: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }

    .messages ul {
        margin: 0;
        padding-left: 20px;
    }
    login-a {
        color: red;
        font-size: 20px;
    }
</style>
@include('User.blocks.header')
<form method="POST" action="{{ route('user-login') }}" class="login-form">
    <h3>Mời bạn đăng nhập để dùng dịch vụ</h3>
    @csrf
    <label for="username">Username</label>
    <input id="username" type="text" name="username" required>

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required>
    <a class="login-a" href="{{ route('register')}}"> Chưa có tài khoản? Bấm vào đây để đăng ký</a>
    <button type="submit">Đăng nhập</button>
</form>

@if ($errors->any())
    <div class="messages error">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="messages error">{{ session('error') }}</div>
@endif

@if(session('message'))
    <div class="messages success">{{ session('message') }}</div>
@endif

<a href="{{ route('home.index') }}" class="btn-home">Quay về trang chủ</a>
