<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KYCVerification;
use App\Notifications\KYCStatusNotification;

class AdminKYCController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'status' => 'nullable|in:pending,approved'
        ]);
        $status = $validated['status'] ?? null;
        $verifications = KYCVerification::when($status, function ($query, $status) {
                $query->where('status', $status);
            })->with('user')
            ->latest()
            ->paginate(10);

        return view('admin.kyc.index', compact('verifications'));
    }

    public function show(KYCVerification $kyc)
    {
        return view('admin.kyc.show', compact('kyc'));
    }

    public function approve(KYCVerification $kyc)
    {
        $kyc->update(['status' => 'approved']);

        $kyc->user->notify(new KYCStatusNotification('approved'));

        return redirect()->route('admin.kyc.index')
            ->with('success', 'KYC approved successfully');
    }

    public function reject(Request $request, KYCVerification $kyc)
    {
        $request->validate(['reason' => 'required|string|max:255']);

        $kyc->update([
            'status' => 'rejected',
            'rejection_reason' => $request->reason
        ]);

        $kyc->user->notify(new KYCStatusNotification('rejected', $request->reason));

        return redirect()->route('admin.kyc.index')
            ->with('success', 'KYC rejected successfully');
    }
}
