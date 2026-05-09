<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class VerifyEmailController extends Controller
{
    public function show()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string|size:6',
        ]);

        $verification = DB::table('otp_verifications')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$verification) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->email_verified_at = Carbon::now();
            $user->save();
        }

        DB::table('otp_verifications')->where('email', $request->email)->delete();

        return redirect()->route('dashboard')->with('success', 'Email verified successfully!');
    }

    public function resend(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        // Generate new OTP logic here
        $otp = rand(100000, 999999);
        
        DB::table('otp_verifications')->updateOrInsert(
            ['email' => $request->email],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        // Send email logic here (Mail::to($request->email)->send(new OtpMail($otp)))
        Mail::to($request->email)->send(new OtpMail($otp));
        
        return back()->with('success', 'A new OTP has been sent to your email.');
    }
}
