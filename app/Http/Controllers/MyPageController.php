<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\CouponService;
use Illuminate\Support\Facades\Cookie;

class MyPageController extends Controller
{

    /**
     * Serviceクラスの依存性を注入する.
     *
     * @param  mixed $userService
     * @return void
     */
    public function __construct(UserService $userService, CouponService $couponService)
    {
        $this->userService = $userService;
        $this->couponService = $couponService;
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
            $coupons = $this->couponService->getCoupon($userId);

            return view('mypage', ['userName' => $userName, 'coupons' => $coupons]);
        } else {
            return redirect("/login");
        }

        
    }

}