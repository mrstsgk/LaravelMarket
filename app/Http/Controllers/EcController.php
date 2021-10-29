<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Models\Item;

class EcController extends Controller
{
    /**
     * 商品一覧を表示する.
     *
     * @return view
     */
    public function showList()
    {
        Item::insert(['name' => 'テスト', 'description' => 'テスト', 'priceM' => 1000, 'priceL' => 1000, 'imagePath' => 'assets', 'deleted' => '0']);
        $items = Item::all();
        return view('showList', ['itemList' => $items]);
    }

    public function sortHigh()
    {
        return view('showList');
    }
} 