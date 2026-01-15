@extends('partials.layout')
@section('content')
    @include('partials.post-card', ['full' => true])
    <h1 class="text-3xl">Comments: </h1>
    @foreach ($post->comments as $comment)
        <div class="card bg-base-200 mt-2 shadow-sm">
            <div class="card-body">
                {{ $comment->body }}
                <p class="text-base-content/70">{{ $comment->user->name }}</p>
            </div>
        </div>
    @endforeach
@endsection