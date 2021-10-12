@extends('layouts.app')

@section('content')
<div class="container">
    <h5>Your Favorited Listings</h5>
    <hr>
    @if ($listings->count())
        @foreach ($listings as $listing)
            @include('listings.partials._listing_favorite', compact('listing'))
        @endforeach
        {{-- TODO: Pagination --}}
    @else
        <p>No Favorite Listings found.</p>
    @endif

    {{ $listings->links('pagination::bootstrap-4') }}
</div>
@endsection
