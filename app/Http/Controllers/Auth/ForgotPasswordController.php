<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function lupapassword() {
        return view('Auth.forgot_password');
    }

    public function validateCaptcha(Request $request)
    {
        $inputCaptcha = $request->input('captcha_code');
        $sessionCaptcha = session('captcha_code');

        if (strtolower($inputCaptcha) === strtolower($sessionCaptcha)) {
            return response()->json(['success' => true, 'message' => 'Captcha confirmation successfully!']);
        } else {
            return response()->json(['error' => false, 'message' => 'Captcha confirmation failed!']);
        }
    }
}
