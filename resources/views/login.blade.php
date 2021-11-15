@include('common.header')

<section id="login_wrapper">
    <div id="login_page">
        <h1>ログイン</h1>

        {{-- エラーメッセージ --}}
        @if (isset($login_error))
            <div id="error_explanation" class="text-danger">
                <ul>
                    <li>メールアドレスまたはパスワードが一致しません。</li>
                </ul>
            </div>
        @endif

        {{-- フォーム --}}
        <form action="{{ url('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user_email">{{ trans('validation.attributes.email') }}</label>
                <input type="text" class="form-control" id="user_email" name="email">
            </div>
            <div class="form-group">
                <label for="user_password">{{ trans('validation.attributes.password') }}</label>
                <input type="password" class="form-control" id="user_password" name="password">
            </div>
            <div id="login_btn">
                <input type="submit" value="ログインする" class="btn btn-primary">
            </div>
        </form>
    </div>
</section>

@include('common.footer')
