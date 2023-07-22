<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ホーム画面</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="mt-5">
            @if(session('login_success'))
                <div class="alert alert-success">
                    {{ session('login_success') }}
                </div>
            @endif
            <h3>プロフィール</h3>
            <ul>
                <li>名前:{{ Auth::user()->name }}</li>
                <li>メールアドレス:{{ Auth::user()->email }}</li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger">ログアウト</button>
            </form>
            {{ $user }}
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <input type="text" name="username" placeholder="検索">
                <input type="submit">
            </form>
            <form action="{{ route('post') }}" method="POST">
                @csrf
                <input type="text" name="post" placeholder="投稿">
                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>