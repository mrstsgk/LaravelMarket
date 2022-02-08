<?php

namespace App\Http\Controllers;

use App\Repositories\Models\Item;
use App\Repositories\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LikeController extends Controller
{
    public function like(Item $item, Request $request)
    {
        $userId = Cookie::get('userId');
        $nice=New like();
        $nice->item_id = $item->id;
        $nice->user_id = $userId;
        $nice->save();
        return back();

    }

    public function unlike(Item $item, Request $request) {
        $userId = Cookie::get('userId');
        $nice=Like::where('item_id', $item->id)->where('user_id', $userId)->first();
        $nice->delete();
        return back();
    }

    public function ajaxlike(Request $request)
    {
        $user_id = Cookie::get('userId');
        $item_id = $request->item_id;
        $like = new Like;
        $post = Item::findOrFail($item_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($user_id, $item_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('item_id', $item_id)->where('user_id', $user_id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->item_id = $request->item_id;
            $like->user_id = $user_id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        $json = [
            'postLikesCount' => $postLikesCount,
        ];

        //ajaxに引数の値を返す
        return response()->json($json);
    }
}
