<?php

namespace App;

use \App\User;

use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','type', 'breed', 'name', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_id'];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * duplicate of user() method but 'owner' is the semantic relationship
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
