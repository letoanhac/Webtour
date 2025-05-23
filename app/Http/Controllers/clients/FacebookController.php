<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Login;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FacebookController extends Controller
{
    private $user;
    
    public function __construct()
    {
        $this->user = new Login();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback(Request $request) 
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = $this->user->checkUserExistFacebook($user->id);
                     
            // Nếu tìm thấy user với facebook_id này
            if ($finduser) {
                // Log thông tin đăng nhập thành công
                Log::info('User đăng nhập qua Facebook thành công', ['facebook_id' => $user->id, 'email' => $user->email]);
                         
                $request->session()->put('username', $finduser->username);
                return redirect()->intended('/');
            } else {
                // Kiểm tra xem email đã tồn tại chưa
                $existingEmail = DB::table('user')->where('email', $user->email)->first();
                         
                if ($existingEmail) {
                    // Nếu email đã tồn tại, cập nhật facebook_id cho tài khoản này
                    DB::table('user')
                        ->where('email', $user->email)
                        ->update(['facebook_id' => $user->id]);
                                 
                    Log::info('Đã cập nhật facebook_id cho tài khoản hiện có', ['email' => $user->email]);
                                 
                    $request->session()->put('username', $existingEmail->username);
                    return redirect()->intended('/');
                }
                                                  
                $data_facebook = [
                    'facebook_id' => $user->id,
                    'fullname' => $user->name,
                    'username' => 'user-facebook',
                    'password' => md5('12345678'),
                    'email' => $user->email,
                    'isActive' => 'y',
                ];
                         
                // Log thông tin trước khi tạo tài khoản
                Log::info('Đang tạo tài khoản mới từ Facebook', $data_facebook);
                         
                $newUser = $this->user->registerAcount($data_facebook);
                         
                // Kiểm tra xem tài khoản đã được tạo thành công chưa
                if (!$newUser) {
                    Log::error('Không thể tạo tài khoản Facebook mới');
                    return redirect('/login')->with('error', 'Không thể tạo tài khoản mới. Vui lòng thử lại sau.');
                }
                         
                // Log thông tin sau khi tạo tài khoản thành công
                Log::info('Đã tạo tài khoản mới từ Facebook thành công', ['userID' => $newUser->userID]);
                         
                $request->session()->put('username', $newUser->username);
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            // Log lỗi chi tiết
            Log::error('Đăng nhập Facebook thất bại: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
                  
            return redirect('/login')->with('error', 'Đăng nhập qua Facebook thất bại. Vui lòng thử lại sau.');
        }
    }
}