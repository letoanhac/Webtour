<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminController extends Controller
{
    protected $table = 'admin';

    public function index()
    {
        $admins = DB::table($this->table)->orderBy('adminID', 'asc')->get();
        return view('Admin.AdminAccountManage', compact('admins'));
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'username' => 'required|unique:admin,username',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:admin,email',
        ], [
            'username.required' => 'Tên đăng nhập không được bỏ trống.',
            'username.unique'   => 'Tên đăng nhập đã có người sử dụng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự.',
            'email.required'    => 'Email không được bỏ trống.',
            'email.email'       => 'Email không hợp lệ.',
            'email.unique'      => 'Email đã được dùng.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', implode(' ', $validator->errors()->all()))
                ->withInput();
        }

        DB::table($this->table)->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'createDate' => now(),
            'updateDate' => now(),
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Thêm admin thành công!');
    }

    public function update(Request $request, $id)
    {
        $admin = DB::table($this->table)->where('adminID', $id)->first();
        if (!$admin) {
            return redirect()->route('admin.admins.index')->with('error', 'Admin không tồn tại.');
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'username' => 'required|unique:admin,username,' . $id . ',adminID',
            'email' => 'required|email|unique:admin,email,' . $id . ',adminID',
            'password' => 'nullable|min:6',
        ], [
            'username.required' => 'Tên đăng nhập không được bỏ trống.',
            'username.unique'   => 'Tên đăng nhập đã có người sử dụng.',
            'email.required'    => 'Email không được bỏ trống.',
            'email.email'       => 'Email không hợp lệ.',
            'email.unique'      => 'Email đã được dùng.',
            'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự khi thay đổi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', implode(' ', $validator->errors()->all()))
                ->withInput();
        }

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'updateDate' => now(),
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        DB::table($this->table)->where('adminID', $id)->update($data);

        return redirect()->route('admin.admins.index')->with('success', 'Cập nhật admin thành công!');
    }

    public function destroy($id)
    {
        DB::table($this->table)->where('adminID', $id)->delete();
        return redirect()->route('admin.admins.index')->with('success', 'Xóa admin thành công!');
    }
    public function showLogin()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return redirect()->route('admin.login.form')->with('error', 'Thông tin đăng nhập không chính xác');
        }

        Session::put('adminID', $admin->adminID);
        Session::put('username', $admin->username);

        return redirect()->route('admin.tour.index')->with('message', 'Đăng nhập thành công!');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home')->with('success', 'Đăng xuất thành công!');
    }
}
