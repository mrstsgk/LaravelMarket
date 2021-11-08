<?php

namespace App\Http\Controllers;

use App\Repositories\ItemRepository;
use Illuminate\Http\Request;
use App\Repositories\Models\User;
use Illuminate\Support\Facades\Cookie;

class ItemListController extends Controller
{
    private $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    /**
     * 商品一覧を表示する.
     *
     * @return view
     */
    public function showList()
    {
        $items = $this->itemRepository->getItemList();
        // $userId = Cookie::get('userId');
        // if (isset($userId)) {
        //     $user = User::where('id', $userId)->get();
        // } else {
        //     $user = 'ゲスト';
        // }
        // $items = Item::all();
        return view('showList', ['itemList' => $items]);
    }

    public function descendingOderPrice()
    {
        return view('showList');
    }
} 