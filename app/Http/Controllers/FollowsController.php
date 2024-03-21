<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{

    // フォロー機能
    // フォロー解除
    public function cancel($userId)
    {
        // フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォローしていれば下記のフォロー解除を実行する
        if ($is_following) {

            $loggedInUserId = auth()->user()->id;
            Follow::where([
                ['followed_id', '=', $userId],
                ['following_id', '=', $loggedInUserId],
            ])
                ->delete();
        }
        return back()->withInput();
    }

    public function follow($userId)
    {
        // フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォローしていなかったら下記のフォロー処理を実行
        if (!$is_following) {
            // 自分のユーザーIDを取得
            $loggedInUserId = auth()->user()->id;
            // フォローしたい人のユーザーIDを元にユーザーを取得
            $followedUser = User::find($userId);
            $followedUserId = $followedUser->id;
            // フォローデータをデータベースに登録
            Follow::create([
                'following_id' => $loggedInUserId,
                'followed_id' => $followedUserId,
            ]);
            return back()->withInput(); // フォロー後に元のページにリダイレクト
        }
    }

    public function followList(){
        // 自分がフォローしているユーザーのidを取得
        $following_id = Auth::user()->follows()->pluck('followed_id');
        // 自分がフォローしているユーザーのidをもとに投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id',$following_id)->get();
        // usersテーブルから自分がフォローしているユーザーの情報を取得
        $users = User::whereIn('id',$following_id)->get();

        return view('follows.followList',compact('posts','users'));
    }

    public function followerList(){
        // 自分をフォローしているユーザーのidを取得
        $followed_id = Auth::user()->followers()->pluck('following_id');
        // 自分をフォローしているユーザーのidをもとに投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id',$followed_id)->get();
        // usersテーブルから自分をフォローしているユーザーの情報を取得
        $users = User::whereIn('id',$followed_id)->get();

        return view('follows.followerList',compact('posts','users'));
    }
}
