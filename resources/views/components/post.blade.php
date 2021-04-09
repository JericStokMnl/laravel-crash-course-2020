@props(['post' => $post])
<div class="d-block py-3" role="alert">
    <span><strong>
        <a href="{{ route('users.posts', $post->user) }}">{{$post->user->name}}</a>
    </strong></span>
    {{$post->body}}
    <span class="text-muted">{{$post->user->created_at->diffForHumans()}}</span>
    <div class="d-flex">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('post.likes', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-link">Like</button>
                </form>
            @endif

            <form action="{{ route('post.likes', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-link">Unlike</button>
            </form>
        @endauth

        <form action="{{ route('post.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-link">Delete</button>
        </form>

        @if ($post->likes->count())
            <button class="btn btn-sm btn-link disabled text-primary">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</button>
        @endif
    </div>
</div>
