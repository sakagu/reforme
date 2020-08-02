<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePost;
use App\Http\Requests\EditPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // $post = Post::find($id);
        // $idid = $post->user_id;
        // $user = Auth::find($idid);

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
        
        // $path = $request->file('image')->store('public/storage');
        // $post->image = basename($path);

        $originalImg = $request->image;
        if($originalImg->isValid()) {
        $filePath = $originalImg->store('public');
        $post->image = str_replace('public/', '', $filePath);
        }


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

    public function showedit(int $id)
    {
        $post = Post::find($id);

        return view('posts/edit', [
            'post' => $post,
        ]);
    }

    public function edit(int $id, EditPost $request)
    {

        $post = Post::find($id);
        $post->title = $request->title;
        $post->text = $request->text;
        if(isset($request->image)){
            $post->image = $request->image;
        }
        $post->save();

        return redirect()->route('posts');
    
    }

    public function delete(int $id, Request $request)
    {
        Post::find($id)->delete();

        return redirect()->route('posts');
    }
    
}