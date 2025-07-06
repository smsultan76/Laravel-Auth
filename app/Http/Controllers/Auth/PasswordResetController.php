<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function create(){
        return view('auth.forgot-password');
    }

    public function store(Request $request){
        $request->validate(
            ['email'=>'required|email']
        );
        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT 
            ? back()->with('status',__($status))
            : back()->withInput($request->only('email'))
                    ->withErrors(['email'=> __($status)]);
        
    }


    public function newcreate(Request $request){
        return view('auth.reset-password',[
            'token' => $request->token,
            'email' => $request->email
        ]);
    }

    public function newstore(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
                   ->withErrors(['email' => __($status)]);
    }
}
