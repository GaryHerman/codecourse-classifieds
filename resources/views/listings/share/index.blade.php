@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Share Listing ')}} <em>{{ $listing->title }}</em> </div>

                <div class="card-body">
                    <p>Share this listing with up to 5 people (enter email addresses below)</p>
                    {!! Form::open(['route' => ['listings.share.store', [$area, $listing]], 'method' => 'POST']) !!}
                        @foreach (range(0, 4) as $n)
                            <div class="form-group @error('emails.' . $n) is-invalid @enderror">
                                {{-- {!! Form::label('Email Address') !!} --}}
                                {!! Form::text('emails[]', null, ['id' => 'emails' . $n, 'class' => 'form-control '. ($errors->has('emails.' . $n) ? 'is-invalid' : '')]) !!}
                                @error('emails.' . $n)
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        @endforeach

                        <div class="form-group @error('message') is-invalid @enderror">
                            {!! Form::label('message', 'Message (optional)') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control '. ($errors->has('message') ? 'is-invalid' : ''), 'rows' => 4]) !!}
                            @error('message')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Send', ['class' => 'float-right btn btn-primary', 'id' => 'publish-btn', 'name' => 'submit-btn']) !!}
                            {{-- <span class="form-text text-muted"><i>Help Text Here</i></span> --}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
