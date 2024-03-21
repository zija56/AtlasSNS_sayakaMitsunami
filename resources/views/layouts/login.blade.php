
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="/images/atlas.png" class="logo"></a></h1> <!--なぜログイン画面に飛ぶのか？解決済-->
            <div id="menu">
                <div class="nav">
                   @if (Auth::check())
                    <p>{{ Auth::user()->username }} さん</p>
                   @endif
                </div>
                <div class="nav">
                    <div class="accordion-menu"></div>
                    <div class="accordion-inner">
                       <ul>
                         <li><a href="/top">ホーム</a></li>
                         <li><a href="/myprofile">プロフィール編集</a></li>
                         <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div>
                </div>
                <div class="nav">
                    <a href="/profile"><img src="{{ asset('storage/images/'.Auth::user()->images) }}" class="header-icon"></a> <!-- アイコンの指定（解決！）-->
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }} さんの</p>
                <div class="list">
                 <p>フォロー数</p>
                 <p>{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <p class="btn-side"><a href="/follow-list">フォローリスト</a></p>
                <div class="list">
                 <p>フォロワー数</p>
                 <p>{{ Auth::user()->followers()->get()->count() }}名</p>
                </div>
                <p class="btn-side"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn-search"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>
