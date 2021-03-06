<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
use App\Http\Requests\CreatePost;
use App\Http\Requests\EditPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

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
        $post->cost = $request->cost;
        $post->store = $request->store;
        
        $uploadImg = $post->image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
        $post->image = Storage::disk('s3')->url($path);
        // $originalImg = $request->image;
        // if($originalImg->isValid()) {
        // $filePath = $originalImg->store('public');
        // $post->image = str_replace('public/', '', $filePath);
        // }


        Auth::user()->posts()->save($post);

        return redirect()->route('posts');
    }

    // public function show($id) {
    //     $post = Post::find($id);
    //     $like = $post->likes()->where('user_id', Auth::user()->id)->first();
    //     return view('posts.show')->with(array('post' => $post, 'like' => $like));
    //   }

    public function showedit(int $id)
    {
        $post = Post::find($id);
        if (Auth::user()->id == $post->user_id) {
        return view('posts/edit', [
            'post' => $post,
        ]);
        }else{
            return redirect()->route('posts');
        }
    }

    public function edit(int $id, EditPost $request)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->text = $request->text;
        if(isset($request->image)){
            
            $uploadImg = $post->image = $request->file('image');
            $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
            $post->image = Storage::disk('s3')->url($path);

        }
         if (Auth::user()->id == Post::find($id)->user_id) {
                          
             $post->save();
             
             return redirect()->route('posts');
        }else{
            return redirect()->route('posts');
        }
    
    }

    public function delete(int $id, Request $request)
    {
        $post = Post::find($id);
        $image = basename($post->image);
        Post::find($id)->delete();
        Storage::disk('s3')->delete('/', $image);

        if (Auth::user()->id == $post->user_id) {
        return redirect()->route('posts');
        }else{
            return redirect()->route('posts');
        }
    }
    
    public function __construct()
    {
      $this->middleware('auth', array('except' => 'index'));
    }

    public function usermypage($id)
    {
        if (Auth::user()->id == $id) {
        $posts = Post::where('user_id',$id)->latest()->paginate(10);
        $likes = Like::where('user_id',$id)->latest()->paginate(10);
        $postlikes = array();
        foreach($likes as $like){
            $postlikes[] = Post::find($like->post_id);
            }
        return view('posts/user',[
            'posts' => $posts,
            'postlikes' => $postlikes,
        ]);
        }else{
            return redirect()->route('posts');
        }
    }


}
