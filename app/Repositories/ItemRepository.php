<?php
namespace App\Repositories;

use App\Repositories\Models\Item;
use League\CommonMark\Block\Element\ListData;

class ItemRepository
{
    /**
     * 商品データを取得する.
     *
     * @return $item 商品データ
     */
    public function getItemList(){
        $items = Item::all();
        return $items;
    }
}