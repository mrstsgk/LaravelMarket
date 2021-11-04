<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // 入力値をUserテーブルで検索
        $user = User::where('email', $request->email)->get();

        // なければエラーを返す
        if (count($user) === 0){
            return view('login', ['login_error' => '1']);
        }
        
        // 一致
        if (Hash::check($request->password, $user[0]->password)) {
            
            // cookie設定
            Cookie::queue('userId', $user[0]->id, 60);

            return redirect(url('/'));
        // 不一致    
        }else{
            return view('login', ['login_error' => '1']);
        }
    } 
    
    public function logout(Request $request)
    {
        setcookie('userId');
        return redirect(url('/'));
    }  
}