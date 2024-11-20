<?php

namespace App\Http\Controllers;

use App\Models\Previsualisation;
use App\Models\Project;
use Illuminate\Http\Request;

class PrevisualisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $previsualisations = Previsualisation::all();
        return view('previsualisations.index', compact('previsualisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('previsualisations.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projectId' => 'required|exists:projects,projectId',
            'contenu' => 'required|string',
        ]);

        Previsualisation::create($request->all());

        return redirect()->route('previsualisations.index')->with('success', 'Prévisualisation créée avec succès');
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
    public function edit(Previsualisation $previsualisation)
    {
        $projects = Project::all();
        return view('previsualisations.edit', compact('previsualisation', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Previsualisation $previsualisation)
    {
        $request->validate([
            'projectId' => 'required|exists:projects,projectId',
            'contenu' => 'required|string',
        ]);

        $previsualisation->update($request->all());

        return redirect()->route('previsualisations.index')->with('success', 'Prévisualisation mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Previsualisation $previsualisation)
    {
        $previsualisation->delete();

        return redirect()->route('previsualisations.index')->with('success', 'Prévisualisation supprimée');
    }
}
