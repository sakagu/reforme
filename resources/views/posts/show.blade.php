@extends('layout')

@section('content')
{{$post->title}}
  <a href="{{route('posts.edit',['id' => $post->id]) }}" class="post_box_edit">
  変更
  </a>


@endsection
