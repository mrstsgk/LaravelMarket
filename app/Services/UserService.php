<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

class UserService
{    
    /** @Autowired */
    private $userRepository;
    
    /**
     * Repositoryクラスの依存性を注入する.
     *
     * @param  mixed $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
        
    /**
     * コントローラにユーザーデータを返す.
     *
     * @return $users ユーザーデータ
     */
    public function getUserList(){
        $users = $this->userRepository->getUserList();
        return $users;
    }

    public function getUserName($user_id){
        $userName = $this->userRepository->getUserName($user_id);
        return $userName;
    }

    public function loginChk($email, $password){

        // 入力値をUserテーブルで検索
        $user= $this->userRepository->getUser($email);
        
        // なければエラー
        if (count($user) === 0){
            return array(false, 0);
        }

        // 一致
        if (Hash::check($password, $user[0]->password)) {

            return array(true, $user[0]->user_id);
        } else {
            return array(false, 0);
        }

        return array(false, 0);
    }

    public function insertUser($user_id, $name, $email, $password, $zipcode, $address, $telephone){
        $userId = $this->userRepository->insertUser($user_id, $name, $email, $password, $zipcode, $address, $telephone);
        return $userId;        
    }
}