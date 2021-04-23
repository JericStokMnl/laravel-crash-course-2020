<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->simplePaginate(10);
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

    public function show(Post $post)
    {
		$user = $post->user;
        return view('posts.show', compact('post', 'user'));
    }


    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
