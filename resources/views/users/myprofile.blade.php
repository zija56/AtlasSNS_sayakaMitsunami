@extends('layouts.login')

@section('content')
@if (Auth::check())
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="update">
    <div class="image">
     <img src="{{ asset('storage/images/'.Auth::user()->images) }}" class="icon">
    </div>
    <form action="/myprofile/update" method=post enctype="multipart/form-data" class="update-block">
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    @csrf
      <div class="update-form">
        <label for="username" class="label">ユーザー名</label>
        <input type="text" name="upUsername" class="input" value="{{Auth::user()->username}}" >
      </div>
      <div class="update-form">
        <label for="mail" class="label">メール</label>
        <input type="text" name="upMail" class="input" value="{{Auth::user()->mail}}">
      </div>
      <div class="update-form">
        <label for="password" class="label">パスワード</label>
        <input type="password" name="upPassword" class="input">
      </div>
      <div class="update-form">
        <label for="password_confirmation" class="label">パスワード確認</label>
        <input type="password" name="upPassword_confirmation" class="input">
      </div>
      <div class="update-form">
        <label for="bio" class="label">自己紹介</label>
        <input type="textarea" name="upBio" class="input" value="{{Auth::user()->bio}}">
      </div>
      <div class="update-form">
        <label for="images" class="label">アイコン画像</label>
        <input type="file" name="upImages" class="file">
      </div>
    </div>
    <p><button type="submit" value="更新" class="btn-update">更新</button></p>
  </form>
@endif
@endsection
