<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function loginpage(){
        return view('login');
    }

   
    

    public function homepage(){
        return view('login');
    }
    
    public function loginStore(Request $request )
    {
     $credentials = $request->validate([
            'email'=>"required|email",
            'password'=>"required",
        ]);
        if(Auth::attempt($credentials) && Auth::user()->role_id === 1){
            $request->session()->regenerate();
            return redirect ('/')->with('status',"");
            // return redirect()->intended('dashbaord');
        }elseif(Auth::attempt($credentials) && Auth::user()->role_id === 2){
            $request->session()->regenerate();
            return redirect ('/');
            // return redirect()->intended('manager');
        }elseif(Auth::attempt($credentials) && Auth::user()->role_id === 3){
            $request->session()->regenerate();
            return('client');
        }
        
        return back()->withErrors([
            'email' => 'invalide email',
            'password' => 'invalide password' 
        ]);
    }
}
