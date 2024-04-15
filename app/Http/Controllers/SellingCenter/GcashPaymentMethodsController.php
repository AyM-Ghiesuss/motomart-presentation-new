<?php

namespace App\Http\Controllers\SellingCenter;

use App\Models\GcashConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GcashPaymentMethodsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $config_gcash = GcashConfig::where('user_id', $user->id)->first();

        return view('sellercenter.GcashPaymentMethod.index', compact('config_gcash'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $config_gcash = GcashConfig::where('user_id', $user->id)->first();

        if($config_gcash)
        {
            // Update existing data
            $config_gcash->update([
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
            GcashConfig::create([
                'user_id' => $user->id,
                'account' => $request->account,
                'client_id' => $request->client_id,
                'secret' => $request->secret,
                'sandbox' => $request->environment,
            ]);
        }
        return redirect()->back()->with('message', 'Settings Saved');
    }
}


