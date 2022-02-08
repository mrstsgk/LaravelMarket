<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Repositories\Models\User;
use App\Http\Validator\UserValidator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

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
        $id = Cookie::get('userId');
        if (isset($id)) {
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
        // validationチェック
        $validator = $this->userValidator->createValidation($request);
        if ($validator->fails()) {
            return redirect('/signup')
                    ->withErrors($validator)
                    ->withInput();
        }

        // 登録
        $id = $this->userService->insertUser($request->name, $request->email, $request->password, $request->zipcode, $request->address, $request->telephone);

        // cookie設定
        Cookie::queue('userId', $id, 60);

        return redirect('/mypage');
    } 

}