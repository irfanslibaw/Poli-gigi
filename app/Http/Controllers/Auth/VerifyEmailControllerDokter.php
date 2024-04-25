<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class VerifyEmailControllerDokter extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $dokter = Dokter::find($request->route('id'));

        if (! $dokter) {
            return redirect()->route('dokter.login')->withErrors([
                'email' => 'User not found',
            ]);
        }

        if (! URL::hasValidSignature($request)) {
            return redirect()->route('dokter.login')->withErrors([
                'email' => 'Invalid verification link',
            ]);
        }

        if ($dokter->hasVerifiedEmail()) {
            return redirect()->intended(route('dokter.dashboarddokter'))->withErrors([
                'email' => 'Email already verified',
            ]);
        }

        if ($dokter->markEmailAsVerified()) {
            event(new Verified($dokter));
        }

        return redirect()->intended(route('dokter.dashboarddokter'))->with('status', 'Email verified');
    }
}
