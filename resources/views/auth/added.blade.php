@extends('layouts.logout')

@section('content')

<div class="welcome">
  <div class="ClearTittle">
    <p>{{ session('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="Text">
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
  </div>
  <div class="clear-btn"><a href="/login">ログイン画面へ</a></div>
</div>

@endsection
