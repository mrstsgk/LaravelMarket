<?php
namespace App\Repositories;

use App\Repositories\Models\Coupon;
use League\CommonMark\Block\Element\ListData;

class CouponRepository
{
    /**
     * クーポンデータを取得する.
     *
     * @return $coupon クーポンデータ
     */
    public function getCouponList(){
        $coupons = Coupon::all();
        return $coupons;
    }

    public function getCoupon($userId){
        $coupons = Coupon::where('user_id', $userId)->get();
        return $coupons;
    }

    public function getCouponName($couponId){
        $coupon = Coupon::where('coupon_id', $couponId)->get();
        $couponName = $coupon[0]->name;
        return $couponName;
    }
    
}