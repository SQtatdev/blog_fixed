@php
    $full = $full ?? false;
@endphp

<div class="card bg-base-200 shadow-sm">
    {{-- <figure>
                    <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
                </figure> --}}
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        @if($full)
            <p>{!! $post->displayBody !!}</p>
        @else
            <p>{{ $post->snippet }}</p>
        @endif
        <div class="text-base-content/70">{{ $post->user->name }}</div>
        <div class="text-base-content/70"><b>Comments: </b>{{ $post->comments_count }}</div>
        <div class="card-actions justify-end">
            @unless($full)
                <a href="{{ route('post', $post) }}" class="btn btn-primary">Read more</a>
            @endunless
        </div>
    </div>
</div>