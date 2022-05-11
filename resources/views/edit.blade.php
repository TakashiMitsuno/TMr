<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <style type="text/css">
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
<br>
<br>
       <h2 class="title">編集画面</h1>
       <br>
       <br>
    <div class="content">
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
    </body>
</html>
@endsection
