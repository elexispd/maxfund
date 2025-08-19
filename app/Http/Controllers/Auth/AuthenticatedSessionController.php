<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // First attempt authentication
        $request->authenticate();

        // Get the authenticated user
        $user = Auth::user();

        // if (! $user->hasVerifiedEmail()) {
        //     Auth::logout();
        //     $request->session()->invalidate();
        //     $request->session()->regenerateToken();

        //     return redirect()->route('verification.notice')
        //         ->withErrors(['email' => 'You must verify your email before logging in.']);
        // }

        // Check if user is inactive
        if ($user->status === 'inactive') {
            // Log the user out immediately
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Return with error message
            return back()->withErrors([
                'email' => 'Your account has been deactivated. Please contact support at support@maxfund.net',
            ]);
        }



        // Proceed with normal login for active users
        $request->session()->regenerate();



        if ($user->role == "admin") {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->intended(route('dashboard'));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
