<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    /**
     * プロフィール表示
     */
    public function showProfile($id){
        $user = User::find($id);
        $posts = Post::with('user')->where('user_id',$id)->orderBy('created_at','desc')->get();
        return view('profile',compact('user','posts'));
    }
}
