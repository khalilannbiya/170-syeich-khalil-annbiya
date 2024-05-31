<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('components.pages.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'nik' => ['string', 'max:16', 'min:16', 'regex:/^[0-9]+$/']
        ]);

        $user = User::create([
            'role_id' => 3,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'nik' => $request->nik
        ]);

        event(new Registered($user));

        Auth::login($user);

        Alert::toast('Anda berhasil mendaftar & login', 'success');
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
}
