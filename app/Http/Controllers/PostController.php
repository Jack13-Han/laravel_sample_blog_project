<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request){
        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    public function show($id){
        $post=Post::find($id);

        if(!$post){
            return redirect()->route('post.index');
        }
        return view('show', compact('post'));

    }

    public function destroy($id){

        $post=Post::find($id);
        if($post){
            $post->delete();
        }
        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }

    public function edit($id){
        $post=Post::find($id);
        if(!$post){
            return redirect()->route('post.index');
        }
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id){
        $post=Post::find($id);
        if(!$post){
            return redirect()->route('post.index');
        }
        $post->title=$request->title;
        $post->description=$request->description;
        $post->created_at=now();
        $post->updated_at=now();
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }
}
