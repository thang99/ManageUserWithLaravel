<?php

namespace App\Http\Controllers;

use App\Models\SocialIdentity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    // public function redirectToProvider($provider) 
    // {
    //     return Socialite::driver($provider)->redirect();
    // }

    // public function handleProviderCallback($provider)
    // {
    //         try{
    //             $user = Socialite::driver($provider)->user();
    //         } catch(\Exception $e) {
    //             return redirect()->route('login');
    //         }
    
    //         $exitingUser = User::where('email',$user->getEmail())->first();
    
    //         if($exitingUser) {
    //             Auth::login($exitingUser,true);
    //         } else {
    //             $newUser = new User;
                
    //             $newUser->name = $user->getName();
    //             $newUser->email = $user->getEmail();
    //             $newUser->password = Hash::make('12345678');
    //             $newUser->role =1;
    //             $newUser->provider_id =$user->getId();
    //             $newUser->provider = $provider;
                
    //             $newUser->save();
    //             Auth::login($newUser,true);  
    //         }
            
    //         return redirect()->route('login')->with('status','Add Account Successful');  
    //     }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();
        } catch(Exception $e) {
            return redirect()->route('login');
        }

        $authUser = $this->findOrCreateUser($user,$provider);
        Auth::login($authUser,true);
        return redirect()->route('login')->with('status','Add Account Successful');  
    }

    public function findOrCreateUser($providerUser,$provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
                    ->whereProviderId($providerUser->getId())
                    ->first();
        
        if($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if(!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName()
                ]);
            }

            $user->identities()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider
            ]);

            return $user;
        }
    }
}
