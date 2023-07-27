<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ホーム画面</title>
    <!-- リセットcss -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container d-flex w-100 justify-content-center mainBackground">
        <div class="d-flex mainWrapper justify-content-center py-3">
            <!--左サイド-->
            <div class="sideMenu w-25 d-flex flex-column align-items-center">
                <a href="{{ route('home') }}" class="btn btn-primary w-75 mb-2">トップ</a>
                <a href="profile/{{ Auth::id() }}" class="btn btn-primary w-75 mb-2">プロフィール</a>
                <a href="{{ route('about') }}" class="btn btn-primary w-75 mb-2">会社概要</a>
                <a href="{{ route('apiTest') }}" class="btn btn-primary w-75 mb-2">API読込</a>
                <form action="{{ route('logout') }}" method="POST" class="w-75 mb-2">
                    @csrf
                    <button class="btn btn-danger w-100">ログアウト</button>
                </form>
            </div>
            <!--メイン-->
            @yield('content')
            <!--右サイド-->
            <div class="sideMenu w-25">
                <form action="{{ route('search') }}" method="POST" class="px-3">
                    @csrf
                    <input type="text" name="post" placeholder="投稿検索" class="w-100 searchForm p-1">
                    {{-- <input type="submit"> --}}
                </form>
                <div class="mt-4 border rounded p-2">
                    <h4>プロフィール</h4>
                    <div>名前</div>
                    <div>{{ Auth::user()->name }}</div>
                    <div>メールアドレス</div>
                    <div>{{ Auth::user()->email }}</div>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="btn btn-primary" href="profile/{{ Auth::id() }}">詳細</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>