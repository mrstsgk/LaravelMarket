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
     * @return $itemList 商品データ
     */
    public function getItemList():Collection
    {
        $itemList = $this->itemRepository->getItemList();
        return $itemList;
    }
    
    /**
     * コントローラに商品データを条件に沿って返す.
     *
     * @param  mixed $sort ソート条件
     * @return Collection $itemList
     */
    public function sortItemList(String $sort):Collection
    {
        if ($sort === 'asc') {
            $itemList = $this->itemRepository->getItemListAsc();
        }else if($sort === 'desc'){
            $itemList = $this->itemRepository->getItemListDesc();
        }else if($sort === 'fav'){
            $itemList = $this->itemRepository->getItemListFav();
        }
        return $itemList;
    }
    
    /**
     * 商品を検索する.
     * nullなら全件検索、nullでなければあいまい検索
     *
     * @param  mixed $keyword 検索ワード
     * @return Collection
     */
    public function searchItemList(string|null $keyword):Collection
    {
        if ($keyword === null) {
            $itemList = $this->itemRepository->getItemList();
            return $itemList;
        }
        $itemList = $this->itemRepository->searchItemList($keyword);
        return $itemList;
    }
}