@extends('layouts.layout')
@section('content')
        <div class="w-50 d-flex align-items-center flex-column">
            <div class="w-100">
                <h3>WebAPI読み込み</h3>
            </div>
            <div class="w-100">
                @foreach($data['data'] as $test)
                <div class="py-1 d-flex border-bottom">
                    <div class="w-25 fw-bold">{{ $test['name'] }}</div>
                    <div>{{ $test['note'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
@endsection