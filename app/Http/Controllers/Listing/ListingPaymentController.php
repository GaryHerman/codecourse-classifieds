<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListingPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function show(Area $area, Listing $listing)
    {
        // Authorize
        $this->authorize('touch', $listing);

        // Check if Live
        if ($listing->live()) {
            return back()->withWarning('This listing is already live and paid for (or does not require payment).');
        }

        return view('listings.payment.show', compact('listing'));
    }

    public function store(Request $request, Area $area, Listing $listing)
    {
        // Authorize
        $this->authorize('touch', $listing);

        // Check if Live
        if ($listing->live()) {
            return back()->withWarning('This listing is already live and paid for (or does not require payment).');
        }

        // If listing cost is zero, which should never get here, but just in case - bounce before payment sent through
        if ($listing->cost() === 0) {
            return back()->withSuccess('This listing has no cost associated to it, so no payment was applied.');
        }

        if (($nonceFromTheClient = $request->payment_method_nonce) === null) {
            return back()->withWarning('Communication error with payment processing system, please try again later.');
        }

        // Get braintree gateway information to use for transaction
        $braintree = config('braintree');

        // Process the Transaction
        $result = $braintree->transaction()->sale([
            'amount' => $listing->cost(),
            'paymentMethodNonce' => $nonceFromTheClient,
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success === false) {
            return back()->withError($result->message);
        }

        $listing->live = true;
        $listing->published_at = Carbon::now();
        $listing->save();

        return redirect()->route('listings.show', [$area, $listing])->withSuccess('Payment successfully applied.  This listing is now live.');
    }

    // Used when listings have no cost and therefore require NO payment method
    public function update(Request $request, Area $area, Listing $listing)
    {
        // Authorize
        $this->authorize('touch', $listing);

        // Verify that this listing shouldn't have a cost associated to it, if not - redirect back
        if ($listing->cost() > 0) {
            return back()->withWarning('This listing is not free and cannot be processed without payment.');
        }

        $listing->live = true;
        $listing->published_at = Carbon::now();
        $listing->save();

        return redirect()->route('listings.show', [$area, $listing])->withSuccess('This listing is now live.');
    }
}
