@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <div class="row">
                        @foreach ($areas as $country)
                            <div class="col-md-12">
                                <h4><a href="{{ route('user.area.store', $country) }}"><strong>{{ $country->name }}</strong></a></h4>
                                <hr>
                                <div class="row">
                                    @foreach ($country->children as $state)
                                        <div class="col-md-4">
                                            <h5 style="margin-top: 15px;">
                                                <a href="{{ route('user.area.store', $state) }}"><strong>{{ $state->name }}</strong></a>
                                            </h5>
                                            <hr>
                                            @foreach ($state->children as $area)
                                                <h6><a href="{{ route('user.area.store', $area) }}">{{ $area->name }}</a></h6>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
