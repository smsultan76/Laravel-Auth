<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller{
    public function UserLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string',Password::min(8)
            ->letters()
            // ->numbers()
            // ->symbols()->mixedCase()
            // ->uncompromised(),
        ],]);
        if(Auth::attempt($credentials,$request->remember)){
            
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->withErrors(['email'=>'The provide credentials do not match our record.'])->onlyInput('email');



        // $user = User::where('email', $request->email)->first();
        // if($user){
        //     if(Hash::check($request->password , $user->password)){
        //         $request->session()->regenerate();
        //         return redirect()->route('home');
        //     }else{
        //         return back()->with('fail','Password Error.');
        //     }
        // }else{
        //     return back()->with('fail','Email No Match Found');
        // }

    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully!');
    }
    

 



    public function UserRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed',Password::min(8)
            ->letters()
            // ->numbers()
            // ->symbols()->mixedCase()
            // ->uncompromised(),
        ],]);
        // Check if validation fails
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request ->email,
            'password' => Hash::make($request->password),
        ]);

        $user->sendEmailVerificationNotification();
        auth()->login($user);
        return redirect()->route('home')->with('success', 'Registration successful! Please verify your email.');
    }




    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/home')->with('success', 'Email verified successfully!');
    }
}
