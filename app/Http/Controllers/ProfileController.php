<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function create()
    {
        $user = auth()->user();
        $latestKyc = $user->kycVerifications()->latest()->first();

        return view('kyc.create', [
            'user' => $user,
            'latestKyc' => $latestKyc
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Prevent multiple submissions
        if ($user->hasPendingKYC()) {
            return redirect()->back()->with('error', 'You already have a pending KYC submission');
        }

        $validated = $request->validate([
            'document_type' => 'required|in:nin,driver_license,passport',
            'id_number' => 'required|string|max:50',
            'document_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'document_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dob' => 'required|date',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
        ]);

        // Store documents
        $frontPath = $request->file('document_front')->store('kyc_documents', 'public');
        $backPath = $request->hasFile('document_back')
            ? $request->file('document_back')->store('kyc_documents', 'public')
            : null;

        // Create KYC record
        $user->kycVerification()->create([
            'document_type' => $validated['document_type'],
            'id_number' => $validated['id_number'],
            'document_front' => $frontPath,
            'document_back' => $backPath,
            'status' => 'pending',
            'dob' => $validated['dob'],
            'state' => $validated['state'],
            'zip' => $validated['zip'],
        ]);

        // Update user profile data
        $user->update([
            'dob' => $validated['dob'],
            'state' => $validated['state'],
            'zip' => $validated['zip'],
        ]);

        return redirect()->route('user.kyc.create')
            ->with('success', 'KYC information submitted successfully! Our team will review it shortly.');
    }

    public function show2(): View
    {
        return view('profile.show', [
            'user' => auth()->user(),
        ]);
    }

    public function show(): View
    {
        // Eager load the walletMethod relationship to avoid N+1 queries
        $user = auth()->user()->load('wallets.walletMethod');

        return view('profile.show', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function showPasswordForm()
    {
        return view('profile.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();
        $image = $request->file('image');

        // Generate a new unique name
        $filename = Str::uuid()->toString() . '.' . $image->getClientOriginalExtension();

        // Move file to storage (public/uploads)
        $path = $image->storeAs('uploads', $filename, 'public');

        // Check if user already has an image
        if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
            Storage::disk('public')->delete($user->profile_image);
        }

        // Save new path in DB
        $user->profile_image = $path;
        $user->save();

        return back()->with('success', 'Profile photo updated successfully!');
    }



}
