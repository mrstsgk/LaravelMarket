<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ItemService;
use Illuminate\Contracts\View\View;
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
    public function __construct(ItemService $itemService, UserService $userService)
    {
        $this->itemService = $itemService;
        $this->userService = $userService;
    }
    
    /**
     * 商品一覧を表示する.
     *
     * @return view
     */
    public function showList():View
    {
        $items = $this->itemService->getItemList();
        //　TODO:コメントで囲っている部分をUserRepositoryクラスを作成して移してください
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            $userName = $this->userService->getUserName($userId);
        } else {
            $userName = 'ゲスト';
        }
        //ここまで
        return view('showList', ['itemList' => $items, 'userName' => $userName]);
    }

    public function sortDescendingPrice():View
    {
        $items = $this->itemService->getItemList();
        return view('showList', ['itemList' => $items]);
    }
} 