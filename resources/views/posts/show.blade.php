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
        
        <!--<div class="addcomment"><a href="/posts/{{ $post->id }}/createcomment">・新しいコメントを作成</a></div>-->
        
        <form class="comments" method="POST" action="{{ route('Store', $post->id) }}">
            @csrf
 
            <input
                name="post_id"
                type="hidden"
                value="{{ $post->id }}"
            >
            
            <input
                name="user_id"
                type="hidden"
                value="{{ $post->user->id }}"
            >
 
            <div class="form-group">
                <label for="body">
                 本文
                </label>
     
                <textarea
                    id="comment"
                    name="comment"
                    class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                    rows="4"
                >{{ old('comment') }}</textarea>
                @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    {{ $errors->first('comment') }}
                </div>
                @endif
            </div>
 
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                コメントする
                </button>
            </div>
        </form>
 
        @if (session('commentstatus'))
            <div class="alert alert-success mt-4 mb-4">
                {{ session('commentstatus') }}
            </div>
        @endif
        
        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>
 
            @forelse($post->comments as $comment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $comment->id }} /
                        {{ $comment->created_at->format('Y.m.d H:i') }} / 
                        from {{ $comment->user->name }}さん 
                    </time>
                    <p class="mt-2">
                        {!! nl2br(e($comment->comment)) !!}
                    </p>
                </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
        </section>
                
        <div class="back"><a href="/">戻る</a></div>
    </div>
@endsection
@include('layouts.LocalNavigation')
@include('layouts.footer')