<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc("id");

        $posts = Post::paginate(5); // これでページネーション機能が追加される

        return view('index', ['posts' => $posts]);
    }

    public function post(PostRequest $request)
    {
        $posts = Post::all();
        // データをDBに保存できなかったときの表記「$post = Post::all();」

        $post = new Post;
        $form = $request->all();
        unset($form['_token_']);
        $post->fill($form)->save();

        return redirect('/');
    }

    public function update(Request $request)
    {
        // $this->validate($request, Post::$rules);
        $post = Post::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $post->fill($form)->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect('/');
    }
}
