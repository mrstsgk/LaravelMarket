<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcController extends Controller
{
    /**
     * 商品一覧を表示する.
     *
     * @return view
     */
    public function showList()
    {
        return view('showList');
    }

    public function sortHigh()
    {
        return view('showList');
    }
} 