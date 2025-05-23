<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InformationController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $title = "Tài khoản người dùng";
        $username = session('username');
        $userId = $this->user->getUserId($username);
        $user = $this->user->getUser($userId);

        return view('User.profile', compact('title', 'user'));
    }

    public function update(Request $request)
    {
        $username = session('username');
        $userId = $this->user->getUserId($username);

        $dataUpdate = $request->only(['fullName', 'address', 'email', 'phoneNumber']);
        $current = $this->user->getUser($userId);

        // Kiểm tra nếu không có thay đổi
        $unchanged = true;
        foreach ($dataUpdate as $key => $value) {
            if ($current->$key != $value) {
                $unchanged = false;
                break;
            }
        }

        if ($unchanged) {
            return back()->with('error', 'Bạn chưa thay đổi thông tin nào.');
        }

        $this->user->updateUser($userId, $dataUpdate);

        return back()->with('success', 'Cập nhật thông tin thành công!');
    }

    public function changePassword(Request $req)
    {
        $username = session('username');
        $userId = $this->user->getUserId($username);
        $user = $this->user->getUser($userId);

        if (!Hash::check($req->oldPass, $user->password)) {
            return back()->with('error_password', 'Mật khẩu cũ không chính xác.');
        }

        if (Hash::check($req->newPass, $user->password)) {
            return back()->with('error_password', 'Mật khẩu mới trùng với mật khẩu cũ.');
        }

        $this->user->updateUser($userId, ['password' => Hash::make($req->newPass)]);

        return back()->with('success_password', 'Đổi mật khẩu thành công!');
    }
    public function changeAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $username = session('username');
        $userId = $this->user->getUserId($username);

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();

        $user = $this->user->getUser($userId);
        if ($user->avatar) {
            $oldPath = public_path('admin/assets/img/user-profile/' . $user->avatar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $avatar->move(public_path('admin/assets/img/user-profile'), $filename);

        $this->user->updateUser($userId, ['avatar' => $filename]);
        session(['avatar' => $filename]);

        return back()->with('success', 'Cập nhật ảnh đại diện thành công!');
    }
}
