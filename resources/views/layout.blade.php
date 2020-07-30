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
    <div class="header_right">
      <div class="header_user">
        <p>ユーザー名</p>
      </div>
      <div class="header_login">
        <p>ログイン</p>
      </div>
      <div class="header_post">
        <p>投稿する</p>
      </div>
    </div>
 </div>
</header>
<main>
  @yield('content')
</main>
@yield('scripts')
</body>
</html>