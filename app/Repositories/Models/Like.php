<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    //テーブル名
    protected $table = 'likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'created_at',
        'updated_at',
    ];

    protected $guarded = ['id'];

    

    public function user()
    {   // Usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function item()
    {   // Itemテーブルとのリレーションを定義するitemメソッド
        return $this->belongsTo(Item::class);
    }

    public function like_exist($id, $item_id)
    {
        $exist = Like::where('user_id', $id)->where('item_id', $item_id)->get();

        if (!$exist->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
}