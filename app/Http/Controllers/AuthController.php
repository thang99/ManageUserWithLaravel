<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {   
         $this->validate($request,[
            'name' => 'required',
            'birthday' => 'nullable',
            'address' => 'nullable',
            'telephone' => 'nullable|digits:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm__password' => 'required|same:password',
            'role' => 'required'
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'birthday' => $request->input('birthday'),
            'address' => $request->input('address'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password'))

        ]);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json(['token'=>$accessToken],200);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $login = ['email' => $email ,'password' => $password];
        if(Auth::attempt($login)) {
           $user =$request->user();
           $accessToken = $user->createToken('authToken')->accessToken;
          return response()->json(['token'=>$accessToken],200);
        } else {
            return response()->json(['error' => 'Unauthorized'],401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
