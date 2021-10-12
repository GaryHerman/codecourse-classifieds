@component('listings.partials._base_listing', compact('listing'))

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

@endcomponent
