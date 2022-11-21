<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Requests\Login\RegiterRequest;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.regiter-login');
    }
    // -----------------Return view Login--------------------

    public function postLogin(Request $request)
    {
        $user = $request->all();
        $email = $user['email'];
        $password = $user['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->level === 0)
                return redirect(Route('dashboard'));
            else {
                return redirect(Route('home-client'));
            }
        }
        return redirect(Route('getLogin-client'))->with('msg', 'email hoặc mật khẩu bạn nhập chưa chính xác!');
    }

    // -----------------Check Login-------------------------

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(Route('getLogin-client'));
    }

    // ---------------------------LogOut-------------------------------
    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : $fileName;

        return $file->storeAs($folder, $fileName);
    }

    public function PostRegiter(RegiterRequest $request){


         $dataRegiter = new User();

        $dataRegiter->name = $request->name;

        $dataRegiter->password = Hash::make($request->password);
        $dataRegiter->email = $request->email;
        $dataRegiter->phone = $request->phone;
        $dataRegiter->address = $request->address;

        // if ($request->hasFile('avatar')) {
        //     $dataRegiter->avatar = $this->saveFile(
        //         $request->avatar,
        //         $request->name,
        //         'images/user/'
        //     );
        // } else {
        //     $dataRegiter->avatar = '';
        // }

        $dataRegiter->save();


       return redirect(Route('getLogin-client'))->with('msg_rg', 'Đăng kí tài khoản thành công!');

    }



    // -------------------------Check Regiter---------------------------



    public function getLoginGoogle()
    {

        return Socialite::driver('google')->redirect();
    }


    public function loginGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        if ($googleUser) {
            // 1. Xem xem user này đã tồn tại trong DB chưa
            $user = User::where('email', $googleUser->email)->first();
            // 2. Nếu tồn tại rồi thì cho đăng nhập
            if ($user) {
                Auth::login($user); // không cần check password vẫn cho đăng nhập vào
                return redirect()->route('users.list');
            }
            // 3. Nếu không có $user thì tạo 1 bản ghi mới từ thông tin google
            $newUser = new User();
            $newUser->fill($googleUser->user);

            $newUser->phone = '';
        // 'password',

        // 'username',
        // 'birthday',
        // 'phone',
        // 'role',
        // 'status',
        // 'room_id',
        // 'avatar'
        }
    }

    // ------------------------------Login Google----------------------------------
}
