<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Personalisation;
use App\Models\Project;
use Illuminate\Http\Request;

class PersonalisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalisations = Personalisation::with('project', 'component')->get();
        return view('personalisations.index', compact('personalisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $components = Composant::all();
        return view('personalisations.create', compact('projects', 'components'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projectId' => 'required|exists:projects,projectId',
            'componentId' => 'required|exists:composants,componentId',
            'champ' => 'required|string',
            'valeur' => 'required|string',
        ]);

        Personalisation::create($request->all());

        return redirect()->route('personalisations.index')->with('success', 'Personnalisation ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personalisation $personalisation)
    {
        $projects = Project::all();
        $components = Composant::all();
        return view('personalisations.edit', compact('personalisation', 'projects', 'components'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personalisation $personalisation)
    {
        $request->validate([
            'projectId' => 'required|exists:projects,projectId',
            'componentId' => 'required|exists:composants,componentId',
            'champ' => 'required|string',
            'valeur' => 'required|string',
        ]);

        $personalisation->update($request->all());

        return redirect()->route('personalisations.index')->with('success', 'Personnalisation mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personalisation $personalisation)
    {
        $personalisation->delete();

        return redirect()->route('personalisations.index')->with('success', 'Personnalisation supprimée');
    }
}
