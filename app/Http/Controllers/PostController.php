<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::paginate(4);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $posts=new Post();
        // $posts->title=$request->title;
        // $posts->description=$request->description;
        // $posts->save();

        // Validator::make($request->all(),[
        //     'title'=>'required',
        //     'description'=>'required'
        // ])->validate();

        $request->validate([
            'title'=>'required|unique:posts,title,min:10',
            'description'=>'required|min:20'
        ]);

        Post::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        // Post::create($request->all());



        return redirect()->route('post.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('show',[
            'post'=>Post::findOrFail($id)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('edit',[
            'post'=>Post::findOrFail($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::findOrFail($id);
        // $post->update($request->all());
        $post->title=$request->title;
        $post->description=$request->description;
        $post->update();

        return redirect()->route('post.index')->with('success','Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    // Post::destroy($id);

        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success','Post deleted successfully.');
    }
}
