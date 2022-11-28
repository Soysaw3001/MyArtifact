@extends('layouts.common')
 
@section('title', '記事詳細ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '記事詳細ページの説明文です')
@section('pageCss')
<link href="{{secure_asset('css/multiColumn.css')}}" rel="stylesheet">
@endsection

@include('layouts.header')
@include('layouts.GlobalNavigation')

@section('content')
    <div class="content">
        <h1 class="title">
            {{ $post->title }}
        </h1>
        
        <h2 class="categories">
            @foreach($post->categories as $category)   
                {{ $category->category_name }}
            @endforeach
        </h2>
        <div class="content__post">
            <h3>本文</h3>
            <p>{{ $post->body }}</p>    
        </div>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        
        <div class="back">
        <a href="/">戻る</a>
        </div>
        
    </div>
@endsection
@include('layouts.LocalNavigation')
@include('layouts.footer')