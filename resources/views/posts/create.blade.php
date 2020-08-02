@extends('layout')
<link rel="stylesheet" href="/css/create.css">
@section('content')
  <div class="container">
    <div class="post_create_form">
      <div class="post_create_form_box">
        <form enctype="multipart/form-data" action="{{ route('posts.create') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>カテゴリー</p>
              </div>
              <div class="form-group_title">
                <select name="title" size="1" class="form-group_select">
                  <option value="Kitchen">Kitchen</option>
                  <option value="Bathroom">bathroom</option>
                  <option value="Washroom">Washroom</option>
                  <option value="Toilet">Toilet</option>
                  <option value="Entrance">Entrance</option>
                  <option value="Door">Door</option>
                  <option value="Floor">Floor</option>
                  <option value="Interior">Interior</option>
                  <option value="Renovation">Renovation</option>
                  <option value="Bedroom">Bedroom</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>業者</p>
              </div>
              <div class="form-group-store">
                <input type="text" class="form-store" name="store" id="store" value="{{ old('store') }}" />
              </div>
            </div> 
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>費用</p>
              </div>
              <div class="form-group-cost">
                <input type="text" class="form-cost" name="cost" id="cost" value="{{ old('cost') }}" />
              </div>
            </div> 
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>こだわりポイント</p>
              </div>
              <div class="form-group-text">
                <input type="text" class="form-text" name="text" id="text" value="{{ old('text') }}" />
              </div>
            </div> 
            <div class="form-group-box">
              <div class="form-group_menu">
                <p>写真</p>
              </div>
              <div class="form-group-image">
                <label for="image">
                  <div class="image-select">
                  <div>
                </label>
                <input type="file" class="form-image" name="image" id="image" value="{{ old('image') }}" />
              </div>
            </div> 
            <div class="botton-area">
              <input type="submit" class="btn-primary" value="投稿">
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