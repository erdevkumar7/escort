<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Advertise;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Exception\CardException;

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
        // Find the advertisement by ID
        $advertisement = Advertise::find($ads_id);
        if (!$advertisement) {
            return redirect()->back()->with('error', 'Advertisement not found.');
        }

        // Set Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;

        try {
            // Charge the user via Stripe
            $charge = Charge::create([
                'amount' => $advertisement->price * 100, // Convert to cents
                'currency' => 'chf',
                'description' => 'Payment for ' . $advertisement->name . ' plan',
                'source' => $token,
            ]);

            // Store payment details in the database
            $paymentDetail = PaymentDetail::create([
                'escort_id' => Auth::guard('escort')->user()->id,
                'ads_id' => $advertisement->id,
                'time_duration' => $advertisement->time_duration,
                'payment_id' => $charge->id,
                'payment_method' => $charge->payment_method,
                'amount' => $charge->amount / 100,
                'currency' => $charge->currency,
                'status' => $charge->status,
            ]);

            // Calculate the end date based on time duration and created_at
            $paymentEndDate = $paymentDetail->created_at->addDays($advertisement->time_duration);

            // Update the escort's activation status and set the active_until date
            $escort = Auth::guard('escort')->user();
            if ($escort->active_until > $paymentEndDate) {
                $paymentEndDate = $escort->active_until;
            }

            $escort->status = true;
            $escort->active_until = $paymentEndDate;
            $escort->save();

            return redirect()->route('escorts.dashboard', Auth::guard('escort')->user()->id)->with('success', 'Payment successfully completed!');
        } catch (CardException $e) {
            return redirect()->back()->withErrors('Card error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error processing payment: ' . $e->getMessage());
        }
    }
}
