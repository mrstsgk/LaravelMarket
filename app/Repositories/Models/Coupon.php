<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'coupons';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'coupon_id',
        'user_id',
        'coupon_name',
        'type',
        'discount',
        'use_flg',
        'deadline',
    ];

    protected $guarded = ['id'];
}
