<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ secure_asset('css/multiColumn.css') }}">
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
        <div class="content">
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
            
            <div class="back">
            <a href="/">戻る</a>
            </div>
            
        </div>
        

        
        <div class="localNavigation">
            <p>ローカルナビゲーション</p>
        </div>
    </main>
    <footer class="footer">
        <p>フッター</p>
    </footer>
</body>