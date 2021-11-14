<?php
namespace App\Services;

use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Collection;

class ItemService
{    
    /** @Autowired */
    private $itemRepository;
    
    /**
     * Repositoryクラスの依存性を注入する.
     *
     * @param  mixed $itemRepository
     * @return void
     */
    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
        
    /**
     * コントローラに商品データを返す.
     *
     * @return $items 商品データ
     */
    public function getItemList():Collection
    {
        $items = $this->itemRepository->getItemList();
        return $items;
    }
}