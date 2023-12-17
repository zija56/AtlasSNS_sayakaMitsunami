<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Post;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);
    }
    // 投稿用に下記のメソッドを追加
    public function postsCreate(Request $request)
    {
        $user_id = Auth::user()->id; // ログインのユーザー情報を取得

        $request->validate([
            'post' => 'required|unique:posts,post|min:1|max:150',
        ]);

        $post = $request->input('post');
        Post::create([
            'user_id' => $user_id,
            'post' => $post
        ]);
        return redirect('/top');
    }

   // public function updateForm($id)
   // {
      //  $posts = Post::get();
      //  $post = Post::where('id',$id)->first();
      //  return view('posts.index',['posts'=>$posts,'post'=>$post]);
   // }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        Post::where('id',$id)->update([
            'post' => $up_post
        ]);

        return redirect('/top');
    }

    public function delete($id)
    {
        Post::where('id',$id)->delete();
        return redirect('/top');

    }

    public function followList(){
        return view('follows.followList');
    }

    public function followerList(){
        return view('follows.followerList');
    }

}
