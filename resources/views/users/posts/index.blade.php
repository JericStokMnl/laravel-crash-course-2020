@extends('layouts.app')
@section('content')
<div class="rounded shadow d-block p-4">
    <div class="d-block">
        <h1 class="text-success">{{ $user->name }}</h1>
        <b>Posted: {{$posts->count()}} {{ Str::plural('post', $posts->count()) }} and received: {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count() ) }} </b>
    </div>
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
