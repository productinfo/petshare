<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'screen_name', 'role', 'gender',
        'age', 'street', 'city', 'state', 'zip_code', 'email', 'password','latitude','longitude',
        'image', 'provider', 'provider_id'
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
     * Get the user that owns the pet.
     */
    public function pet()
    {
        return $this->hasOne('App\Pet');
    }

}
