@extends('layouts.login')

@section('content')
@if (Auth::check())
<div class="">
  <input type="hidden" name="id">
  <div class="image">
   <img src="{{ asset('storage/images/'.Auth::user()->images) }}">
  </div>
  <form action="/myprofile/update" method=post>
    @csrf
    <div class="update-block">
      <div class="update-form">
        <label for="username">ユーザー名</label>
        <input type="text" name="upUsername" class="" value="{{Auth::user()->username}}" >
      </div>
      <div class="update-form">
        <label for="mail">メール</label>
        <input type="text" name="upMail" class="" value="{{Auth::user()->mail}}">
      </div>
      <div class="update-form">
        <label for="password">パスワード</label>
        <input type="password" name="upPassword" class="">
      </div>
      <div class="update-form">
        <label for="password_conformation">パスワード確認</label>
        <input type="password" name="upPassword_conformation" class="">
      </div>
      <div class="update-form">
        <label for="bio">自己紹介</label>
        <input type="textarea" name="upBio" class="" value="{{Auth::user()->bio}}">
      </div>
      <div class="update-form">
        <label for="images">アイコン画像</label>
        <input type="file" name="upImages">
      </div>
    </div>
    <div class="update-button">
      <button type="submit" value="更新">更新</button>
    </div>
  </form>
</div>
@endif
@endsection