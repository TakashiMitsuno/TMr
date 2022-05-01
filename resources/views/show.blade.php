<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
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
                    <p class='updated_at'>{{$post->updated_at}}</p>
                </div>
                <div class='back'>[<a href='/'>back</a>]</div>
                <a href="">{{ $post->category->name }}</a>
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