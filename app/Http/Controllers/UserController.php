<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {

        $request->validate([
            'first_name'=>'required|max:100',
            'last_name'=> 'required|max:100',
            'screen_name' => 'required|max:100',
            'role' => 'in:owner,non-owner',
            'gender'=> 'in:male,female',
            'age'=> 'required|integer|max:100',
            'street' => 'required|max:255',
            'city' => 'required|max:100',
            'state'=> 'required|max:15',
            'zip_code' => 'required|max:15',
            'email' => 'required|max:100'
        ]);

        $user = User::findOrFail($user->id);
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->screen_name = request('screen_name');
        $user->role = request('role');
        $user->gender = request('gender');
        $user->age = request('age');
        $user->street = request('street');
        $user->city = request('city');
        $user->state = request('state');
        $user->zip_code = request('zip_code');
        $user->email = request('email');
        $user->update();

        return redirect('/users/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect('/thanks');
    }
}
