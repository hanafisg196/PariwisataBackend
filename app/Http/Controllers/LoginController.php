<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('dashboard');
            } else {
                return view('dashboard.login')->with('error',"Wrong password or email");
            }
        }
        return view('dashboard.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $this->validate($request,[
            
            "email" => "required|email",
            "password"=>"required"
        ]);

        if(auth()->attempt($credentials))
        {
           
           if(auth()->user()->is_admin == 1)
           {
            return redirect()->route('dashboard');
           } else {
         
            return redirect('/')->with('error',"Wrong password or email");
        }
        }
        
         return redirect('/')->with('error',"Wrong password or email");
    }

    public function doLogout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
