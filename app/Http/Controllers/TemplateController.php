<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Template;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class TemplateController extends Controller
{
     // Define the mapping of template IDs to Blade file paths


   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = Template::latest()->paginate();
        return view('templates' , compact('templates'));
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
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'imagePrev' => 'nullable|string',
        ]);

        $template = Template::create($validated);
        return response()->json(['message' => 'Template created successfully', 'template' => $template]);
    }

    public function renderTemp1()
    {
        // Define the components data
        // Fetch the latest template
    $template = Template::latest()->first();

    // Handle case where no templates exist
    if (!$template) {
        return abort(404, 'No templates available');
    }

    // Fetch associated components
    $components = Composant::where('templateId', $template->templateId)->get();

    // Decode components data
    $componentsData = [];
    foreach ($components as $component) {
        $componentsData[$component->name] = json_decode($component->contenu, true);
    }

        // Pass data to the view
        return view('templates.temp1', compact('componentsData'));
    }

    /**
     * Display the specified resource.
     */
    public function show($templateId)
    {
        $template = Template::where('templateId', $templateId)->first();
    //    / Assuming the column is template_id
        
        
    return view('templates.iframe', compact('template' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $template = Template::findOrFail($id);
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'imagePrev' => 'nullable|string',
        ]);

        $template->update($validated);
        return response()->json(['message' => 'Template updated successfully', 'template' => $template]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Template::destroy($id);
        return response()->json(['message' => 'Template deleted successfully']);
    }
}
