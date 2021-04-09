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
            <x-post :post="$post" />
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
