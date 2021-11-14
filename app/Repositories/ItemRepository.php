<?php
namespace App\Repositories;

use App\Repositories\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use League\CommonMark\Block\Element\ListData;

class ItemRepository
{
    /**
     * 商品データを取得する.
     *
     * @return $item 商品データ
     */
    public function getItemList():Collection
    {
        $items = Item::select('id', 'name', 'priceM', 'priceL', 'imagePath')->orderBy('priceM', 'desc')->get();
        return $items;
    }
}