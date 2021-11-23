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

    public function getUser($email){
        $user = User::where('email', $email)->get();
        return $user;
    }

    public function getUserName($userId){
        $user = User::where('id', $userId)->get();
        $userName = $user[0]->name;
        return $userName;
    }

    public function insertUser($name, $email, $password, $zipcode, $address, $telephone){
        // Userのmodelクラスのインスタンスを生成
        $user = new User();
        // データベースに値をinsert
        $model = $user->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'zipcode' => $zipcode,
            'address' => $address,
            'telephone' => $telephone,
        ]);

        // idを返す
        return dd($model->id); // "testname"
    }
    
}