<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Post;


class AuthController extends Controller
{
    /**
     * ログイン画面表示
     * @return void
     */
    public function showLogin(){
        return view('login.login_form');
    }

    /**
     * ログイン処理
     * @param LoginFormRequest $request
     * @return void
     */
    public function login(LoginFormRequest $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('home')->with('login_success','ログイン成功しました');
        }

        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています',
        ]);
    }

    /**
     * ログアウト
     * @param Request $request
     * @return void
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('showLogin')->with('logout','ログアウトしました');
    }

    /**
     * ホーム表示
     * @return void
     */
    public function home(){
        $user = User::find(1)->email;
        $posts = Post::get();
        return view('home',compact('user','posts'));
    }
}
