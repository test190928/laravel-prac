@extends('layouts.layout')
@section('content')
        <div class="w-50 d-flex align-items-center flex-column">
            <h3>検索結果</h3>
            <ul>
                @foreach($posts as $post)
                <li>名前:{{ $post->user->name }}</li>
                <li>{{ $post->post }}</li>
                @endforeach
            </ul>
        </div>
@endsection