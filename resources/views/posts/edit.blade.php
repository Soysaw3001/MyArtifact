<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="css/multiColumn.css">
</head>

<body>
    <header class="header">
       <p>OW2 Friend Finder(ヘッダー)</p>
    </header>
    <div class="glovalNavigation">
       <p>グローバルナビゲーション</p>
    </div>
    <main>
        <!--<div class="content">-->
        <div class='content'>
            <h1 class="title">編集画面</h1>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
            <input type="submit" value="保存">
            </form>
        </div>
        
        <div class="localNavigation">
            <p>ローカルナビゲーション</p>
        </div>
    </main>
    <footer class="footer">
        <p>フッター</p>
    </footer>
</body>