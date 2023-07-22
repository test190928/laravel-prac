<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function post(Request $request){
        $post = $request->input('post');
        $id = Auth::id();
        Post::create([
            'user_id' => $id,
            'post' => $post,
        ]);

        return redirect()->route('home');
    }

    public function search(Request $request){
        $word = $request->input('post');
        $posts = Post::where('post','like',"%$word%")->orderBy('created_at','desc')->get();
        // dd($posts[0]->user);
        return view('search',compact('posts'));
    }
}
