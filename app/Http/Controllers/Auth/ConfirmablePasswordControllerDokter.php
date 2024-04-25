<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ConfirmablePasswordControllerDokter extends Controller
{
    /**
     * Show the password confirmation screen.
     */
    public function show(): View
    {
        return view('auth.confirm-passworddokter');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (!Auth::guard('dokter')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors(['password' => __('The provided password does not match your current password.')]);
        }

        $request->session()->put('dokter.password_confirmed_at', time());

        return redirect()->intended();
    }
}