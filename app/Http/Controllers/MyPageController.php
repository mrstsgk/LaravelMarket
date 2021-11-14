<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Cookie;

class MyPageController extends Controller
{

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
    public function show() {
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            $userName = $this->userService->getUserName($userId);
            return view('mypage', ['userName' => $userName]);
        } else {
            return view('login', ['userName' => 'ゲスト']);
        }

        
    }

}