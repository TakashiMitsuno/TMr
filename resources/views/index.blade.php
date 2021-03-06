<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style type="text/css">
        .createbutton{
        height:25px;
        width:60px;
        }
        .Welcome{
        heigtt:60px;
        width:300px;
        background-color:pink;
        </style>
    </head>
@extends('layouts.app')

@section('content')    
    <body>
<h4 class="Welcome">{{Auth::user()->name}}様Blogへようこそ!</h4>       
        <h1>Blog</h1>
        <button type="button" class="createbutton"  onclick="location.href='/posts/create'">create</button>     
 <p><button type="button" onclick="location.href='/users'">{{Auth::user()->name}}様の投稿ブログの確認</button></p>
       
         <br>
         <br>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{$post->id}}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>

                </div>
        <p><a href="/users/{{$post->user->id}}">{{ $post->user->name }}</a>様により<u>{{ $post->created_at }}</u>に作成されました</p>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        

    
    <div>
        <a href='/teratail'>teratail質問一覧へ</a>
    </div>
    </body>
</html>
@endsection  