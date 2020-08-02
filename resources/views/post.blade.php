@extends('layout')

@section('content')
  <div class="main">
    <div class="main_box">
      <div class="main_title">
        <p>Reforme</p>
      </div>
        <div class="main_title_version">
          <p>~Please tell me your reform~</p>
        </div>
      </div>
    </div>
    
    <div class="main_post"> 
      <div class="main_post_title"> 
        <h3>~ New arrival ~</h3>
      </div>
      <div class="main_post_box">
        @foreach($posts as $post)
        <div class="main_post_box_contetnt">
          <a href="{{route('posts.show',['id' => $post->id]) }}" class="post_box_post">
            <div class="post_title{{$post->title}}">
              {{ $post->title }}
            </div>
            <div class="post_image">
              <img src="{{ asset('/storage/'.$post->image) }}" alt="image" style="width: 300px; height: 300px;"/>
            </div>
            <div class="post_user">
              {{ $post->user->name }}さん
            </div>
            <div class="post_user">
              業者名:{{ $post->store }}
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <div class="main_explanation">
      <div class="main_explanation_1">
        <div class="main_explanation_1_1">
         <p>デザインやこだわりポイントを自慢してみましょう！</p>
        </div>
      </div>
      <div class="main_explanation_2">
        <div class="main_explanation_2_1">
          <p>リフォームをご検討の方は参考に！下調べは重要です！</p>
        </div>
      </div>
      <div class="main_explanation_3">
        <div class="main_explanation_3_1">
          <p>リフォーム業者を検索してみよう！お願したい会社が見つかるかも！</p>
        </div>
      </div>
    </div>
  </div>
  @endsection
  