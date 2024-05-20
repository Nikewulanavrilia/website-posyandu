<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function showResetPasswordForm(Request $request)
    {
        $token = $request->token;
        return view('auth.ubah_password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $token = $request->token;
        $user = User::where('remember_token', $token)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Token reset password tidak valid.']);
        }
        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil diperbarui. Silakan masuk.');
    }
}
