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
        'user_id', 'type', 'breed', 'name', 'description', 'latitude', 'longitude',
        'photo'
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

    /**
     * search for matches using Haverline Forumula with lat and long to determine closest
     * @param $latitude
     * @param $longitude
     * @param $distance,
     * @param $type
     * @return Pet $pets
     */
    public static function searchWithDistance($latitude, $longitude, $distance, $type){

        $pets = Pet::select('*')
            ->selectRaw('( 3959 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance', [$latitude, $longitude, $latitude])
            ->havingRaw("distance < ?", [$distance])
            ->where('type', $type)
            ->orderBy('distance','asc')
            ->take(20)
            ->get();

        return $pets;
    }

}
