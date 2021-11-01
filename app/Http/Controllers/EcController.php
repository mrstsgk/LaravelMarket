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
        $items = Item::all();
        return view('showList', ['itemList' => $items]);
    }

    public function sortHigh()
    {
        return view('showList');
    }
} 