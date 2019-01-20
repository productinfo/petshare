<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'screen_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // get latitude and longitude of address with Guzzle http package and Google Maps geocode API
        $client = new Client(); // GuzzleHttp\Client
        $baseURL = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
        $addressURL = urlencode(request('street')) . ',' . urlencode(request('city')) . ',' . urlencode(request('state')) . '&key=' . env('GOOGLE_MAPS_API_KEY');
        $url = $baseURL . $addressURL;
        $request = $client->request('GET', $url);
        // echo $response->getStatusCode(); // 200
        $response = $request->getBody()->getContents();
        $response = json_decode($response);
        $latitude = $response->results[0]->geometry->location->lat;
        $longitude = $response->results[0]->geometry->location->lng;
        $data["latitude"] = $latitude;
        $data["longitude"] = $longitude;

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'screen_name' => $data['screen_name'],
            'role' => $data['role'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'street' => $data['street'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip_code' => $data['zip_code'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
