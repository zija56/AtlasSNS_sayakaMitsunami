@extends('layouts.login')

@section('content')
 <div class="introduce">
   @foreach ($users as $user)
    <div class="image">
      <img src="{{ asset('storage/images/'.$user->images) }}">
    </div>
    <div class="username">
      <p>name</p>
      <p>{{ $user->username }}</p>
    </div>
    <div class="bio">
      <p>bio</p>
      <p></p>
    </div>
    <div>
      @if (auth()->user()->isFollowing($user->id))
        <a href="{{ route('cancel', ['userId' => $user->id]) }}" class="btn btn-cancel">フォロー解除</a>
      @else
       <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-follow">フォローする</a>
      @endif
    </div>
    @endforeach
 </div>
 <div class="timeline">
   @foreach ($posts as $post)
     <table class="timeline">
       <tr>
         <td><img src="{{ asset('storage/images/'.$post->user->images) }}"></td>
          <td>{{ $post->user->username }}</td>
          <td>{{ $post->post }}</td>
          <td>{{ $post->updated_at }}</td>
       </tr>
     </table>
   @endforeach
 </div>


@endsection
