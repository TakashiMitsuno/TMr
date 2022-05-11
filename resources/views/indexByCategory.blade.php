<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
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
         <br>
         <br>
         <div>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{$post->id}}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                </div>
                   <p><a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>様により<u>{{ $post->created_at }}</u>に作成されました</p>
            @endforeach
        </div>
        <div class="back">[<a href="/">back</a>]</div>
        
                <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection  
