@extends('layouts.login')

@section('content')
@if (Auth::check())
 <div id="list">
   <div><h2>Follow List</h2></div>
   <div class="follow-list">
    @foreach ($users as $user)
    <a href="/profile/{{ $user->id }}"><img src="{{ asset('storage/images/'.$user->images) }}"></a>
    @endforeach
   </div>
 </div>
 <div id="follow-posts">
   <div>
    @foreach ($posts as $post)
     <table>
       <tr>
        <td><a href="/profile/{{ $user->id }}"><img src="{{ asset('storage/images/'.$post->user->images) }}"></a></td>
        <td>{{ $post->user->username }}</td>
        <td>{{ $post->post }}</td>
        <td>{{ $post->updated_at }}</td>
       </tr>
     </table>
    @endforeach
   </div>
 </div>
@endif
@endsection
