@include('common.header')

<div class="sginup">
    {{-- エラーメッセージ --}}
    @if (isset($validators))
        {{ $validators->has('name') }}
    @endif
    <div class="title">
        新規会員登録
    </div>
    <div class="member-info">
        {{-- フォーム --}}
        <form action="{{ url('signup') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user_name">名前</label>
                <input type="text" class="form-control" id="user_name" name="name">
            </div>
            <div class="form-group">
                <label for="user_email">メールアドレス</label>
                <input type="text" class="form-control" id="user_email" name="email">
            </div>
            <div class="form-group">
                <label for="user_password">パスワード</label>
                <input type="password" class="form-control" id="user_password" name="password">
            </div>
            <div class="form-group">
                <label for="reenter_password">再入力</label>
                <input type="password" class="form-control" id="reenter_password" name="reenter_password">
            </div>
            <div class="form-group">
                <label for="user_zipcode">郵便番号</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode"><button>検索</button>
            </div>
            <div class="form-group">
                <label for="user_address">住所</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="user_telephone">電話番号</label>
                <input type="text" class="form-control" id="telephone" name="telephone">
            </div>

            <div id="signup_btn">
                <input type="submit" value="新規登録" class="btn btn-primary">
            </div>
        </form>
    </div>

</div>

@include('common.footer')