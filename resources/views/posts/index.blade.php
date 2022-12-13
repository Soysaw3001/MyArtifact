@extends('layouts.common')
 
@section('title', 'インデックスページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link rel="stylesheet" href="css/multiColumn.css">
@endsection

@include('layouts.header')
@include('layouts.GlobalNavigation')

@section('content')
    <div class='content'>
        
        @foreach ($posts as $post)
            <div class='post'>
                <h2 class='post-title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
            
                <h5 class = 'categories'>
                    @foreach($post->categories as $category)   
                        {{ $category->name }}
                    @endforeach
                </h5>
                <small>{{ $post->user->name }}</small>

                <p class='body'>{{ $post->body }}</p>
                
                <img src= {{$post->image_path}}>
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
        <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
    </div>
@endsection
 
@include('layouts.LocalNavigation')
@include('layouts.footer')