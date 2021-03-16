<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store()
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        auth()->user()->posts()->create(request()->only('body'));

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
