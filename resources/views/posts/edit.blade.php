@extends('layout')
<link rel="stylesheet" href="/css/create.css">
@section('content')
<div class="container">
    <div class="post_create_form">
      <div class="post_create_form_box">
        <form enctype="multipart/form-data" action="{{ route('posts.edit', ['id' => $post->id] ) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>カテゴリー</p>
              </div>
              @if($errors->any())
              @if((old('title')) == '')
              <div class="errors-message">
                <p>カテゴリは選択してください</p>
              </div>
              @endif
              @endif
              <div class="form-group_title">
                <select name="title" size="1" class="form-group_select">
                <option value="{{$post->title}}" selected>{{$post->title}}</option>
                  <option value="">選択してください</option>
                  <option value="Kitchen" @if(old('title')=='Kitchen') selected  @endif>Kitchen</option>
                  <option value="Bathroom" @if(old('title')=='Bathroom') selected  @endif>bathroom</option>
                  <option value="Washroom" @if(old('title')=='Washroom') selected  @endif>Washroom</option>
                  <option value="Toilet" @if(old('title')=='Toilet') selected  @endif>Toilet</option>
                  <option value="Entrance" @if(old('title')=='Entrance') selected  @endif>Entrance</option>
                  <option value="Door" @if(old('title')=='Door') selected  @endif>Door</option>
                  <option value="Floor" @if(old('title')=='Floor') selected  @endif>Floor</option>
                  <option value="Interior" @if(old('title')=='Interior') selected  @endif>Interior</option>
                  <option value="Renovation" @if(old('title')=='Renovation') selected  @endif>Renovation</option>
                  <option value="Bedroom" @if(old('title')=='Bedroom') selected  @endif>Bedroom</option>
                  <option value="Other" @if(old('title')=='Other') selected  @endif>Other</option>
                </select>
              </div>
            </div>
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>業者</p>
              </div>
              <div class="form-group-store">
                <input type="text" class="form-store" name="store" id="store" value="{{ old('store') ?? $post->store }}" />
              </div>
            </div> 
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>費用</p>
              </div>
              <div class="form-group-cost">
                <select name="cost" size="1" class="form-group_select">
                    <option value="{{$post->cost}}" selected>{{$post->cost}}</option>
                    <option value="">選択してください</option>
                    <option value="10万円以下" @if(old('cost')=='10万円以下') selected  @endif>10万円以下</option>
                    <option value="10万円〜30万円" @if(old('cost')=='10万円〜30万円') selected  @endif>10万円〜30万円</option>
                    <option value="30万円〜60万円" @if(old('cost')=='30万円〜60万円') selected  @endif>30万円〜60万円</option>
                    <option value="60万円〜100万円" @if(old('cost')=='60万円〜100万円') selected  @endif>60万円〜100万円</option>
                    <option value="100万円〜150万円" @if(old('cost')=='100万円〜150万円') selected  @endif>100万円〜150万円</option>
                    <option value="150万円〜200万円" @if(old('cost')=='150万円〜200万円') selected  @endif>150万円〜200万円</option>
                    <option value="200万円〜300万円" @if(old('cost')=='200万円〜300万円') selected  @endif>200万円〜300万円</option>
                    <option value="300万円〜400万円" @if(old('cost')=='300万円〜400万円') selected  @endif>300万円〜400万円</option>
                    <option value="400万円〜500万円" @if(old('cost')=='400万円〜500万円') selected  @endif>400万円〜500万円</option>
                    <option value="500万円〜1000万円" @if(old('cost')=='500万円〜1000万円') selected  @endif>500万円〜1000万円</option>
                    <option value="1000万円以上" @if(old('cost')=='1000万円以上') selected  @endif>1000万円以上</option>
                  </select>
              </div>
            </div> 
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>こだわりポイント</p>
              </div>
              @if($errors->any())
                @if((old('text')) == '')
                <div class="errors-message">
                  <p>こだわりポイントは必ず入力してください</p>
                </div>
                @endif
              @endif
              <div class="form-group-text">
                <input type="text" class="form-text" name="text" id="text" value="{{ old('text') ?? $post->text }}" />
              </div>
            </div> 
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>写真</p>
              </div>
              @if($errors->any())
              @if((old('image')) == '')
              <div class="errors-message">
                <p>写真は必ず投稿してください。(拡張子jpeg,png,jpg,gifのみ)</p>
              </div>
              @endif
              @endif
              <div class="form-group-image">
                <label for="image">
                  <div class="image-select">
                    <div class= "image">
                      <img src="{{$post->image}}" alt="image" style="width: 300px; height: 300px;"/>
                    </div>
                  <div>
                </label>
                <input type="file" class="form-image" name="image" id="image" value="{{ old('image') }}" />
              </div>
            </div> 
            <div class="botton-area">
              <input type="submit" class="btn-primary" value="変更">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  @include('share.scripts')
@endsection