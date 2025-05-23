<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'fullName' => 'required|string|max:255',
        ]);
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'fullName' => $request->fullName,
            'password' => Hash::make($request->password),
            'isActive' => 1,
            'createDate' => now(),
            'updateDate' => now(),
        ]);

        return redirect()->route('showlogin')->with('message', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Thông tin đăng nhập không chính xác');
        }
        Session::put('userID', $user->userID);
        Session::put('username', $user->username);

        return redirect()->route('home.index')->with('message', 'Đăng nhập thành công!');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('home.index');
    }
}
