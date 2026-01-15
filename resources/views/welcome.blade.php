@extends('partials.layout')
@section('content')
    {{ $posts->links() }}
    <div class="grid grid-cols-4 gap-2">
        @foreach($posts as $post)
            @include('partials.post-card')
        @endforeach
    </div>
    @php
        throw new Exception('debug')
    @endphp

@endsection
