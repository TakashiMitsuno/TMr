<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
@extends('layouts.app')

@section('content')    
    <body>
        <h4>{{Auth::user()->name}}様</h4>  
        <h1>Blog</h1>
        [<a class='create' href='/posts/create'>create</a>]
        
        <br>
        <br>
        <h2>teratail質問一覧</h2>
    <div>
        @foreach($questions as $question)
            <div>
              <a href="https://teratail.com/questions/{{ $question['id'] }}">
                {{ $question['title'] }}
              </a>
             </div>
        @endforeach
        </div>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection  