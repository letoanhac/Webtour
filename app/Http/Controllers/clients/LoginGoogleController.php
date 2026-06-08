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
use Illuminate\Support\Facades\Session;

class LoginGoogleController extends Controller
{

    private $user;
    public function __construct()
    {
        $this->user = new Login();
    }

    public function redirectToGoogle()
    {
        Log::info('=== REDIRECT TO GOOGLE ===');
        return Socialite::driver('google')
            ->stateless()
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }


    public function handleGoogleCallback(Request $request)
    {
        try {
            Log::info('=== BẮT ĐẦU CALLBACK ===');
            
            $user = Socialite::driver('google')->stateless()->user();
            Log::info('=== GOOGLE USER DATA ===', [
                'google_id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'avatar' => $user->avatar
            ]);

            $finduser = $this->user->checkUserExistGoogle($user->id);
            Log::info('=== CHECK USER EXIST ===', [
                'found' => $finduser ? 'YES' : 'NO',
                'user_data' => $finduser
            ]);

            // Nếu tìm thấy user với google_id này
            if ($finduser) {
                Log::info('=== USER ĐÃ TỒN TẠI - SET SESSION ===');
                
                // DEBUG: Kiểm tra session trước khi flush
                Log::info('Session trước khi flush:', [
                    'old_username' => $request->session()->get('username'),
                    'old_userID' => $request->session()->get('userID'),
                ]);

                // Xóa session cũ trước khi set mới
                $request->session()->flush();

                // Set session mới
                $request->session()->put('username', $finduser->username);
                $request->session()->put('userID', $finduser->userID);
                $request->session()->put('avatar', $finduser->avatar ?? '');

                // Force save session
                $request->session()->save();

                // DEBUG: Kiểm tra session sau khi set
                Log::info('Session sau khi set:', [
                    'new_username' => $request->session()->get('username'),
                    'new_userID' => $request->session()->get('userID'),
                    'new_avatar' => $request->session()->get('avatar'),
                    'session_id' => $request->session()->getId()
                ]);

                Log::info('=== CHUẨN BỊ REDIRECT VỀ HOME ===');
                
                // Thử redirect trực tiếp về '/' thay vì route('home')
                return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
                
            } else {
                Log::info('=== USER CHƯA TỒN TẠI - KIỂM TRA EMAIL ===');
                
                // Kiểm tra xem email đã tồn tại chưa
                $existingEmail = DB::table('user')->where('email', $user->email)->first();
                Log::info('Check existing email:', [
                    'email' => $user->email,
                    'found' => $existingEmail ? 'YES' : 'NO'
                ]);

                if ($existingEmail) {
                    Log::info('=== EMAIL ĐÃ TỒN TẠI - CẬP NHẬT GOOGLE_ID ===');

                    // Cập nhật google_id cho tài khoản này
                    $updated = DB::table('user')
                        ->where('email', $user->email)
                        ->update(['google_id' => $user->id]);
                        
                    Log::info('Update google_id result:', ['updated' => $updated]);

                    // Xóa session cũ
                    $request->session()->flush();

                    // Set session mới
                    $request->session()->put('username', $existingEmail->username);
                    $request->session()->put('userID', $existingEmail->userID);
                    $request->session()->put('avatar', $existingEmail->avatar ?? '');

                    // Force save session
                    $request->session()->save();

                    Log::info('Session sau khi update:', [
                        'username' => $request->session()->get('username'),
                        'userID' => $request->session()->get('userID')
                    ]);

                    return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
                }

                Log::info('=== TẠO USER MỚI ===');

                // Tạo username unique dựa trên email
                $emailPrefix = substr($user->email, 0, strpos($user->email, '@'));
                $baseUsername = 'google_' . preg_replace('/[^a-zA-Z0-9_]/', '', $emailPrefix);
                $username = $baseUsername;
                $counter = 1;

                // Kiểm tra và tạo username unique
                while (DB::table('user')->where('username', $username)->exists()) {
                    $username = $baseUsername . '_' . $counter;
                    $counter++;
                }

                Log::info('Generated username:', ['username' => $username]);

                $data_google = [
                    'google_id' => $user->id,
                    'avatar' => $user->avatar ?? '',
                    'fullName' => $user->name ?? '',
                    'username' => $username,
                    'password' => md5('12345678'),
                    'email' => $user->email,
                    'isActive' => 'y',
                    'createDate' => now(),
                    'updateDate' => now()
                ];

                Log::info('Data to insert:', $data_google);

                $newUser = $this->user->registerAcount($data_google);
                Log::info('Register result:', [
                    'success' => $newUser ? 'YES' : 'NO',
                    'new_user' => $newUser
                ]);

                if (!$newUser) {
                    Log::error('=== KHÔNG THỂ TẠO USER MỚI ===');
                    return redirect('/login')->with('error', 'Không thể tạo tài khoản mới.');
                }

                Log::info('=== TẠO USER THÀNH CÔNG - SET SESSION ===');

                // Xóa session cũ
                $request->session()->flush();

                // Set session mới
                $request->session()->put('username', $newUser->username);
                $request->session()->put('userID', $newUser->userID);
                $request->session()->put('avatar', $newUser->avatar ?? '');

                // Force save session
                $request->session()->save();

                Log::info('Session user mới:', [
                    'username' => $request->session()->get('username'),
                    'userID' => $request->session()->get('userID'),
                    'session_id' => $request->session()->getId()
                ]);

                return redirect()->route('home')->with('success', 'Đăng ký và đăng nhập thành công!');
            }
            
        } catch (Exception $e) {
            Log::error('=== GOOGLE LOGIN EXCEPTION ===', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect('/login')->with('error', 'Đăng nhập qua Google thất bại: ' . $e->getMessage());
        }
    }
}