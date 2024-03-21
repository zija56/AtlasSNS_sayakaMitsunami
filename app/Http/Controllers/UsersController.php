<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\POst;


class UsersController extends Controller
{
    // 自分のプロフィールへ
    public function myProfile(){

        return view('users.myprofile');
    }

    // 自分のプロフィールを編集する
    public function updateForm(Request $request){

        $request->validate([
            'upUsername' => 'required|min:2|max:12',
            'upMail' => 'required|min:5|max:40|email',
            Rule::unique('users')->ignore($this->user),
            'upPassword' => 'required|min:8|max:20|alpha-num|confirmed',
            'upPassword_conformation' => 'required|min:8|max:20|alpha-num',
            'upBio' => 'max:150',
            'upIcon' => 'image',
        ]);

        $id = $request->input('id');
        $up_username = $request->input('upUsername');
        $up_mail = $request->input('upMail');
        $up_password = $request->input('upPassword');
        $up_bio = $request->input('upBio');
        $up_icon = $request->input('upIcon');

        User::where('id',$id)->update([
            'upUsername' => $up_username,
            'upMail' => $up_mail,
            'upPassword' => $up_password,
            'upBio' => $up_bio,
            'upIcon' => $up_icon
        ]);

        return redirect('/top');
    }

    // 各ユーザーのプロフィール画面へ
    public function profile($id){
        // 入力されたidからユーザー情報を取得
        $users = User::where('id',$id)->get();
        // 入力されたidからそのユーザーの投稿情報を取得
        $posts = Post::where('user_id',$id)->get();
        return view('users.profile',compact('posts','users'));
    }

    // ユーザー名で検索
    public function search(Request $request)
    {
        $user_id = Auth::user()->id;
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $users = User::where('username','like','%'.$keyword.'%')->get()->except([Auth::id()]);
        }else{
            $users = User::all();
        }
        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }
}
