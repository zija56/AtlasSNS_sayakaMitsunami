@extends('layouts.login')

@section('content')
 <div class="main01 introduce">
   @foreach ($users as $user)
    <div class="IntroduceImage">
      <img src="{{ asset('storage/images/'.$user->images) }}">
    </div>
    <div class="IntroduceContents">
      <div class="profile">
        <label for="username" class="label">ユーザー名</label>
        <p>{{ $user->username }}</p>
      </div>
      <div class="profile">
        <label for="bio" class="label">自己紹介</label>
        <p>{{ $user->bio }}</p>
      </div>
    </div>
    <div class="btn-profile">
      @if ($user->id !== Auth::user()->id)
      @if (auth()->user()->isFollowing($user->id))
        <a href="{{ route('cancel', ['userId' => $user->id]) }}" class="btn btn-cancel">フォロー解除</a>
      @else
       <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-follow">フォローする</a>
      @endif
      @endif
    </div>
    @endforeach
 </div>
 <div class="timelines">
   @foreach ($posts as $post)
     <div class="timeline">
      <div class="TimelineTable">
        <div class="TimelineContents01">
           <img src="{{ asset('storage/images/'.$post->user->images) }}">
        </div>
        <div class="TimelineContents02">
          <div class="name">{{ $post->user->username }}</div>
          <div>{!! nl2br(htmlspecialchars($post->post)) !!}</div>
        </div>
        <div class="TimelineContents03">
          <div>{{ $post->updated_at }}</div>
        </div>
      </div>
       @if ($post->user->id === Auth::user()->id)
          <!-- 更新用 -->
      <div class="EditTrash">
        <a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="/images/edit.png" alt="編集"></a>
          <!-- 削除用 -->
        <a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="/images/trash-h.png" alt="削除1"><img src="/images/trash.png" alt="削除2"></a>
      </div>
      @endif
    </div>
   @endforeach
      <!-- モーダルの中身 -->
      <div class="modal js-modal">
        <div class="modal_bg js-modal-close"></div>
        <div class="modal_content">
          <form action="/post/update" method="post">
            @if($errors->has('upPost'))
			       @foreach($errors->get('upPost') as $message)
				      {{ $message }}<br>
			       @endforeach
		        @endif
            <textarea name="upPost" class="modal_post" cols="50" rows="5"></textarea>
            <input type="hidden" name="id" class="modal_id" value="">
            <button type="submit"><img src="/images/edit.png" alt="編集"></button>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
 </div>


@endsection
