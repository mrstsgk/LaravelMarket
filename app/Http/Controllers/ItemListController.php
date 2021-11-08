<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Models\User;
use App\Services\ItemService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;

class ItemListController extends Controller
{
    /** @Autowired */
    private $itemService;
    
    /**
     * Serviceクラスの依存性を注入する.
     *
     * @param  mixed $itemService
     * @return void
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    
    /**
     * 商品一覧を表示する.
     *
     * @return view
     */
    public function showList()
    {
        $items = $this->itemService->getItemList();
        //　TODO:コメントで囲っている部分をUserRepositoryクラスを作成して移してください
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            $user = User::where('id', $userId)->get();
        } else {
            $user = 'ゲスト';
        }
        //ここまで
        return view('showList', ['itemList' => $items, 'userName' => $user]);
    }

    public function descendingOderPrice()
    {
        return view('showList');
    }
} 