<?php

namespace App\Http\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator extends Validator
{
    public function createValidation(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        $regex_pwd = '#^(?=.*[A-Z])(?=.*[_@`])[a-zA-Z0-9.?\/-]$#';
        $params = $request->all();
        return Validator::make($params, [// <- バリデーターインスタンスを返す
            'name' => [
                'required',
                'max:10',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => [
                'required',
                'between:8,20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!\?\/@_\-&%-()])/',
                'confirmed',
            ],
        ], [
            'required' => '入力が必須の項目です。',
            'name.max' => '10文字以内で入力してください。',
            'email.email' => 'メール形式で入力してください',
            'email.max' => '255文字以内で入力してください。',
            'email.unique' => '入力したメールアドレスは既に使われています。',
            'password.between' => '8文字以上20文字以内で入力してください。',
            'password.regex' => '大文字・小文字・記号をそれぞれ1文字以上使用してください。',
            'password.confirmed' => '確認用のパスワードと一致しません。',
        ]);
    }
}