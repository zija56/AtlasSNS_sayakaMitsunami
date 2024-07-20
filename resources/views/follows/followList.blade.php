@extends('layouts.login')

@section('content')
@if (Auth::check())
 <div class="main01 list">
   <div class="ListTittle"><h2>Follow List</h2></div>
   <div class="FollowList">
    @foreach ($users as $user)
    <a href="/profile/{{ $user->id }}"><img src="{{ asset('storage/images/'.$user->images) }}"></a>
    @endforeach
   </div>
 </div>
 <div class="timelines">
    @foreach ($posts as $post)
     <div class="timeline">
       <div class="TimelineTable">
         <div class="TimelineContents01">
           <a href="/profile/{{ $user->id }}"><img src="{{ asset('storage/images/'.$post->user->images) }}"></a>
         </div>
         <div class="TimelineContents02">
           <div class="name">{{ $post->user->username }}</div>
           <div>{!! nl2br(htmlspecialchars($post->post)) !!}</div>
         </div>
         <div class="TimelineContents03">
           <div>{{ $post->updated_at }}</div>
         </div>
       </div>
     </div>
    @endforeach
 </div>
@endif
@endsection
