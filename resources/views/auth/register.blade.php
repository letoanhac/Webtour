<style>
    form.register-form {
        max-width: 400px;
        margin: 40px auto;
        padding: 30px 25px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    form.register-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
    }

    form.register-form input[type="text"],
    form.register-form input[type="email"],
    form.register-form input[type="password"] {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 18px;
        border: 1.5px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    form.register-form input[type="text"]:focus,
    form.register-form input[type="email"]:focus,
    form.register-form input[type="password"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 6px #007bffaa;
    }

    form.register-form button[type="submit"] {
        width: 100%;
        background-color: #28a745;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.25s ease;
    }

    form.register-form button[type="submit"]:hover {
        background-color: #1e7e34;
    }

    /* Thông báo lỗi / thành công */
    .messages {
        max-width: 400px;
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
</style>
@include('User.blocks.header')
<form method="POST" action="{{ route('user-register') }}" class="register-form">
    @csrf
    <label for="fullName">Full Name</label>
    <input id="fullName" type="text" name="fullName" required>

    <label for="username">Username</label>
    <input id="username" type="text" name="username" required>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" required>

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required>

    <label for="password_confirmation">Confirm Password</label>
    <input id="password_confirmation" type="password" name="password_confirmation" required>

    <button type="submit">Đăng ký</button>
    <a href="{{ route('showlogin') }}">Bạn đã có tài khoản? Vui lòng đăng nhập</a>
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

@if(session('message'))
    <div class="messages success">{{ session('message') }}</div>
@endif
