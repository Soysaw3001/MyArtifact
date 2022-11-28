@extends('layouts.common')
 
@section('title', '記事編集')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '記事編集ページの説明文です')
@section('pageCss')
<link href="{{secure_asset('css/multiColumn.css')}}" rel="stylesheet">
@endsection

@include('layouts.header')
@include('layouts.GlobalNavigation')

@section('content')
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
@endsection
 
@include('layouts.LocalNavigation')
@include('layouts.footer')