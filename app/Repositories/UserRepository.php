<?php
namespace App\Repositories;

use App\Repositories\Models\User;
use League\CommonMark\Block\Element\ListData;

class UserRepository
{
    /**
     * ユーザーデータを取得する.
     *
     * @return $user ユーザーデータ
     */
    public function getUserList(){
        $users = User::all();
        return $users;
    }

    public function getUser($email){
        $user = User::where('email', $email)->get();
        return $user;
    }

    public function getUserName($userId){
        $user = User::where('id', $userId)->get();
        $userName = $user[0]->name;
        return $userName;
    }
    
}