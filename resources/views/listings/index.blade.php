@extends('layouts.app')

@section('content')
    @include('listings.partials._search')

    <h5>{{ $category->parent->name }} > {{ $category->name }}</h5>
    <hr>
    @if ($listings->count())
        @foreach ($listings as $listing)
            @include('listings.partials._listing', compact('listing'))
        @endforeach

        {{-- TODO: Pagination --}}
    @else
        <p>No Listings Found.</p>
    @endif

    {{ $listings->links('pagination::bootstrap-4') }}
    {{-- <div class="row justify-content-center">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <h6>{{ $category->name }}</h6>
                <hr>

                @foreach ($category->children as $sub)
                    <h6><a href="{{ route('listings.index', [$area, $sub]) }}">{{ $sub->name }}</a> (x)</h6>
                @endforeach
            </div>

        @endforeach
    </div> --}}
@endsection
