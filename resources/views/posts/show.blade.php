@extends('layout')

@section('content')
{{$post->title}}
  <a href="{{route('posts.edit',['id' => $post->id]) }}" class="post_box_edit">
  変更
  </a>
  <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="post">
        {{ csrf_field() }}
        <input type="submit" name="delete" value="削除" onClick="delete_alert(event);return false;">
  </form>


  @if (Auth::check())
    @if ($like)
      {{ Form::model($post, array('action' => array('LikesController@destroy', $post->id, $like->id))) }}
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


@endsection
<script>
  function delete_alert(e){
    if(!window.confirm('本当に削除しますか？')){
        window.alert('キャンセルされました'); 
        return false;
    }
    document.deleteform.submit();
    };
</script>













