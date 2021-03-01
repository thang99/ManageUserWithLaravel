<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUsers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =DB::table('users')->paginate(3);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $role = $request->input('role');
        $password =Hash::make($request->input('password'));

        DB::table('users')->insert(
                [
                    'name' => $name, 'birthday' => $birthday, 'address' => $address, 'telephone' => $telephone,
                    'email' => $email, 'role' => $role, 'password' => $password, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );
        return redirect('users/index')->with('status', 'Add successful');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        return view('users.edit', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUsers $request, $id)
    {
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $role = $request->input('role');
        $password = Hash::make($request->input('password'));

        DB::update('UPDATE users SET name =?, birthday =?, address =?, telephone =?, email =?, password =?, role =?, created_at=?, updated_at=? WHERE id = ?', 
                    [$name, $birthday, $address, $telephone, $email, $password, $role, Carbon::now()->format('Y-m-d H:i:s'), Carbon::now()->format('Y-m-d H:i:s'),$id]);

        return redirect('/users/index')->with('status', 'Update successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = DB::select('SELECT * FROM users WHERE id=?',[$id]);
        foreach($users as $user) {
            if($user->role == 0) {
                return redirect('/users/index')->with('fail','Cant delete admin');
            } else {
                DB::delete('DELETE FROM users WHERE id=?',[$id]);
                return redirect('/users/index')->with('status', 'Delete successful');
            }
        }  
    }

    public function info($id) {
        $users = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        return view('users.info',['users' => $users]);
    }

    public function updateInfo(StoreUsers $request, $id) 
    {
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $password =Hash::make($request->input('password'));

        DB::update('UPDATE users SET name=?, birthday=?, address=?, telephone=?, email=?, password=? 
                    WHERE id=?', [$name,$birthday,$address,$telephone,$email,$password,$id]);
        
        return redirect()->route('login')->with('status','Update successfull');
    }

    public function logout() {
        Auth::logout();
        return view('users.login');
    }

    public function showProfile($id) {
        $users = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        return view('users.editProfileUser', ['users' => $users]);
    }

    public function updateProfile(ProfileRequest $request, $id)
    {
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $role = $request->input('role');

        DB::update('UPDATE users SET name=?, birthday=?, address=?, telephone=?, email=?, role=?, created_at=?, updated_at=?
                    WHERE id=?', [$name,$birthday,$address,$telephone,$email,$role, Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s'),$id]);

        return redirect()->route('list')->with('status','Update Profile User Successful');
    }

    public function showPassword($id) {
        $users = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        return view('users.editPasswordUser',['users' => $users]);
    }

    public function updatePassword(PasswordRequest $request, $id)
    {
        $new__password =Hash::make($request->input('new__password'));
        
        DB::update('UPDATE users SET password=? WHERE id=?', [$new__password,$id]);

        return redirect()->route('list')->with('status','Update Password User Successful');   
    }


    public function showProfileNewUser($id) 
    {
        $users = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        return view('users.editProfileNewUser', ['users' => $users]);
    }

    public function updateProfileNewUser(ProfileRequest $request, $id) 
    {
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $role = $request->input('role');

        DB::update('UPDATE users SET name=?, birthday=?, address=?, telephone=?, email=?, role=?
                    WHERE id=?', [$name,$birthday,$address,$telephone,$email,$role,$id]);
        
        return redirect()->route('login')->with('status','Change Profile User Successful');   
    }

    public function showPasswordNewUser($id) {
        $users = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        return view('users.editPasswordNewUser',['users' => $users]);
    }

    public function updatePasswordNewUser(PasswordRequest $request, $id)
    {
        $new__password =Hash::make($request->input('new__password'));
        
        DB::update('UPDATE users SET password=? WHERE id=?', [$new__password,$id]);

        return redirect()->route('login')->with('status','Change Password User Successful');   
    }

    public function searchUser(Request $request) 
    {
        $users = User::search($request->input('search'))->paginate(9);
        return view('users.index',compact('users'));
    }
}
