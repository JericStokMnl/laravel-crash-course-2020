<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{

	public function __construct()
	{
		return $this->middleware(['auth']);
	}

	public function store(Post $post)
	{
		$user = auth()->user();
		$post->likes()->create([
			'user_id' => request()->user()->id,
		]);

		Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));

		return back();
	}

	public function destroy(Post $post)
	{
		request()->user()->likes()->where('post_id', $post->id)->delete();

		return back();
	}
}
