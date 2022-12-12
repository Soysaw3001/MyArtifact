@extends('layouts.common')
 
@section('title', '新規記事作成')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '新規記事作成ページの説明文です')
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
        
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        
        <div class="category">
        <h2>Category</h2>
            @foreach($categories as $category)
                <label>
                {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                <input type="checkbox" value="{{ $category->id }}" name="categories_array[]">
                    {{$category->name}}
                </input>
                </label>
            @endforeach   
        </div>
        
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </div>
        
        <input type="file" name="image">
        <input type="submit" value="store"/>
        </form>
        
        <div class="back">
            <a href="/">戻る</a>
        </div>
    </div>
@endsection
@include('layouts.LocalNavigation')
@include('layouts.footer')