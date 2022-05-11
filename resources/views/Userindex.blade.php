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
        width:70px;
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
        <p><button type="button"  onclick="location.href='/posts/create'" class="createbutton">create</button></p>            
<div class="own_posts">
        @foreach($own_posts as $post)
            <div>
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
               <p>{{ $post->body }}</p> 
                <p><a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>                 
     <p><a href="/users">{{ $post->user->name }}</a>様により<u>{{ $post->created_at }}</u>に作成されました</p>
            </div>
        @endforeach
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
        
        <div class='back'>[<a href='/'>back</a>]</div>
    </div>

    </body>
</html>
@endsection  