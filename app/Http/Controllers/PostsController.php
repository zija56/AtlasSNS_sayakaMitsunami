<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    // 投稿用に下記のメソッドを追加
    public function postsCreate(Request $request)
    {
        $request->validate([
            'post' => 'required|unique:posts,post|min:1|max:150',
        ]);

        $post = $request->input('post');
        Post::create(['post' => $post]);
        return back();
    }

    public function followList(){
        return view('follows.followList');
    }

    public function followerList(){
        return view('follows.followerList');
    }

}
