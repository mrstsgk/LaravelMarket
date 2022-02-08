<?php
namespace App\Repositories;

use App\Repositories\Models\Like;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Block\Element\ListData;

class LikeRepository
{
    public function newLike()
    {
        $like = new Like;
        return $like;
    }

    /**
     * お気に入りデータを取得する.
     *
     * @return $like ユーザーデータ
     */
    public function getLikeList(){
        $likes = Like::all();
        return $likes;
    }
    
}