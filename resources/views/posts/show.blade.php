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