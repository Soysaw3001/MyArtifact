<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')｜OW2 Friend Finder</title>
    <meta name="description" itemprop="description" content="@yield('description')">
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')">
    <link rel="stylesheet" href="css/multiColumn.css">
    @yield('pageCss')
</head>

<body>
    <header id="header">
        @yield('header')
        @yield('GlobalNavigation')
    </header>
    
    <div id="container" class="wrapper">
        <main>
            <!--<div class="content">-->
            <div class='content'>
                @yield('content')
            </div>
        
        </main>
        
        <aside id="sidebar">
            @yield('LocalNavigation')
        </aside>
    </div>
    @yield('footer')
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
</body>