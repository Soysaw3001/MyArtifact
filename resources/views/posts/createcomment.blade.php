@extends('layouts.common')
 
@section('title', 'コメント作成')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'コメント作成ページの説明文です')
@section('pageCss')
<link href="{{secure_asset('css/multiColumn.css')}}" rel="stylesheet">
@endsection

@include('layouts.header')
@include('layouts.GlobalNavigation')

@section('content')
    <div class="content">
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </div>

        <input type="submit" value="送信"/>
        </form>
        
        <div class="back">
            <a href="/">戻る</a>
        </div>
    </div>
@endsection
@include('layouts.LocalNavigation')
@include('layouts.footer')