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
            'breed'=> 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $pet = new Pet([
            // 'user_id' => Auth::user()->id,
            // 'user_id' => auth()->user()->id
            'user_id' => '1',
            'type' => $request->get('type'),
            'breed'=> $request->get('breed'),
            'name'=> $request->get('name'),
            'description'=> $request->get('description')
        ]);

        $pet->save();

        return redirect('/home')->with('success', 'Pet has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(pet $pet)
    {
        return view('projects.show', compact('project'));
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
        return view('projects.edit', compact('project'));
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
        Project::update(request(['title', 'description']));
        //dd(request()->all());
        // $project = Project::findOrFail($id);
        //  $project->title = request('title');
        //  $project->description = request('description');
        //  $project->save();
        return redirect('/projects');
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
        $project->delete();
        return redirect('/projects');
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
