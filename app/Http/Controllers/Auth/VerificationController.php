<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller{
    protected $redirectTo= '/home';
    public function show() {
        return view('auth.verify-email');
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/home')->with('success','Email Verification Successfull');
    }

    public function resend(Request $request){
        if($request->user()->hasVerifiedEmail()){
            return redirect($this->redirectTo);
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('resent','Verification link sent!');
    }
}
