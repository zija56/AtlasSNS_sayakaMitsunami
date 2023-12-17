@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
<div class="posts">
  {!! Form::open(['url'=>'/post/create']) !!}
  @csrf
  <div class="form-group">
    <img src="{{ asset('storage/images/'.Auth::user()->images) }}" class="icon">
    {!! Form::input('text', 'post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
  </div>
  <div class="send">
    <button type="submit"><img src="/images/post.png" alt="送信"></button>
 </div>
  {!! Form::close() !!}
</div>
<div class="timeline">
  @if (Auth::check())
   @foreach ($posts as $post)
      <table class="timeline">
        <tr>
          <td><img src="{{ asset('storage/images/'.$post->user->images) }}"></td>
          <td>{{ $post->user->username }}</td>
          <td>{{ $post->post }}</td>
          <td>{{ $post->updated_at }}</td>
          <!-- 更新用 -->
          <td><div class="content">
            <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="/images/edit.png" alt="編集"></a>
          </div></td>
          <!-- 削除用 -->
          <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="/images/trash.png" alt="削除1"><img src="/images/trash-h.png" alt="削除2"></a></td>
        </tr>
   @endforeach
      </table>
      <!-- モーダルの中身 -->
      <div class="modal js-modal">
        <div class="modal_bg js-modal-close"></div>
        <div class="modal_content">
          <form action="/post/update" method="post">
            <textarea name="upPost" class="modal_post" cols="50" rows="5"></textarea>
            <input type="hidden" name="id" class="modal_id" value="">
            <button type="submit"><img src="/images/edit.png" alt="編集"></button>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
 @endif
</div>
@endsection
