<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'email', 'max:255', 'unique:'.User::class],
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'referral_code' => ['nullable', 'string', 'exists:users,referral_code'],
        ]);

        // Check for referral code in URL if not in form
        $referralCode = $request->referral_code ?? $request->ref;

        $referredBy = null;
        if ($referralCode) {
            $referredBy = User::where('referral_code', $referralCode)->first();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'referral_code' => $this->generateUniqueReferralCode($request->name),
            'referred_by' => $referredBy ? $referredBy->id : null,
        ]);

        event(new Registered($user));

        // Send welcome email to new user
        $user->notify(new \App\Notifications\WelcomeNotification());

        // Send referral notification if applicable (without bonus)
        if ($referredBy) {
            $referredBy->notify(new \App\Notifications\ReferralSignupNotification($referredBy, $user));
        }
        $user->sendEmailVerificationNotification();

         Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    protected function generateUniqueReferralCode($name = null): string
    {
        // If no name provided, fall back to random code
        if (empty($name)) {
            return $this->generateRandomReferralCode();
        }

        // Clean the name and create base code
        $baseCode = $this->generateNameBasedCode($name);
        $code = $baseCode;
        $counter = 1;

        // Ensure code is unique
        while (User::where('referral_code', $code)->exists()) {
            $code = $baseCode . '-' . $counter;
            $counter++;
        }

        return strtolower($code); // or strtoupper() if you prefer
    }

    protected function generateNameBasedCode($name): string
    {
        // Remove special characters and spaces
        $cleanName = preg_replace('/[^a-zA-Z0-9]/', '', $name);

        // Convert to lowercase and limit to 10 characters
        $code = substr(strtolower($cleanName), 0, 10);

        // If name is too short, pad with random characters
        if (strlen($code) < 4) {
            $code .= substr(md5(uniqid()), 0, 6 - strlen($code));
        }

        return $code;
    }

    protected function generateRandomReferralCode(): string
    {
        $code = strtoupper(substr(md5(uniqid()), 0, 8));

        while (User::where('referral_code', $code)->exists()) {
            $code = strtoupper(substr(md5(uniqid()), 0, 8));
        }

        return $code;
    }
}
