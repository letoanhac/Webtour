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
        $request->validate([
            'username' => 'required|unique:user,username',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:user,email',
            'phoneNumber' => 'required',
        ]);

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
        $user->delete();

        return redirect()->route('admin.usermanage.user.index')->with('success', 'Xoá người dùng thành công!');
    }
}
