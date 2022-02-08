<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ItemService;
use Attribute;
use App\Services\LikeService;
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
    public function __construct(ItemService $itemService, UserService $userService, LikeService $likeService)
    {
        $this->itemService = $itemService;
        $this->userService = $userService;
        $this->likeServise = $likeService;
    }
    
    /**
     * 商品一覧を表示する.
     *
     * @return view
     */
    public function showList():View
    {
        $itemList = $this->itemService->getItemList();
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            $userName = $this->userService->getUserName($userId);
        } else {
            $userName = 'ゲスト';
        }
        $like_model = $this->likeServise->newLike();
        return view('showList', ['itemList' => $itemList, 'userName' => $userName, 'like_model'=>$like_model]);
    }

    
    /**
     * 商品一覧を表示する（昇順）.
     *
     * @param  mixed $sort ソート条件
     * @return View
     */
    public function sortItemList(String $sort):View
    {
        $itemList = $this->itemService->sortItemList($sort);
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            $userName = $this->userService->getUserName($userId);
        } else {
            $userName = 'ゲスト';
        }
        return view('showList', ['itemList' => $itemList, 'userName' => $userName]);
    }

    /**
     * 商品検索機能.
     *
     * @param  mixed $request String
     * @return View
     */
    public function searchItemList(Request $request):View
    {
        $keyword = $request->input('keyword');
        $itemList = $this->itemService->searchItemList($keyword);
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            $userName = $this->userService->getUserName($userId);
        } else {
            $userName = 'ゲスト';
        }
        return view('showList', ['itemList' => $itemList, 'userName' => $userName]);
    }
}