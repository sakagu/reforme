<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reforme</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<header>
  <div class="header_label">
    <div class="header_left">
      <a href="{{route('posts') }}">
        <div class=header_title>
          <h1>Reforme</h1>
        </div>
      </a>
    </div>
    @if(Auth::check())
      <div class="header_right">
          <div class="header_right_box">
            <a href="{{route('posts.user',['user' => Auth::user()]) }}" class="post_box_user">
              <div class="header-login-icon">
                <i class="fas fa-user-circle"></i>
                <p>{{ Auth::user()->name }}</p>
              </div>
            </a>
          </div>
          <div class="header_right_box">
            <a href="#" id="logout" class="my-navbar-item">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
          <a href="{{route('posts.create')}}" class="header_rightbox">
          <i class="fas fa-pencil-alt"></i>
          </a>
      </div>
    @else
      <div class="header_right">
        <div class="header_right_box">
          <a class="my-navbar-item" href="{{ route('login') }}">Login</a>
        </div>
        <div class="header_right_box">
          <a class="my-navbar-item" href="{{ route('register') }}"><i class="fas fa-user-alt"></i></a>
        </div>
      </div>
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
@yield('scripts')
</body>
</html>