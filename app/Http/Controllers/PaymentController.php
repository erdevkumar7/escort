<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Advertise;

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
        // Get payment token from the form (sent from Stripe JS)
        $token = $request->stripeToken;
        // Charge the user
    
        try {
            $charge = Charge::create([
                'amount' => $advertisement->price * 100, // Convert to cents
                'currency' => 'usd',
                'description' => 'Payment for ' . $advertisement->name . ' plan',
                'source' => $token,
            ]);

            // After successful payment, you can save the ad data or activate it for the escort
            // You can redirect to a success page
            return redirect()->route('escorts.getAllAdvrtise')->with('success', 'Payment Successfully Done!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error processing payment: ' . $e->getMessage());
        }
    }
}
