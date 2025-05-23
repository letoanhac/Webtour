<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    private $login;

    public function __construct()
    {
        $this->login = new Login();
    }

    public function index()
    {
        $title = 'Đăng nhập';
        return view('User.login', compact('title'));
    }

    public function register(Request $request)
    {
        $username_regis = $request->username_regis;
        $email = $request->email;
        $password_regis = $request->password_regis;

        $checkAccountExist = $this->login->checkUserExist($username_regis, $email);
        if ($checkAccountExist) {
            return response()->json([
                'success' => false,
                'message' => 'Người dùng và email đã tồn tại'
            ]);
        }
        $activation_token = Str::random(60);
        $dataInsert = [
            'username' => $username_regis,
            'email' => $email,
            'password' => md5($password_regis),
            'activation_token' => $activation_token
        ];

        $this->login->registerAcount($dataInsert);


        //Gửi email kích hoạt
        $this->sendActivationEmail($email, $activation_token);
        return response()->json([
            'success' => true,
            'message' => 'Đăng ký thành công! Vui lòng kiểm tra email để kích hoạt.'
        ]);
    }

    public function sendActivationEmail($email, $token)
    {
        $activation_link = route('activate.account', ['token' => $token]);

        Mail::send('clients.mail.emails_activation', ['link' => $activation_link], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Kích hoạt tài khoản của bạn');
        });
    }

    public function activateAccount($token)
    {
        $user = $this->login->getUserByToken($token);
        if ($user) {
            $this->login->activateUserAccount($token);

            return redirect('/login')->with('message', 'Tài khoản của bạn đã được kích hoạt!');
        } else {
            return redirect('/login')->with('error', 'Mã kích hoạt không hợp lệ!');
        }
    }

    //Xử lý người dùng đăng nhập
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data_login = [
            'username' => $username,
            'password' => md5($password)
        ];


        $user =  $this->login->login($data_login);

        if ($user != null) {
            $request->session()->put('username', $username);
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Thông tin tài khoản không chính xác!',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect()->route('home');
    }
}
