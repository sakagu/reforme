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













<h1>Lava lamp multiple tabs</h1>
<div class='tabs'>
  <div class='tab-buttons'>
    <span class='content1'>Button 1</span>
    <span class='content2'>Button 2</span>
    <span class='content3'>Button 3</span>
    <div id='lamp' class='content1'></div>
  </div>
  <div class='tab-content'>
    
    <div class='content1'>This is the content of 1 container.This will be open when button 1 is clicked.This is the content of 1 container.This will be open when button 1 is clicked.This is the content of 1 container.This will be open when button 1 is clicked.</div>
    
    <div class='content2'>This is the content of 2 container.This will be open when button 2 is clicked.This is the content of 2 container.This will be open when button 2 is clicked.This is the content of 2 container.This will be open when button 2 is clicked.</div>
    
    <div class='content3'>This is the content of 3 container.This will be open when button 3 is clicked.This is the content of 3 container.This will be open when button 3 is clicked.This is the content of 3 container.This will be open when button 3 is clicked.</div>
    
  </div>
</div>
<div class='credit'>
  
</div>