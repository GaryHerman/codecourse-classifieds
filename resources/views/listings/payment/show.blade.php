@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Pay for Listing') }}</div>

            <div class="card-body">
                @if ($listing->cost() == 0)
                    {!! Form::open(['route' => ['listings.payment.update', [$area, $listing]], 'method' => 'PATCH']) !!}
                        <p>Total Cost for this Listing: ${{ number_format($listing->cost(), 2) }}</p>
                        <p>Continue to publish this listing, no payment required.</p>
                        <div class="form-group">
                            {!! Form::submit('Publish', ['class' => 'float-right btn btn-primary', 'id' => 'publish-btn', 'name' =>
                            'submit-btn']) !!}
                            {{-- <span class="form-text text-muted"><i>Help Text Here</i></span> --}}
                        </div>
                    {!! Form::close() !!}
                @else
                    <p>Total Cost for this Listing: ${{ number_format($listing->cost(), 2) }}</p>

                        {{-- <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div id="dropin-container"></div>

                                </div>
                            </div>
                        </div> --}}

                        <div id="app">
                            <payment-form />
                        </div>

                        {{-- <script>
                            var button = document.querySelector('#submit-button');

                            braintree.dropin.create({
                              authorization: "{{ Braintree_ClientToken::generate() }}",
                              container: '#dropin-container'
                            }, function (createErr, instance) {
                              button.addEventListener('click', function () {
                                instance.requestPaymentMethod(function (err, payload) {
                                  $.get('{{ route('payment.process') }}', {payload}, function (response) {
                                    if (response.success) {
                                      alert('Payment successfull!');
                                    } else {
                                      alert('Payment failed');
                                    }
                                  }, 'json');
                                });
                              });
                            });
                        </script> --}}

                @endif

                {{-- {!! Form::open(['route' => ['listings.store', [$area]], 'method' => 'POST']) !!}
                @include('listings.partials.forms._areas')
                @include('listings.partials.forms._categories')
                <div class="form-group @error('title') is-invalid @enderror">
                    {!! Form::label('title') !!}
                    {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control '. ($errors->has('title') ?
                    'is-invalid' : '')]) !!}
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('body') is-invalid @enderror">
                    {!! Form::label('body') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control '. ($errors->has('body') ? 'is-invalid' :
                    ''), 'rows' => 4]) !!}
                    @error('body')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'float-right btn btn-primary', 'id' => 'publish-btn', 'name' =>
                    'submit-btn']) !!}
                    <span class="form-text text-muted"><i>Help Text Here</i></span>
                </div>
                {!! Form::close() !!}
                --}}
            </div>
        </div>
    </div>
</div>
@endsection
