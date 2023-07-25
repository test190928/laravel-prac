@extends('layouts.layout')
@section('content')
<div class="mt-5 w-50 d-flex justify-content-center">
    @if(session('login_success'))
        <div class="alert alert-success">
            {{ session('login_success') }}
        </div>
    @endif
    <form action="{{ route('post') }}" method="POST">
        @csrf
        <input type="text" name="post" placeholder="投稿">
        <input type="submit">
    </form>
    {{-- 全投稿 --}}
    <ul>
        @foreach($posts as $post)
        <li class="mt-3">
            名前:{{ $post->user->name }}
            @if(Auth::id() == $post->user_id)
            <a href="{{ $post->id }}/edit" class="btn btn-primary">編集</a>
            <a href="{{ $post->id }}/delete" class="btn btn-danger">削除</a>
            @endif
        </li>
        <li>投稿:{{ $post->post }}</li>
        @endforeach
    </ul>
</div>
@endsection