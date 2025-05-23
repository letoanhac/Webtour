<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'Đăng nhập';
        return view('User.login', compact('title'));
    }

    // Đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'username_regis' => 'required|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password_regis' => 'required|min:6|confirmed', // nhớ đặt thêm input password_confirmation
        ]);

        $activation_token = Str::random(60);

        $user = User::create([
            'username' => $request->username_regis,
            'email' => $request->email,
            'password' => Hash::make($request->password_regis),
            'activation_token' => $activation_token,
            'isActive' => false,
            'createDate' => now(),
        ]);

        // Gửi email kích hoạt
        $this->sendActivationEmail($user->email, $activation_token);

        return response()->json([
            'success' => true,
            'message' => 'Đăng ký thành công! Vui lòng kiểm tra email để kích hoạt.'
        ]);
    }

    // Gửi email kích hoạt
    public function sendActivationEmail($email, $token)
    {
        $activation_link = route('activate.account', ['token' => $token]);

        Mail::send('clients.mail.emails_activation', ['link' => $activation_link], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Kích hoạt tài khoản của bạn');
        });
    }

    // Kích hoạt tài khoản
    public function activateAccount($token)
    {
        $user = User::where('activation_token', $token)->first();

        if ($user) {
            $user->isActive = true;
            $user->activation_token = null;
            $user->save();

            return redirect('/login')->with('message', 'Tài khoản của bạn đã được kích hoạt!');
        } else {
            return redirect('/login')->with('error', 'Mã kích hoạt không hợp lệ!');
        }
    }

    // Đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Chỉ đăng nhập nếu tài khoản đã kích hoạt
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
            'isActive' => true,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // bảo mật session

            // Lấy user hiện tại
            $user = Auth::user();

            // Lưu session nếu bạn muốn
            $request->session()->put('userID', $user->userID);
            $request->session()->put('username', $user->username);

            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Thông tin tài khoản không chính xác hoặc chưa kích hoạt!',
        ]);
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }
}
