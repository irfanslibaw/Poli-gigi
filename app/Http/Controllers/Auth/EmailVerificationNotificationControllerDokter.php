<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationControllerDokter extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $dokter = Dokter::where('email', $request->input('email'))->first();

        if (! $dokter) {
            return response()->json(['message' => 'User with email not found.'], 404);
        }

        if ($dokter->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 200);
        }

        $dokter->sendEmailVerificationNotification();

        return response()->json(['message' => 'Email verification link sent.'], 200);
    }
}
