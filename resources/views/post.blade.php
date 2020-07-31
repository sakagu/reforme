@extends('layout')

@section('content')
  <div class="main">

    <div class="main_title">
      <h2>あなただけのリフォームを教えてください</h2>
    </div>
    <div class="main_explanation">
      <p>住宅リフォーム専用投稿サイトです</p>
      <p>デザインやこだわりポイントを自慢してみましょう</p>
      <p>リフォームをご検討の方は参考に！</p>
      <p>業者紹介も掲載</p>
    </div>

    <div class="main_post"> 
      <h3>投稿一覧</h3>
      <div class="main_post_box">
      @foreach($posts as $post)
        <a href="{{route('posts.show',['id' => $post->id]) }}" class="post_box_post">
          <div class="post_box">
            {{ $post->title }}
          </div>
        </a>
      @endforeach
      </div>
    </div>

  </div>
@endsection
