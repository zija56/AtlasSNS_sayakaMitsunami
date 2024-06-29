@extends('layouts.login')

@section('content')
@if (Auth::check())
 <div id="list">
   <div><h2>Follower List</h2></div>
   <div class="follower-list">
    @foreach ($users as $user)
    <a href="/profile/{{ $user->id }}"><img src="{{ asset('storage/images/'.$user->images) }}"></a>
    @endforeach
   </div>
 </div>
 <div id="follower-posts">
   <div>
    @foreach ($posts as $post)
     <table>
       <tr>
        <td><a href="/profile/{{ $user->id }}"><img src="{{ asset('storage/images/'.$post->user->images) }}"></td></a>
        <td>{{ $post->user->username }}</td>
        <td>{!! nl2br(htmlspecialchars($post->post)) !!}</td>
        <td>{{ $post->updated_at }}</td>
       </tr>
     </table>
    @endforeach
   </div>
 </div>
@endif
@endsection
