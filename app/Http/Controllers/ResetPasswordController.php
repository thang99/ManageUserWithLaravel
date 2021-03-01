<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPwdRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function getReset()
    {
        return view('users.resetpassword');
    }

    public function postReset(ResetPwdRequest $request)
    {
        $email = $request->input('email');
        $password =Hash::make($request->input('password'));

        DB::update('UPDATE users SET password=? WHERE email=?', [$password, $email]);
        
        return redirect()->route('login')->with('status', 'Change password successful');
    }
}