<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use Illuminate\Http\Request;

class ComposantController extends Controller
{

    public function showNavbar()
    {
        // Fetch the Navbar component
        $navbarData = Composant::where('name', 'Navbar')->first();
        
        // Decode the JSON content into an array
        $navbarContent = json_decode($navbarData->contenu, true);

        // Pass the decoded content to the Blade view
        return view('template1.nav-bar', compact('navbarContent'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Composant::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'templateId' => 'required|exists:templates,templateId',
            'type' => 'required|string',
            'contenu' => 'nullable|string',
        ]);

        $composant = Composant::create($validated);
        return response()->json(['message' => 'Composant created successfully', 'composant' => $composant], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $composant = Composant::findOrFail($id);
        return response()->json($composant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $composant = Composant::findOrFail($id);
        $validated = $request->validate([
            'templateId' => 'required|exists:templates,templateId',
            'type' => 'required|string',
            'contenu' => 'nullable|string',
        ]);

        $composant->update($validated);
        return response()->json(['message' => 'Composant updated successfully', 'composant' => $composant]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Composant::destroy($id);
        return response()->json(['message' => 'Composant deleted successfully']);
    }
}
