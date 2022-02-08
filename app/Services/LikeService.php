<?php
namespace App\Services;

use App\Repositories\LikeRepository;

class LikeService
{    
    /** @Autowired */
    private $likeRepository;
    
    /**
     * Repositoryクラスの依存性を注入する.
     *
     * @param  mixed $likeRepository
     * @return void
     */
    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }
        
    /**
     * コントローラにユーザーデータを返す.
     *
     * @return $likes ユーザーデータ
     */
    public function getLikeList(){
        $likes = $this->likeRepository->getLikeList();
        return $likes;
    }

    public function newLike() {
        $like = $this->likeRepository->newLike();
        return $like;
    }
}