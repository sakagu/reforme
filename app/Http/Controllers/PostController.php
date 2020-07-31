<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post',[
            'posts' => $posts,
        ]);
    }

    public function showCreateForm()
    {
        return view('posts/create');
    }
    public function create(CreatePost $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->image = $request->image;
        Auth::user()->posts()->save($post);

        return redirect()->route('posts');
    }

    public function show(int $id)
    {
        $post = Post::find($id);

        return view('posts/show', [
            'post' => $post,
        ]);
    }

}


