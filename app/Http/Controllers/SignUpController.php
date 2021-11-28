<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Repositories\Models\User;
use App\Http\Validator\UserValidator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use phpseclib3\Crypt\Random;

class SignUpController extends Controller
{
    /** @Autowired */
    private $userService;
    private $userValidator;
    
    /**
     * Serviceクラスの依存性を注入する.
     *
     * @param  mixed $userService
     * @return void
     */
    public function __construct(UserService $userService, UserValidator $userValidator)
    {
        $this->userService = $userService;
        $this->userValidator = $userValidator;
    }

    /**
     * 新規登録画面への遷移.
     *
     * @return view
     */
    public function show() 
    {
        $userId = Cookie::get('userId');
        if (isset($userId)) {
            return redirect('/mypage');
        } else {
            return view('signup', ['userName' => 'ゲスト']);
        }
    }

    /**
     * 新規登録機能.
     *
     * @return view
     */
    public function signup(Request $request)
    {
        // // パスワードチェック
        // if ($request->password !== $request->reenter_password) {
        //     return view('signup', ['userName' => 'ゲスト']);
        // }

        // validationチェック
        $validator = $this->userValidator->createValidation($request);
        if ($validator->fails()) {
            return redirect('/signup')
                    ->withErrors($validator)
                    ->withInput();
        }

        //user_idの生成
        while (true) {
            $user_id = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
            $user = $this->userService->getUser($user_id);
            // 使用されていないuser_idならbreak
            if (count($user) <= 0) {
                break;
            }
        }

        // 登録
        $userId = $this->userService->insertUser($user_id, $request->name, $request->email, $request->password, $request->zipcode, $request->address, $request->telephone);

        // cookie設定
        Cookie::queue('userId', $userId, 60);

        return redirect('/mypage');
    } 

}