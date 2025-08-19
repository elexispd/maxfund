<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\Withdrawal;
use App\Models\WalletMethod;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\AdminWallet;
use App\Notifications\DepositReceivedNotification;
use App\Notifications\WithdrawalStatusNotification;

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




    public function createForUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.deposits.create', compact('user'));
    }

    public function storeForUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'currency' => 'required|exists:wallet_methods,code',
            'amount' => 'required|numeric|min:50',
        ]);

        $walletMethod = WalletMethod::where('code', $validated['currency'])->firstOrFail();

        $deposit = Deposit::create([
            'user_id' => $user->id,
            'wallet_method_id' => $walletMethod->id,
            'amount' => $validated['amount'],
            'status' => 'pending',
        ]);

        $deposit->user->notify(new DepositReceivedNotification($deposit));
        return redirect()->back()->with('success', 'Deposit created successfully.');
    }


    public function createWithdrawal($id)
{
    $user = User::findOrFail($id);
    return view('admin.withdrawals.create', compact('user'));
}
public function storeWithdrawal(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'amount' => 'required|numeric|min:1',
    ]);

    // Check if user has enough balance
    if ($user->balance < $validated['amount']) {
        return redirect()->back()->with('error', 'Insufficient balance for withdrawal.');
    }

    // Subtract amount
    $user->balance -= $validated['amount'];
    $user->save();

    $wallet = $user->wallets()->first(); // Get user's first wallet

    if (!$wallet) {
        return redirect()->back()->with('error', 'User has no wallet associated.');
    }

    $withdrawal = Withdrawal::create([
        'user_id' => $user->id,
        'wallet_id' => $wallet->id,
        'amount' => $validated['amount'],
        'status' => 1, // Completed
    ]);

    $withdrawal->user->notify(new WithdrawalStatusNotification($withdrawal, 'processing'));
        // 🧠 Always return something at the end!
    return redirect()->back()->with('success', 'Withdrawal processed successfully.');
}

}
