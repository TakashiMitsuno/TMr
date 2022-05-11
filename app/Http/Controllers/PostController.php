<?php

namespace App\Http\Controllers;

use App\Post;

use App\Http\Requests\PostRequest; 
use App\Category;// useする

class PostController extends Controller
{
    public function index(Post $post)
    {

        return view('index')->with([
            'posts' => $post->getPaginateByLimit(),
        ]);
}
    

    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }

    public function creat(Category $category)
    {
        return view('create')->with(['categories' => $category->get()]);;
    }

    public function store(Post $post, PostRequest $request) // 引数をRequest->PostRequestにする
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
{
    return view('edit')->with(['post' => $post]);
}
public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    $input_post += ['user_id' => $request->user()->id];
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
}
public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}

    public function teratail(Post $question)
    {
      // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        // index bladeに取得したデータを渡す

        return view('teratail')->with([
            'questions' => $questions['questions'],
        ]);
    }



}
?>
