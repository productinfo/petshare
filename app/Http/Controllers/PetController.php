<?php

namespace App\Http\Controllers;

use App\pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::all();

        return view('pets.index', compact('pets'));
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
            'type'=>'required',
            'breed'=> '',
            'name' => 'required',
            'description' => 'required',
        ]);

        $pet = new Pet([
            // 'user_id' => auth()->user()->id
            // 'user_id' => '1',
            'user_id' => (auth()->user()->id ?: 1),
            'type'=> $request->get('type'),
            'breed'=> $request->get('breed'),
            'name'=> $request->get('name'),
            'description'=> $request->get('description')
        ]);

        $pet->save();

        return redirect('/pets')->with('success', 'Pet has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(pet $pet)
    {
        // dd($pet);
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
        // $project = Project::findOrFail($id);
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
            'type'=>'required',
            'breed'=> '',
            'name' => 'required',
            'description' => 'required',
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
        return redirect('/pets');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function search()
    {
        return view('pets.search');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function searchResults()
    {
        return view('pets.searchResults');
    }
}
