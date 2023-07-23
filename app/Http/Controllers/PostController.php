<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * 投稿処理
     * @param Request $request
     * @return void
     */
    public function post(Request $request){
        $post = $request->input('post');
        $id = Auth::id();
        Post::create([
            'user_id' => $id,
            'post' => $post,
        ]);

        return redirect()->route('home');
    }

    /**
     * 検索処理
     * @param Request $request
     * @return void
     */
    public function search(Request $request){
        $word = $request->input('post');
        $posts = Post::where('post','like',"%$word%")->orderBy('created_at','desc')->get();
        // $allPosts = Post::get();
        // dd($allPosts);
        return view('search',compact('posts'));
    }

    /**
     * 編集画面表示
     * @param [type] $id
     * @return void
     */
    public function showEdit($id){
        $post = Post::find($id);
        return view('post_edit',compact('post'));
    }

    /**
     * 投稿編集処理
     * @param Request $request
     * @return void
     */
    public function postEdit(Request $request){
        // dd(POST::find($request->input('post_id')));
        POST::find($request->input('post_id'))->update([
            'post'=>$request->input('post')
        ]);

        return redirect()->route('home');
    }

    public function postDelete($id){
        Post::find($id)->delete();
        return redirect()->route('home');
    }
}
