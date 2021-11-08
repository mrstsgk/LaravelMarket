<?php
namespace App\Repositories;

use App\Repositories\Models\Item;

class ItemRepository
{
    public function getItemList(){
        $items = Item::all();
        return $items;
    }
}