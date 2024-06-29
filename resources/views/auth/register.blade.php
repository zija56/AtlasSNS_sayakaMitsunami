@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open() !!}
<div class="login">
  <p class="Tittle">新規ユーザー登録</p>

 @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
 @endif

 <div class="List">
    <div class="ListItem">
      <p>{{ Form::label('ユーザー名') }}</p>
      {{ Form::text('username',null,['class' => 'input']) }}
    </div>
    <div class="ListItem">
     <p>{{ Form::label('メールアドレス') }}</p>
     {{ Form::text('mail',null,['class' => 'input']) }}
   </div>
   <div class="ListItem">
     <p>{{ Form::label('パスワード') }}</p>
     {{ Form::password('password',['class' => 'input']) }}
   </div>
   <div class="ListItem">
     <p>{{ Form::label('パスワード確認') }}</p>
     {{ Form::password('password_confirmation',['class' => 'input']) }}
   </div>
 </div>
 <div class="login-btn"><p>{{ Form::submit('新規登録',['class' => 'button']) }}</p></div>

 <p class="new"><a href="/login">ログイン画面へ戻る</a></p>

</div>
{!! Form::close() !!}


@endsection
