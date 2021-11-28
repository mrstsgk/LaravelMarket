<?php
namespace App\Repositories;

use App\Repositories\Models\User;
use Illuminate\Support\Facades\Hash;
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

    public function getUser($user_id){
        $user = User::where('user_id', $user_id)->get();
        return $user;
    }

    public function getUserName($user_id){
        $user = User::where('user_id', $user_id)->get();
        $userName = $user[0]->name;      
        return $userName;
    }

    public function insertUser($user_id, $name, $email, $password, $zipcode, $address, $telephone){
        // Userのmodelクラスのインスタンスを生成
        $user = new User();
        // データベースに値をinsert
        $model = $user->create([
            'user_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'zipcode' => $zipcode,
            'address' => $address,
            'telephone' => $telephone,
        ]);

        // idを返す
        return $model->user_id; // "testname"
    }
    
}