<li>
    <details>
        <summary>{{ $category->name }}</summary>
        <ul class="p-2 z-1">
            @foreach ($category->children as $child)
                @if($child->children->count())
                    @include('partials.submenu', ['category' => $child])
                @else
                    <li><a href="{{route('category', $child)}}">{{$child->name}}</a></li>
                @endif
            @endforeach
        </ul>
    </details>
</li>