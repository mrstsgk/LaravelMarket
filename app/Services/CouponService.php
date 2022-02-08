<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\CouponRepository;

class CouponService
{    
    /** @Autowired */
    private $couponRepository;
    
    /**
     * Repositoryクラスの依存性を注入する.
     *
     * @param  mixed $couponRepository
     * @return void
     */
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }
        
    /**
     * コントローラにクーポンデータを返す.
     *
     * @return $coupons クーポンデータ
     */
    public function getCouponList(){
        $coupons = $this->couponRepository->getCouponList();
        return $coupons;
    }

    public function getCouponName($couponId){
        $couponName = $this->couponRepository->getCouponName($couponId);
        return $couponName;
    }

    public function getCoupon($id){

        // ユーザーが所持するクーポンをCouponテーブルで検索
        $coupon= $this->couponRepository->getCoupon($id);
        
        // なし
        if (count($coupon) === 0){
            return 0;
        }

        for ($i=0; $i < count($coupon); $i++) 
        {
            if ( $coupon[$i]->useFlg == 0 ) {
                $couponList[$i] = $coupon[$i];
            }
        }

        return $couponList;
    }
}