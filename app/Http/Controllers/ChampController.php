<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChampRequest;
use App\Models\Champ;
use Illuminate\Http\Request;

class ChampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $champs = Champ::all();
        return view('champs.index', compact('champs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('champs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChampRequest $request)
    {
        Champ::create($request->validated());
        return redirect()->route('champs.index')->with('success', 'Champ créé avec succès');
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
    public function edit(Champ $champ)
    {
        return view('champs.edit', compact('champ'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChampRequest $request, Champ $champ)
    {
        $champ->update($request->validated());
        return redirect()->route('champs.index')->with('success', 'Champ mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Champ $champ)
    {
        $champ->delete();
        return redirect()->route('champs.index')->with('success', 'Champ supprimé');
    }
}
