<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Models\Item;
use App\Repositories\Models\User;
use Illuminate\Support\Facades\Cookie;

class ItemListController extends Controller
{
    /**
     * 商品一覧を表示する.
     *
     * @return view
     */
    public function showList()
    {
        // $userId = Cookie::get('userId');
        // if (isset($userId)) {
        //     $user = User::where('id', $userId)->get();
        // } else {
        //     $user = 'ゲスト';
        // }
        $items = Item::all();
        return view('showList', ['itemList' => $items]);
    }

    public function sortHigh()
    {
        return view('showList');
    }
} 