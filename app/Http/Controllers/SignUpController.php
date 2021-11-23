<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Repositories\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class SignUpController extends Controller
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
     * 新規登録画面への遷移.
     *
     * @return view
     */
    public function show() 
    {
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            return redirect("/mypage");
        } else {
            return view('signup', ['userName' => 'ゲスト']);
        }
    }

    /**
     * 新規登録機能.
     *
     * @return view
     */
    public function signup(Request $request)
    {
        // パスワードチェック
        if ($request->password !== $request->reenter_password) {
            return view('signup', ['userName' => 'ゲスト']);
        }

        // emailチェック
        // email検索してあったらはじく処理

        // 登録
        $userId = $this->userService->insertUser($request->name, $request->email, $request->password, $request->zipcode, $request->address, $request->telephone);

    } 

}