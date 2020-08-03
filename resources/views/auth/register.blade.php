@extends('layout')
<link rel="stylesheet" href="/css/register.css">
@section('content')
  <div class="register-container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">アカウント作成</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="email"><p>メールアドレス</p></label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="name"><p>ユーザー名</p></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="password"><p>パスワード</p></label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm"><p>パスワード（確認）</p></label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection