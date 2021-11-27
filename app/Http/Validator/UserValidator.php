<?php

namespace App\Http\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator extends Validator
{
    public function createValidation(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        $params = $request->all();
        return Validator::make($params, [// <- バリデーターインスタンスを返す
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users',
            ],
        ], [
            'name.required' => '名前を入力してください。',
            'name.string' => '記号の入力はできません。',
            'name.max' => '10文字以内で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メール形式で入力してください',
            'email.max' => '255文字以内で入力してください。',
            'email.unique' => '入力したメールアドレスは既に使われています。',
        ]);
    }
}