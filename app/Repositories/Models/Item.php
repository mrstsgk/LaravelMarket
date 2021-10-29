<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

     //テーブル名
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'priceM',
        'priceL',
        'imagePath',
        'deleted',
    ];

    protected $guarded = ['id'];
}