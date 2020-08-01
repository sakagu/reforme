<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reforme</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
  <div class="header_label">
    <div class="header_left">
      <div class=header_title>
        <h1>Reforme</h1>
      </div>
      <div clas="header_subtitle">
        <h2>〜自分だけのリフォーム〜</h2>
      </div>
    </div>
    @if(Auth::check())
      <div class="header_right">
          <div class="header_right_box">
              <p>{{ Auth::user()->name }}さん</p>
          </div>
          <div class="header_right_box">
            <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
          <a href="{{route('posts.create')}}" class="header_rightbox">
            投稿する
          </a>
      </div>
    @else
      <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
          ｜
      <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
    @endif
 </div>
 @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
</header>
<main>
  @yield('content')
</main>
<!-- @yield('scripts') -->
</body>
</html>