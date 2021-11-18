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
        $itemList = Item::select('id', 'name', 'priceM', 'priceL', 'imagePath')->orderBy('priceM', 'asc')->get();
        return $itemList;
    }
    
    /**
     * 商品データを昇順で取得する.
     *
     * @return Collection
     */
    public function getItemListAsc():Collection
    {
        $itemList = Item::select('id', 'name', 'priceM', 'priceL', 'imagePath')->orderBy('priceM', 'asc')->get();
        return $itemList;
    }
        
    /**
     * 商品データを降順で取得する.
     *
     * @return Collection
     */
    public function getItemListDesc():Collection
    {
        $itemList = Item::select('id', 'name', 'priceM', 'priceL', 'imagePath')->orderBy('priceM', 'DESC')->get();
        return $itemList;
    }
}