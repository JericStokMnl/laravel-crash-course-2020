@extends('layouts.app')
@section('content')
    <div class="rounded shadow d-block p-4">
        @auth
            <form class="needs-validation mb-5" novalidate method="POST" action={{ route('post.store') }}>
                @csrf
                <div class="form-group mb-3">
                    <textarea type="text" name="body" rows="5" id="body" placeholder="Write a post" class="form-control form-control-lg{{ $errors->has('body') ? ' is-invalid' : (old('body') ? ' is-valid' : '') }}">{{ old('body') }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endauth

        @forelse ($posts as $post)
            <div class="d-block py-3{{ $loop->last ? ' mb-3' : ''}}" role="alert">
                <span><strong>{{$post->user->name}}</strong></span>
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

        @empty
            <div class="alert alert-warning" role="alert">
                No posts
            </div>
        @endforelse

        @if (count($posts))
            {!! $posts->links() !!}
        @endif
    </div>
@endsection
