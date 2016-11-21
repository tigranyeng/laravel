<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;



class LoginController extends Controller
{
    public function login(Request $request) 
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

    
            $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];

            if(!\Auth::attempt($credentials, $request->has('remember'))){
                return response()->json(['message'=>"Wrong username or password"],403);
            }
            return response()->json(['resource'=>\Auth::user()],200);
        

    }
}