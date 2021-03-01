<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable 
{
    use Notifiable, Searchable, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider_name', 'provider_id', 'id','address','birthday','role','telephone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // search

    public function searchableAs()
    {
        return 'users_index';
    }

    public function toSearchableArray()
    {
        $array = $this->only('name', 'email');
        return $array;
    }   

    public function identities()
    {
        return $this->hasMany('App\Models\SocialIdentity');
    }
}
