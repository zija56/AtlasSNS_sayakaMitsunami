<?php

namespace App\Http\Middleware;

use Closure;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ログインユーザーIDを取得
        $loginId = Auth::id();
        //
         $requestId = $request->user_id;

         //ログイン者と各ページの作成者が一致しないとログインページにリダイレクト
         if ($loginId != $requestId) {
            return redirect(route('/login'));
         }

      //チェックに合格し次の処理に進むことができる
      return $next($request);
    }
}
