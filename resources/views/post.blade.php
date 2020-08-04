@extends('layout')

@section('content')
  <div class="main">
    <div class="main-content">
      <div class="main_box">
        <div class="main_title">
          <p>Reforme</p>
        </div>
        <div class="main_title_version">
          <p>~Please tell me your reform~</p>
        </div>
      </div>
      
      <div class="main_post"> 
        <div class="main_post_title"> 
          <h3>~ New arrival ~</h3>
        </div>
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
                <!-- <img src="/images/icon_heart_red.svg"> -->
                <i class="fas fa-star"></i>
                Like {{ $post->likes_count }}
              </button>
              {!! Form::close() !!}
              @else
              {{ Form::model($post, array('action' => array('LikesController@store', $post->id))) }}
              <button type="submit">
                <i class="far fa-star"></i>
                <!-- <img src="/images/icon_heart.svg"> -->
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
      </div>
      <div class="pagination">
        {{ $posts->links('vendor.pagination.default') }}
      </div>
  
      <div class="main_explanation">
        <div class="main_explanation_1">
          <div class="main_explanation_1_1">
            <p>デザインやこだわりポイントを自慢してみましょう！</p>
          </div>
        </div>
        <div class="main_explanation_2">
          <div class="main_explanation_2_1">
            <p>リフォームをご検討の方は参考に!</p>
          </div>
        </div>
        <div class="main_explanation_3">
          <div class="main_explanation_3_1">
            <p>リフォーム業者を検索してみよう！</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(Auth::check())
    @foreach($posts as $post)
    <div id="{{$post->id}}" class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <div class="modal-image">
            <img src="{{ asset('/storage/'.$post->image) }}" alt="image" style="width: 600px; height: 600px;"/>
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
          @if( Auth::user()->id == $post->user_id)
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
          @endif
        </div><!--modal__inner-->
    </div><!--modal-->
    @endforeach
  @endif
  @endsection

@section('scripts')
  @include('share.modal')
@endsection
  