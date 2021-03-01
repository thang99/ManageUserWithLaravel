<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Http\Requests\StoreUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(StoreUsers $request)
    {
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
      
        DB::insert('INSERT INTO users (name,birthday,address,telephone,email,password,role) 
                        VALUES (?,?,?,?,?,?,?)',[$name,$birthday,$address,$telephone,$email,$password,1]);
        return redirect('register')->with('status', 'Register Successful');
    
    }
}
