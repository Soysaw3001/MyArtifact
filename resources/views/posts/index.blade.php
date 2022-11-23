<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="css/multiColumn.css">
</head>

<body>
    <header class="header">
       <p>ヘッダー</p>
    </header>
    <div class="glovalNavigation">
       <p>グローバルナビゲーション</p>
    </div>
    <main>
        <!--<div class="content">-->
        <div class='content'>
            <h1>Blog Name</h1>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            <a href='/posts/create'>create</a>
        </div>
        
        <div class="localNavigation">
            <p>ローカルナビゲーション</p>
        </div>
    </main>
    <footer class="footer">
        <p>フッター</p>
    </footer>
</body>