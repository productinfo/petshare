<?php

namespace App\Http\Controllers;

use App\pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the SEARCH RESULT pets/resource
     *
     * @param  \App\pet  $pet
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>'in:dog,cat,horse,bird,rabbit,fish,reptile,other',
            'breed'=> 'max:30',
            'name' => 'required|max:100',
            'description' => 'required|max:3000',
        ]);

        $pet = new Pet([
            'user_id' => auth()->user()->id,
            'type'=> $request->get('type'),
            'breed'=> $request->get('breed'),
            'name'=> $request->get('name'),
            'description'=> $request->get('description')
        ]);

        $pet->save();

        return redirect('/pets/' . $pet->id)->with('success', 'Pet has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pet $pet)
    {
        $request->validate([
            'type'=>'in:dog,cat,horse,bird,rabbit,fish,reptile,other',
            'breed'=> 'max:30',
            'name' => 'required|max:100',
            'description' => 'required|max:3000',
        ]);

        // Pet::update(request(['type', 'breed','name', 'description']));
        $pet = Pet::findOrFail($pet->id);
        $pet->type = request('type');
        $pet->breed = request('breed');
        $pet->name = request('name');
        $pet->description = request('description');
        $pet->update();

        return redirect('/pets/' . $pet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(pet $pet)
    {
        // Project::findOrFail($id)->delete();
        $pet->delete();
        return redirect('/users/' . auth()->user()->id);
    }

    /**
     * Display search screen
     *
     */
    public function search()
    {
        return view('pets.search');
    }

    /**
     * Display a listing of the SEARCH RESULT pets/resource
     *
     * @param  \App\pet  $pet
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchResults(Request $request)
    {
        $request->validate([
            'type'=>'in:dog,cat,horse,bird,rabbit,fish,reptile,other',
            'distance'=>'in:1,5,25',
            'street'=> 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
        ]);

        $type = $request->input('type');
        $distance = $request->input('distance');
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');

        $pets = Pet::where('type', $type)->get();

        return view('pets.index', compact('pets'));
    }

}
