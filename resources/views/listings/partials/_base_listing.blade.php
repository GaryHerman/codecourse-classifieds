<div class="media">
    <div class="media-body">
        <h6>
            <strong><a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a></strong>
            @if ($area->children->count())
                in {{ $listing->area->name }}
            @endif
        </h6>

        <ul class="list-inline">
            <li><time>{{ $listing->created_at->diffForHumans() }}</time></li>
            <li>{{ $listing->user->name }}</li>
        </ul>
    </div>
</div>

@yield('links')
