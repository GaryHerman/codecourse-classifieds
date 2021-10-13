@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
            {{-- Listing Information --}}
            <div class="card">
                <div class="card-header">
                    <strong class="h5">{{ $listing->title }}</strong>
                    <span class="text-muted"><i>in {{ $listing->area->name }}</i></span>
                </div>
                <div class="card-body">
                    {!! nl2br(e($listing->body)) !!}
                    <hr>
                    <p>Viewed {{ $listing->views() }} times</p>
                </div>
            </div>
            {{-- User Information --}}
            <div class="card" style="margin-top: 25px;">
                <div class="card-header">
                    Contact Listing Owner {{--{{ $listing->user->name }} --}}
                </div>
                <div class="card-body">
                    @if (Auth::guest())
                        <p><a href="/register">Sign Up</a> or <a href="/login">Sign In</a> to contact listing owners.</p>
                    @else
                        {!! Form::open([ 'method' => 'POST']) !!}
                            <div class="form-group message @error('message') has-error @enderror">
                                {!! Form::label('message') !!}
                                {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 4]) !!}
                                @error('message')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Send', ['class' => 'float-right btn btn-primary', 'id' => 'publish-btn', 'name' =>
                                'submit-btn']) !!}
                                <span class="form-text text-muted"><i>This will email the listings creator and they will be able to reply to
                                        you directly via email.</i></span>
                            </div>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::check())
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <nav class="nav flex-column">
                            <li class="nav-item"><a href="">Email to a friend</a></li>
                            @if (! $listing->favoritedBy(Auth::user()))
                                <li class="nav-item">
                                    <a href="#" onclick="event.preventDefault(); getElementById('listings-favorite-form').submit();">Add to
                                        favorites</a>
                                    {!! Form::open(['method' => 'POST', 'route' => ['listings.favorites.store', [$area, $listing]],
                                                    'class' => 'hidden', 'id' => 'listings-favorite-form']) !!}
                                    {!! Form::close() !!}
                                </li>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
