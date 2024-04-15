<?php

namespace App\Http\Controllers\SellingCenter;

use Dotenv\Dotenv;
use App\Models\PayPalConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentMethodsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $config_paypal = PayPalConfig::where('user_id', $user->id)->first();

        return view('sellercenter.paymentmethods.index', compact('config_paypal'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $config_paypal = PayPalConfig::where('user_id', $user->id)->first();

        if($config_paypal)
        {
            // Update existing data
            $config_paypal->update([
                'user_id' => $user->id, // Ensure user_id is set
                'account' => $request->account,
                'client_id' => $request->client_id,
                'secret' => $request->secret,
                'sandbox' => $request->environment == '1',
            ]);
            return redirect()->back()->with('message', 'Settings Saved');
        }
        else
        {
            // Create new data with user_id
            PayPalConfig::create([
                'user_id' => $user->id,
                'account' => $request->account,
                'client_id' => $request->client_id,
                'secret' => $request->secret,
                'sandbox' => $request->environment,
            ]);
          //  return redirect()->back()->with('message', 'Settings Saved');
        }
        // Set environment variables
        // Set environment variables
        putenv("PAYPAL_CLIENT_ID={$request->client_id}");
        putenv("PAYPAL_SECRET={$request->secret}");

        return redirect()->back()->with('message', 'Settings Saved');
    }

}
