@extends('layouts.layout')
@section('content')
        <div class="w-50 d-flex align-items-center flex-column">
            <div class="w-100">
                <h3>投稿編集</h3>
            </div>
            <form action="{{ route('postEdit') }}" method="POST" class="w-100">
                <div class="d-flex justify-content-end flex-column">
                    @csrf
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <textarea name="post" class="w-100 postForm p-1">{{ $post->post }}</textarea>
                    <input type="submit" value="更新" class="btn btn-primary w-100">
                </div>
            </form>
        </div>
@endsection