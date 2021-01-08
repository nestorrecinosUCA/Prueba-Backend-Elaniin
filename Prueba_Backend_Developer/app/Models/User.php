<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignamble.
     * 
     * @var array
     * */
    
    protected $fillable = [
        'name',
        'telephone',
        'username',
        'dob',
        'email',
        'password'
    ];

    /** 
    * The attributes that should be hidden for arrays
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token'
    ];

        // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
