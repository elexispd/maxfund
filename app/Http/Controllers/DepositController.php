<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\WalletMethod;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\AdminWallet;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Auth::user()
            ->deposits()
            ->with(['walletMethod']) // Eager load wallet and its method
            ->whereNotNull('screenshot_path') // Only deposits with screenshot
            ->latest()
            ->get();

        return view('deposits.index', compact('deposits'));
    }

    public function create(){
        $walletMethods = WalletMethod::all();
        return view('deposits.create', compact('walletMethods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'currency' => 'required|exists:wallet_methods,code',
            'amount' => 'required|numeric|min:50',
        ]);

        // Get the selected wallet method
        $walletMethod = WalletMethod::where('code', $validated['currency'])->first();


        // Create deposit record
        $deposit = Deposit::create([
            'user_id' => Auth::id(),
            'wallet_method_id' => $walletMethod->id,
            'amount' => $validated['amount'],
            'status' => 'pending',
        ]);

        // Get admin wallet for this method
        $adminWallet = AdminWallet::where('wallet_method_id', $walletMethod->id)->first();

        return redirect()->route('user.deposit.instructions', [
            'deposit' => $deposit->id,
            'admin_wallet' => $adminWallet->id
        ]);
    }

    // Show payment instructions
    public function showInstructions(Deposit $deposit, AdminWallet $adminWallet)
    {
        // Generate QR code with payment details
        $qrContent = "crypto:{$adminWallet->address}?amount={$deposit->amount}";
        $qrCode = QrCode::size(200)->generate($qrContent);

        return view('deposits.instruction', [
            'deposit' => $deposit,
            'adminWallet' => $adminWallet,
            'qrCode' => $qrCode
        ]);
    }

    // Handle screenshot upload
    public function uploadProof(Request $request, Deposit $deposit)
    {
        $request->validate([
            'screenshot' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Store screenshot
        $path = $request->file('screenshot')->store('deposit-proofs', 'public');

        // Update deposit
        $deposit->update([
            'screenshot_path' => $path,
            'status' => 'pending', // or 'pending_verification' if you add it to enum
        ]);

        return redirect()->route('user.deposit.create')
               ->with('success', 'Payment proof uploaded successfully. We will verify your deposit shortly.');
    }

}
