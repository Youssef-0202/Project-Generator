<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class PasswordResetController extends Controller
{
    // Show the form to request a password reset link
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // Handle the form submission to send a password reset link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Send the reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the email was sent successfully
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    // Show the form to reset the password
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Handle the password reset submission
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        // Reset the password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        // Check if the reset was successful
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => __($status)]);
    }
}