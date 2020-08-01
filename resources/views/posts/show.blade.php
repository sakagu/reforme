@extends('layout')

@section('content')
{{$post->title}}
  <a href="{{route('posts.edit',['id' => $post->id]) }}" class="post_box_edit">
  変更
  </a>
  <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="post">
        {{ csrf_field() }}
        <input type="submit" name="delete" value="削除">
  </form>


@endsection