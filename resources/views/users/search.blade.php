@extends('layouts.login')

@section('content')
<div class="search">
  <div class="result">
   <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="form" placeholder="ユーザー名" value="">
    <button type="submit"><img src="/images/search.png" alt="検索"></button>
   </form>
  </div>
  <div class="result"><p>@if (isset($keyword)) 検索ワード：{{ $keyword }} @endif</p></div>
</div>

<div class="user">
    @foreach ($users as $user)
     <table class="user-list">
      <tr>
        <td><img src="{{ asset('storage/images/'.$user->images) }}"></td>
        <td>{{ $user->username }}</td>
        <td>@if (auth()->user()->isFollowing($user->id))
       <a href="{{ route('cancel', ['userId' => $user->id]) }}" class="btn btn-cancel">フォロー解除</a>
       @else
       <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-follow">フォローする</a>
        @endif</td>
      </tr>
    @endforeach
     </table>
</div>

@endsection
