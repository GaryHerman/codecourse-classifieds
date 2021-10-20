@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Listing') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => ['listings.store', [$area]], 'method' => 'POST']) !!}
                        @include('listings.partials.forms._areas')
                        @include('listings.partials.forms._categories')
                        <div class="form-group @error('title') is-invalid @enderror">
                            {!! Form::label('title') !!}
                            {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control '. ($errors->has('title') ? 'is-invalid' : '')]) !!}
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('body') is-invalid @enderror">
                            {!! Form::label('body') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control '. ($errors->has('body') ? 'is-invalid' : ''), 'rows' => 4]) !!}
                            @error('body')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save', ['class' => 'float-right btn btn-primary', 'id' => 'publish-btn', 'name' => 'submit-btn']) !!}
                            {{-- <span class="form-text text-muted"><i>Help Text Here</i></span> --}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
