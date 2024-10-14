<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Advertise;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showPaymentForm($ads_id)
    {
        $ads = Advertise::find($ads_id);
        if (!$ads) {
            return redirect()->back()->with('error', 'Not Select Correct Advertise');
        }
        return view('user-escort.payment-from', compact('ads'));
    }

    public function paymentFormSubmit(Request $request, $ads_id)
    {
        $advertisement = Advertise::find($ads_id);
        if (!$advertisement) {
            return redirect()->back()->with('error', 'Not Select Correct Advertise');
        }

        // Set Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;
        // Charge the user

        try {
            $charge = Charge::create([
                'amount' => $advertisement->price * 100, // Convert to cents
                'currency' => 'chf',
                'description' => 'Payment for ' . $advertisement->name . ' plan',
                'source' => $token,
            ]);

            // Store payment details in the database
            PaymentDetail::create([
                'escort_id' => auth()->id(),
                'ads_id' => $ads_id,
                'payment_id' => $charge->id,
                'payment_method' => $charge->payment_method,
                'amount' => $charge->amount / 100, // amount in dollars
                'currency' => $charge->currency,
                'status' => $charge->status,
            ]);
       
            // You can redirect to a success page
            return redirect()->route('escorts.dashboard', Auth::guard('escort')->user()->id)->with('success', 'Payment Successfully Done!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error processing payment: ' . $e->getMessage());
        }
    }
}
