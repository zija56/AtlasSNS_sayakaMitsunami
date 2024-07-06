@extends('layouts.logout')

@section('content')
{!! Form::open(['url' => '/login']) !!}
<div class="login">
 <p class="Tittle">AtlasSNSへようこそ</p>
 <div class="List">
    <div class="ListItem">
      <p>{{ Form::label('e-mail') }}</p>
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="ListItem">
     <p>{{ Form::label('password') }}</p>
     {{ Form::password('password',['class' => 'input']) }}
   </div>
 </div>
 <div class="login-btn"><p>{{ Form::submit('ログイン',['class' => 'button']) }}</p></div>


 <p class="new"><a href="/register">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}

@endsection
