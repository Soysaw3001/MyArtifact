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
            <h1>Blog Name</h1>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    
                    <h5 class = 'categories'>
                        @foreach($post->categories as $category)   
                            {{ $category->name }}
                        @endforeach
                    </h5>
                    
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
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
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
</body>