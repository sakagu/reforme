@extends('layout')

@section('content')
  <div class="container">
    <div class="post_create_title">
      <h1>リフォームを投稿する</h1>
    </div>
    <div class="post_create_form">
      <form action="{{ route('posts.edit', ['id' => $post->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $post->title }}" />
          <input type="text" class="form-control" name="text" id="text" value="{{ old('text') ?? $post->text }}" />
          <input type="file" class="form-control" name="image" id="image" value="{{ old('image') ?? $post->image}}" />
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
    </div>
  </div>
@endsection

