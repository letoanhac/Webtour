<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Login;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginGoogleController extends Controller
{

    private $user;
    public function __construct()
    {
        $this->user = new Login();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function handleGoogleCallback(Request $request)
{
    try {
        $user = Socialite::driver('google')->user();
        $finduser = $this->user->checkUserExistGoogle($user->id);
        
        // Nếu tìm thấy user với google_id này
        if ($finduser) {
            // Log thông tin đăng nhập thành công
            Log::info('User đăng nhập qua Google thành công', ['google_id' => $user->id, 'email' => $user->email]);
            
            $request->session()->put('username', $finduser->username);
            return redirect()->intended('/');
        } else {
            // Kiểm tra xem email đã tồn tại chưa
            $existingEmail = DB::table('user')->where('email', $user->email)->first();
            
            if ($existingEmail) {
                // Nếu email đã tồn tại, cập nhật google_id cho tài khoản này
                DB::table('user')
                    ->where('email', $user->email)
                    ->update(['google_id' => $user->id]);
                
                Log::info('Đã cập nhật google_id cho tài khoản hiện có', ['email' => $user->email]);
                
                $request->session()->put('username', $existingEmail->username);
                return redirect()->intended('/');
            }
            
           
            
            $data_google = [
                'google_id' => $user->id,
                'fullname' => $user->name,
                'username' => 'user-google',
                'password' => md5('12345678'),
                'email' => $user->email,
                'isActive' => 'y',
            ];
            
            // Log thông tin trước khi tạo tài khoản
            Log::info('Đang tạo tài khoản mới từ Google', $data_google);
            
            $newUser = $this->user->registerAcount($data_google);
            
            // Kiểm tra xem tài khoản đã được tạo thành công chưa
            if (!$newUser) {
                Log::error('Không thể tạo tài khoản Google mới');
                 return redirect('/login')->with('error', 'Không thể tạo tài khoản mới. Vui lòng thử lại sau.');
            }
            
            // Log thông tin sau khi tạo tài khoản thành công
            Log::info('Đã tạo tài khoản mới từ Google thành công', ['userID' => $newUser->userID]);
            
            $request->session()->put('username', $newUser->username);
            return redirect()->intended('/');
        }
    } catch (Exception $e) {
        // Log lỗi chi tiết
        Log::error('Đăng nhập Google thất bại: ' . $e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString()
        ]);
        
         return redirect('/login')->with('error', 'Đăng nhập qua Google thất bại. Vui lòng thử lại sau.');
    }
}
}
