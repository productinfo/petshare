<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'screen_name', 'role', 'gender',
        'age', 'street', 'city', 'state', 'zip_code', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName()
    {
        return $this->first_name. " ".$this->last_name;
    }

    /**
     * Get the user that owns the phone.
     */
    public function pet()
    {
        return $this->hasOne('App\Pet');
    }
}
