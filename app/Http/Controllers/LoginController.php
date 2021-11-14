<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Repositories\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /** @Autowired */
    private $userService;
    
    /**
     * Serviceクラスの依存性を注入する.
     *
     * @param  mixed $userService
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * ログインページ/マイページへの遷移.
     *
     * @return view
     */
    public function show() 
    {
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            return redirect("/mypage");
        } else {
            return view('login', ['userName' => 'ゲスト']);
        }
    }

    /**
     * ログイン機能.
     *
     * @return view
     */
    public function login(Request $request)
    {
        $loginFlg = $this->userService->loginChk($request->email, $request->password);

        // なければエラーを返す
        if ($loginFlg[0] === true){
            // cookie設定
            Cookie::queue('userId', $loginFlg[1], 60);
            return redirect(url('/'));
        } else {
            return view('login', ['login_error' => '1']);
        }

    } 
    
    public function logout(Request $request)
    {
        setcookie('userId');
        return redirect(url('/'));
    }  
}