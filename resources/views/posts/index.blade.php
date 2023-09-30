@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
<div class="posts">
  {!! Form::open(['url'=>'/post/create']) !!}
  <div class="form-group">
    <img src="/images/icon1.png" class="icon">
    {!! Form::input('text', 'post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
  </div>
  <div class="send">
    <button type="submit"><img src="/images/post.png" alt="送信"></button>
 </div>
  {!! Form::close() !!}
</div>
@endsection
