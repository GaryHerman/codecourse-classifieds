@extends('layouts.app')

@section('content')
    @include('listings.partials._search')

    <div class="row justify-content-center">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <h6>{{ $category->name }}</h6>
                <hr>

                @foreach ($category->children as $sub)
                    <h6><a href="{{ route('listings.index', [$area, $sub]) }}">{{ $sub->name }}</a> ({{ $sub->listings->count() }})</h6>
                @endforeach
            </div>

        @endforeach
    </div>
@endsection
