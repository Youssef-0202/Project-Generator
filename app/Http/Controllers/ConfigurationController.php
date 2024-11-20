<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configurations = Configuration::all();
        return view('configurations.index', compact('configurations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('configurations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'themeColor' => 'required|string',
            'fontStyle' => 'required|string',
            'layout' => 'required|string',
        ]);

        Configuration::create($request->all());

        return redirect()->route('configurations.index')->with('success', 'Configuration ajoutée');
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
    public function edit(Configuration $configuration)
    {
        return view('configurations.edit', compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuration $configuration)
    {
        $request->validate([
            'themeColor' => 'required|string',
            'fontStyle' => 'required|string',
            'layout' => 'required|string',
        ]);

        $configuration->update($request->all());

        return redirect()->route('configurations.index')->with('success', 'Configuration mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuration $configuration)
    {
        $configuration->delete();

        return redirect()->route('configurations.index')->with('success', 'Configuration supprimée');
    }
}
