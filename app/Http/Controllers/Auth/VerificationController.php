<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VerificationController extends Controller
{
    public function verifikasi()
    {
        return view('auth.verify');
    }

    public function verifikasiEmail(Request $request)
{
    $email = $request->input('email');

    $user = User::where('email', $email)->first();

    if ($user) {
        $token = sha1(time());
        $user->remember_token = $token;
        $user->save();
        return redirect()->route('reset.password.form', ['token' => $token]);
    } else {
        return Redirect::back()->withErrors(['error' => 'Email tidak terdaftar.']);
    }
}
}