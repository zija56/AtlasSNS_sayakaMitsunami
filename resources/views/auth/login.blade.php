@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<div class="login">
 <p class="welcome">AtlasSNSへようこそ</p>
 <div class="e-mail">
   <p>{{ Form::label('e-mail') }}</p>
   {{ Form::text('mail',null,['class' => 'input']) }}
 </div>
 <div class="pass">
   <p>{{ Form::label('password') }}</p>
   {{ Form::password('password',['class' => 'input']) }}
 </div>


 {{ Form::submit('ログイン') }}

 <p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}

@endsection
