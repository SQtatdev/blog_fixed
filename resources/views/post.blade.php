@extends('partials.layout')

@section('content')
    {{-- Основной пост --}}
    @include('partials.post-card', ['full' => true])

    {{-- Сообщение об успешной операции --}}
    @if (session('status'))
        <div class="alert alert-success mt-6">
            {{ session('status') }}
        </div>
    @endif

    {{-- Форма комментариев --}}
    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-3">Join the conversation</h2>

        @auth
            <form action="{{ route('comments.store', $post) }}" method="POST" class="space-y-4">
                @csrf

                <label class="form-control">
                    <span class="label-text">Comment</span>
                    <textarea
                        name="body"
                        rows="4"
                        class="textarea textarea-bordered"
                        placeholder="Share your thoughts..."
                        required>{{ old('body') }}</textarea>
                </label>

                @error('body')
                    <p class="text-error">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary">Post comment</button>
            </form>
        @else
            <p class="text-base-content/70">
                Please <a href="{{ route('login') }}" class="link">sign in</a> to share your thoughts.
            </p>
        @endauth
    </section>

    <h2 class="text-3xl mt-10">Comments</h2>

    @forelse ($post->comments as $comment)
        <div class="card bg-base-200 mt-4 shadow-sm">
            <div class="card-body space-y-2">
                <p>{{ $comment->body }}</p>
                <p class="text-sm text-base-content/70">
                    {{ $comment->user->name }} · {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    @empty
        <p class="mt-4 text-base-content/60">
            No comments yet. Be the first to start a word battle!
        </p>
    @endforelse
@endsection
