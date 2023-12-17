<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
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
