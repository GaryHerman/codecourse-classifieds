@extends('layouts.app')

@section('content')
    <h5>Recenlty Viewed Listings <span class="text-muted">(showing last {{ $indexLimit }} listings)</span></h5>
    <hr>
    @if ($listings->count())
        @foreach ($listings as $listing)
            @include('listings.partials._listing', compact('listing'))
        @endforeach
        {{-- TODO: Pagination --}}
    @else
        <p>No Listings found.</p>
    @endif

    {{-- {{ $listings->links('pagination::bootstrap-4') }} --}}
@endsection
