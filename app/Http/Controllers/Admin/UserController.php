<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin.UserManage', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'username' => 'required|unique:user,username',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:user,email',
            'phoneNumber' => 'required',
        ], [
            'username.required' => 'Tên đăng nhập không được bỏ trống.',
            'username.unique'   => 'Tên đăng nhập đã có người sử dụng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự.',
            'email.required'    => 'Email không được bỏ trống.',
            'email.email'       => 'Email không hợp lệ.',
            'email.unique'      => 'Email đã được dùng.',
            'phoneNumber.required' => 'Số điện thoại là bắt buộc.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', implode(' ', $validator->errors()->all()))
                ->withInput();
        }

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'ipAddress' => $request->ipAddress ?? request()->ip(),
            'status' => $request->status ?? 'active',
            'createDate' => now(),
            'updateDate' => now(),
        ]);

        return redirect()->route('admin.usermanage.user.index')->with('success', 'Thêm người dùng thành công!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'username' => "required|unique:user,username,$id,userID",
            'email'    => "required|email|unique:user,email,$id,userID",
            'phoneNumber' => 'required',
        ], [
            'username.required' => 'Tên đăng nhập không được bỏ trống.',
            'username.unique'   => 'Tên đăng nhập đã có người sử dụng.',
            'email.required'    => 'Email không được bỏ trống.',
            'email.email'       => 'Email không hợp lệ.',
            'email.unique'      => 'Email đã được dùng.',
            'phoneNumber.required' => 'Số điện thoại là bắt buộc.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', implode(' ', $validator->errors()->all()))
                ->withInput();
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'ipAddress' => $request->ipAddress,
            'status' => $request->status,
            'updateDate' => now(),
        ]);

        return redirect()->route('admin.usermanage.user.index')->with('success', 'Cập nhật người dùng thành công!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->bookings()->count() > 0) {
            return redirect()->back()->with('error', 'Không thể xóa người dùng vì đã từng đặt tour.')
            ->with('alert','Admin có hành vi xóa dữ liệu nhằm tránh thuế!!!');
        }
        $user->delete();

        return redirect()->route('admin.usermanage.user.index')->with('success', 'Xoá người dùng thành công!');
    }
}
