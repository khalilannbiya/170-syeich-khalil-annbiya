<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('components.pages.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        Alert::toast('Anda berhasil login', 'success');

        $user = Auth::user();

        // If user is admin, redirect to administrator dashboard
        if ($user->role_id == 1) {
            return redirect()->intended(route('adminisrator.dashboard', absolute: false));
        } else if ($user->role_id == 2) {
            // If user is unit admin, redirect to departement dashboard
            return redirect()->intended(route('departement.dashboard', absolute: false));
        } else {
            // If user is not admin or unit admin, redirect to index
            return redirect()->intended(route('index', absolute: false));
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

        Alert::toast('Anda berhasil logout', 'success');
        return redirect('/');
    }
}
