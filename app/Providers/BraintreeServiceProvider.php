<?php

namespace App\Providers;

use Braintree;
use Illuminate\Support\ServiceProvider;

class BraintreeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $braintreeSetup = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId'  => env('BRAINTREE_MERCHANT_ID'),
            'publicKey'   => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey'  => env('BRAINTREE_PRIVATE_KEY')
        ]);

        config(['braintree' => $braintreeSetup]);
    }
}
