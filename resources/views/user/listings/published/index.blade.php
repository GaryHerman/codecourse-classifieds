@extends('layouts.app')

@section('content')
    <h5>Your Published Listings</h5>
    <hr>
    @if ($listings->count())
        @foreach ($listings as $listing)
            @include('listings.partials._listing_own', compact('listing'))
        @endforeach
        {{-- TODO: Pagination --}}
    @else
        <p>No Published Listings found.</p>
    @endif

    {{ $listings->links('pagination::bootstrap-4') }}
@endsection
