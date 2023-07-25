@extends('layouts.layout')
@section('content')
<div class="w-50 d-flex align-items-center flex-column">
    <div class="w-100">
        <h3>タイムライン</h3>
    </div>
    {{-- @if(session('login_success'))
        <div class="alert alert-success">
            {{ session('login_success') }}
        </div>
    @endif --}}
    {{-- 投稿フォーム --}}
    <form action="{{ route('post') }}" method="POST" class="w-100">
        <div class="d-flex justify-content-end flex-column">
            @csrf
            <textarea type="text" name="post" placeholder="投稿" class="w-100 postForm p-1"></textarea>
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
    {{-- 全投稿 --}}
    <div class="w-100 d-flex flex-column align-items-center">
        @foreach($posts as $post)
        <div class="border p-3 w-100">
            <div>
                名前:{{ $post->user->name }}
            </div>
            <div>
                <small>{{ $post->created_at }}</small>
            </div>
            <div>
                投稿:{{ $post->post }}
            </div>
            <div class="d-flex justify-content-end">
                @if(Auth::id() == $post->user_id)
                <a href="{{ $post->id }}/edit" class="btn btn-primary mx-2">編集</a>
                <a href="{{ $post->id }}/delete" class="btn btn-danger">削除</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection