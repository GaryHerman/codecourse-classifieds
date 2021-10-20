<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrainTreeController extends Controller
{
    public function token()
    {
        $braintree   = config('braintree');
        $clientToken = $braintree->clientToken()->generate();

        return response()->json([
            'data' => [
                'token' => $clientToken
            ]
        ]);
    }
}
