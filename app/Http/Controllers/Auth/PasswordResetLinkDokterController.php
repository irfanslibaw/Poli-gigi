<?php

namespace App\Http\Controllers\Auth;

use App\Models\Dokter;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkDokterController extends PasswordResetLinkController
{
    /**
     * Show the form to request a password reset link.
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.forgot-passworddokter');
    }

    /**
     * Validate the email for the given request.
     *
     * @param  Request  $request
     * @return void
     *
     * @throws ValidationException
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $dokter = Dokter::where('email', $request->email)->first();

        if (! $dokter) {
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar pada akun dokter.',
            ]);
        }
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validateEmail($request);

        $status = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', trans($status))
                    : back()->withErrors(['email' => trans($status)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return mixed
     */
    protected function broker()
    {
        return app(PasswordBrokerManager::class)->broker('dokters');
    }
}