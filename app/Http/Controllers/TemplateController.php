<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function edit()
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
        return view('templates.builder', compact( 'template','componentsData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $componentName)
{
    $templateId = 1; // Exemple d'ID de modèle

    // Récupérer le composant
    $component = Composant::where('templateId', $templateId)
        ->where('name', $componentName)
        ->firstOrFail();

    // Récupérer le contenu actuel du composant
    $contenu = json_decode($component->contenu, true);

    // Mise à jour du logo si présent
    if ($request->hasFile('logo')) {
        $contenu['logo'] = $this->storeImage($request->file('logo'), 'c_images');
    }

    // Mise à jour des services
    if ($request->has('services')) {
        foreach ($request->input('services') as $index => $serviceData) {
            $contenu['services'][$index] = array_merge(
                $contenu['services'][$index] ?? [], // Conserver les données existantes
                [
                    'icon' => $serviceData['icon'] ?? ($contenu['services'][$index]['icon'] ?? 'fas fa-star'),
                    'title' => $serviceData['title'] ?? ($contenu['services'][$index]['title'] ?? "Default Title $index"),
                    'description' => $serviceData['description'] ?? ($contenu['services'][$index]['description'] ?? 'Default description'),
                ]
            );
        }
    }

    // Mise à jour des éléments du portfolio
    if ($request->has('items')) {
        foreach ($request->input('items') as $index => $itemData) {
            $contenu['items'][$index] = array_merge(
                $contenu['items'][$index] ?? [],
                [
                    'modal' => $itemData['modal'] ?? ($contenu['items'][$index]['modal'] ?? '#'),
                    'captionHeading' => $itemData['captionHeading'] ?? ($contenu['items'][$index]['captionHeading'] ?? "Default Caption Heading $index"),
                    'captionSubheading' => $itemData['captionSubheading'] ?? ($contenu['items'][$index]['captionSubheading'] ?? "Default Caption Subheading $index"),
                ]
            );

            // Mise à jour de l'image
            if ($request->hasFile("items.$index.image")) {
                $contenu['items'][$index]['image'] = $this->storeImage($request->file("items.$index.image"), 'portfolio_images');
            }
        }
    }

    // Mise à jour de la timeline pour "About"
    if ($request->has('timeline')) {
        foreach ($request->input('timeline') as $index => $timelineData) {
            $contenu['timeline'][$index] = array_merge(
                $contenu['timeline'][$index] ?? [],
                [
                    'year' => $timelineData['year'] ?? ($contenu['timeline'][$index]['year'] ?? ''),
                    'subheading' => $timelineData['subheading'] ?? ($contenu['timeline'][$index]['subheading'] ?? ''),
                    'description' => $timelineData['description'] ?? ($contenu['timeline'][$index]['description'] ?? ''),
                    'finalMessage' => $timelineData['finalMessage'] ?? ($contenu['timeline'][$index]['finalMessage'] ?? ''),
                    'inverted' => isset($timelineData['inverted']) ? (bool)$timelineData['inverted'] : ($contenu['timeline'][$index]['inverted'] ?? false),
                ]
            );

            // Mise à jour de l'image
            if ($request->hasFile("timeline.$index.image")) {
                $contenu['timeline'][$index]['image'] = $this->storeImage($request->file("timeline.$index.image"), 'timeline_images');
            }
        }
    }
// Mise à jour des membres de l'équipe (team)
if ($request->has('team')) {
    // Supprimer les membres non présents dans les données reçues
    $receivedTeamIndices = array_keys($request->input('team'));
    $existingTeamIndices = array_keys($contenu['team'] ?? []);
    $indicesToRemove = array_diff($existingTeamIndices, $receivedTeamIndices);

    foreach ($indicesToRemove as $indexToRemove) {
        unset($contenu['team'][$indexToRemove]);
    }

    // Mettre à jour ou ajouter les membres de l'équipe
    foreach ($request->input('team') as $index => $teamData) {
        $contenu['team'][$index] = array_merge(
            $contenu['team'][$index] ?? [],
            [
                'name' => $teamData['name'] ?? ($contenu['team'][$index]['name'] ?? "Default Name $index"),
                'position' => $teamData['position'] ?? ($contenu['team'][$index]['position'] ?? "Default Position"),
                'bio' => $teamData['bio'] ?? ($contenu['team'][$index]['bio'] ?? "Default Bio"),
            ]
        );

        // Mise à jour de la photo du membre de l'équipe
        if ($request->hasFile("team.$index.photo")) {
            $contenu['team'][$index]['photo'] = $this->storeImage($request->file("team.$index.photo"), 'team_photos');
        }
    }
}


    // Mise à jour du contenu dans la base de données
    $component->contenu = json_encode($contenu, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    $component->save();

    return back()->with('success', "$componentName mis à jour avec succès!");
}

/**
 * Méthode utilitaire pour stocker une image.
 *
 * @param UploadedFile $file
 * @param string $directory
 * @return string URL de l'image stockée
 */
private function storeImage($file, $directory)
{
    $path = $file->store("public/$directory");
    return asset('storage/' . str_replace('public/', '', $path));
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
