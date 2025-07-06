<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Route;


class IndexController extends Controller
{
    public function index(){
        return view('index');
    }
    public function home(){
        if(Route::has('home')){
            return view('home');
        } else {
            return redirect()->route('index');
        }
    }

    public function LoginForm(){
        return view('auth.login');
    }
    public function Regform(){
        return view('auth.register');
    }
}
