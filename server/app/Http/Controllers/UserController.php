<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $this->authorize('viewAny', $user); // Policyをチェック
        $users = \App\Models\User::get(); // 社員一覧を取得
        return view('users.index', compact('users')); // users.index.bladeを呼び出し、usersを渡す
    }
}

// php artisan make:controller UserController --invokable
// invokableオプションを指定して invokable コントローラを作成します。invokableコントローラは呼び出される関数が一つのみのコントローラです。
// 少ない処理の画面であれば invokable で十分でしょう。
// またweb.phpでコントローラ内の関数を指定しないで済みます。
