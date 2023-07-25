@extends('layouts.layout')
@section('content')
        <div class="w-50 d-flex align-items-center flex-column">
            <div class="w-100">
                <h3>タイムライン</h3>
            </div>
            {{-- 検索結果 --}}
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