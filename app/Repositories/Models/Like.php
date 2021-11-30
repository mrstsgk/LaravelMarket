<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {   // Usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo('App\Repositories\Models\user');
    }

    public function item()
    {   // Itemテーブルとのリレーションを定義するitemメソッド
        return $this->belongsTo('App\Repositories\Models\item');
    }
}