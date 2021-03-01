<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function getLogin() 
    {
        return view('users.login');   
    }

    public function postLogin(LoginRequest $request)
    { 
        $email =$request->input('email');
        $password = $request->input('password');

        $loginAd = [
            'email' => $email,
            'password' => $password,
            'role' => 0
        ];
        $loginMb = [
            'email' => $email,
            'password' => $password,
            'role' => 1
        ];
           
        if(Auth::attempt($loginAd)) {
            return redirect()->route('list')->with('status','Login Successful');             
        } 
        else if(Auth::attempt($loginMb)) {
            $id = Auth::user()->id;
            return redirect('users/info/'.$id);

        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không đúng');
        }

    }
}
