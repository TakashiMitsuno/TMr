<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
    @csrf
    @method('DELETE')
    <input type="submit" style="display:none">
    [<span onclick="deletebutton4()" class="buttonfordeleting">削除</span>]
        </form>   
                <div class='post'>
                    <h2 class='title'>{{ $post->title }}</h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
                <p><a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
        <p><a href="/users/{{$post->user->id}}">{{ $post->user->name }}</a>様により<u>{{ $post->created_at }}</u>に作成されました</p>
        <br>
        <br>
                <div class='back'>[<a href='/'>back</a>]</div>
    <script>
        function deletebutton4(){
            var question=confirm('本当に削除しますか？')
            if(question==true){
                alert("deleted");
                document.getElementById("form_delete").submit();
            }
            else{
                alert("Be Careful!")
            }
        }
    </script>
    </body>
</html>
@endsection  