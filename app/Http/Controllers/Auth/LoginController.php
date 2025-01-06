<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Mail\LoginNotifaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function loginis(LoginRequest $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['xat' => 'Xatolik'], 401);
        }

        $user = Auth::user();
       
        $token = $user->createToken('Vel Token')->plainTextToken;

        if($user->role == 'admin'){
            return response()->json([
                'xat' => 'Salom admin',
                'token' => $token,
            ]);
        }elseif($user->role == 'user'){
            return response()->json([
                'xat' => 'Salom zavuch',
                'token' => $token,
            ]);
        }
     
    }
}
