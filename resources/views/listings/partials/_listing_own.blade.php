<div class="media">
    <div class="media-body">
        <h5>
            <strong>
                @if ($listing->live())
                    <a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a>
                @else
                    {{ $listing->title }}
                @endif

                in {{ $listing->area->name }}
            </strong>
        </h5>
        <ul class="list-inline" style="margin-bottom: 0px;">
            @if ($listing->live())
                <li class="list-inline-item">Published: <time>{{ $listing->published_at->diffForHumans() }}</time></li>
                <li class="list-inline-item text-muted">Created: <time>{{ $listing->created_at->diffForHumans() }}</time></li>
                <li class="list-inline-item text-muted">Updated: <time>{{ $listing->updated_at->diffForHumans() }}</time></li>
            @else
                <li class="list-inline-item">Created: <time>{{ $listing->created_at->diffForHumans() }}</time></li>
                <li class="list-inline-item">Updated: <time>{{ $listing->updated_at->diffForHumans() }}</time></li>
            @endif

        </ul>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#" onclick="event.preventDefault(); getElementById('listings-delete-form-{{ $listing->id }}').submit();">Remove</a></li>
            <li class="list-inline-item"><a href="{{ route('listings.edit', [$area, $listing]) }}">Edit</a></li>
        </ul>
    </div>
</div>

{!! Form::open(['method' => 'DELETE', 'route' => ['listings.destroy', [$area, $listing]],
    'class' => 'hidden', 'id' => 'listings-delete-form-'.$listing->id]) !!}
{!! Form::close() !!}

{{-- @component('listings.partials._base_listing', compact('listing'))

    @slot('links')
        <ul class="list-inline">
            <li class="list-inline-item">Added {{ $listing->pivot->created_at->diffForHumans() }} </li>
            <li class="list-inline-item">
                <a href="#" onclick="event.preventDefault(); getElementById('listings-favorite-delete-form-{{ $listing->id }}').submit();">Delete</a>

                {!! Form::open(['method' => 'DELETE', 'route' => ['listings.favorites.destroy', [$area, $listing]],
                                'class' => 'hidden', 'id' => 'listings-favorite-delete-form-'.$listing->id]) !!}
                {!! Form::close() !!}
            </li>
        </ul>
    @endslot

@endcomponent --}}
