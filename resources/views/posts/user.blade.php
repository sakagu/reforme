@extends('layout')
<link rel="stylesheet" href="/css/mypage.css">
@section('content')
<div class="container-mypage">
  <div class="main_user_title">
    <p>My Page</p>
  </div>
  <div class='tabs'>
    <div class='tab-buttons'>
      <span class='content1'>自分の投稿</span>
      <span class='content2'>お気に入り</span>
      <div id='lamp' class='content1'>
      </div>
    </div>

    <div class='tab-content'>
      <div class='content1'>
        <div class="main_post_box">
          @foreach($posts as $post)
            <div class="main_post_box_contetnt">
              <div class="post_title-box">
                <div class="post_title{{$post->title}}">
                  {{ $post->title }}
                </div>
                  @if (Auth::check())
                    @if ($post->likes()->where('user_id', Auth::user()->id)->first())
                      {{ Form::model($post, array('action' => array('LikesController@destroy', $post->id, $post->likes()->where('user_id', Auth::user()->id)->first()->id))) }}
                      <button type="submit">
                        <i class="fas fa-star"></i>
                        Like {{ $post->likes_count }}
                      </button>
                      {!! Form::close() !!}
                    @else
                      {{ Form::model($post, array('action' => array('LikesController@store', $post->id))) }}
                      <button type="submit">
                      <i class="far fa-star"></i>
                      Like {{ $post->likes_count }}
                      </button>
                      {!! Form::close() !!}
                    @endif
                  @endif
              </div>
              <a href="" class="post_box_post" data-target="{{$post->id}}">
                <div class="post_image">
                  <img src="{{$post->image}}" alt="image" style="width: 300px; height: 300px;"/>
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
        <div class="pagination">
          {{ $posts->links('vendor.pagination.default') }}
        </div>
      </div>


      <div class='content2'>
        <div class="main_post_box">
          @foreach($postlikes as $post)
            <div class="main_post_box_contetnt">
              <div class="post_title-box">
                <div class="post_title{{$post->title}}">
                  {{ $post->title }}
                </div>
                @if (Auth::check())
                  @if ($post->likes()->where('user_id', Auth::user()->id)->first())
                    {{ Form::model($post, array('action' => array('LikesController@destroy', $post->id, $post->likes()->where('user_id', Auth::user()->id)->first()->id))) }}
                    <button type="submit">
                      <i class="fas fa-star"></i>
                      Like {{ $post->likes_count }}
                    </button>
                    {!! Form::close() !!}
                  @else
                    {{ Form::model($post, array('action' => array('LikesController@store', $post->id))) }}
                    <button type="submit">
                      <i class="far fa-star"></i>
                      Like {{ $post->likes_count }}
                    </button>
                    {!! Form::close() !!}
                  @endif
                @endif
              </div>
              <a href="" class="post_box_post" data-target="{{$post->id}}">
                <div class="post_image">
                  <img src="{{$post->image}}" alt="image" style="width: 300px; height: 300px;"/>
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
        <div class="pagination">
          {{ $posts->links('vendor.pagination.default') }}
        </div>
      </div>
    </div>

      @foreach($posts as $post)
        <div id="{{$post->id}}" class="modal js-modal">
          <div class="modal__bg js-modal-close">
          </div>
          <div class="modal__content">
            <div class="modal-image">
              <img src="{{$post->image}}" alt="image" style="width: 600px; height: 600px;"/>
            </div>
            <div class="modal-text">
              {{$post->text}}
            </div>
            <div class="modal-cost">
              {{$post->cost}}
            </div>
            <div class="modal-stpre">
              {{$post->store}}
            </div>
            <div class="post-box-edit-menu">
            <a href="{{route('posts.edit',['id' => $post->id]) }}" class="post_box_edit">
              <div class="btn-primary">
                変更
              </div>
            </a>
            <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="post">
              {{ csrf_field() }}
              <input type="submit" name="delete" value="削除" onClick="delete_alert(event);return false;" class="btn-primary">
            </form>
          </div>
          </div><!--modal__inner-->
        </div><!--modal-->
      @endforeach
</div>


  
@endsection

@section('scripts')
  @include('share.mypage')
@endsection