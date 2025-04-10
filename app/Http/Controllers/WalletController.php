<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WalletMethod; // Import the WalletMethod model

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Auth::user()->wallets;
        return view('wallets.index', compact('wallets'));
    }

    public function create()
    {
        // Fetch available wallet methods
        $walletMethods = WalletMethod::all();
        return view('wallets.create', compact('walletMethods'));
    }

    public function store(Request $request)
    {
        // Validate and create a new wallet
        $request->validate([
            'currency' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Auth::user()->wallets()->create($request->all());

        return redirect()->route('user.wallet.create')->with('success', 'Wallet created successfully.');
    }

    public function destroy($id)
    {
        $wallet = Auth::user()->wallets()->findOrFail($id);
        $wallet->delete();

        return redirect()->route('user.wallet.index')
            ->with('success', 'Wallet deleted successfully.');
    }
}
