<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Composant;
use App\Models\UserTemplate;
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
        return view('templates', compact('templates'));
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
        // Fetch the latest template
        $template = Template::latest()->first();

        // Handle case where no templates exist
        if (!$template) {
            return abort(404, 'No templates available');
        }

        // Initialize components data
        $componentsData = [];

        // Check if the user is authenticated
        if (auth()->check()) {
            // Fetch the user's personalized template, if it exists
            $userTemplate = UserTemplate::where('template_id', $template->templateId)
                ->where('user_id', auth()->id())
                ->first();

            if ($userTemplate) {
                // Load the personalized components data
                $componentsData = json_decode($userTemplate->components_data, true);
            } else {
                // Fall back to default components
                $componentsData = $this->getDefaultComponents($template->templateId);
            }
        } else {
            // Load default components for unauthenticated users
            $componentsData = $this->getDefaultComponents($template->templateId);
        }

        // Pass data to the view
        return view('templates.temp1', compact('componentsData'));
    }

    /**
     * Helper function to fetch default components for a template.
     */
    private function getDefaultComponents($templateId)
    {
        // Fetch components associated with the template
        $components = Composant::where('templateId', $templateId)->get();

        // Decode components data
        $componentsData = [];
        foreach ($components as $component) {
            $componentsData[$component->name] = json_decode($component->contenu, true);
        }

        return $componentsData;
    }


    /**
     * Display the specified resource.
     */
    public function show($templateId)
    {
        $template = Template::where('templateId', $templateId)->first();
        return view('templates.iframe', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // Fetch the latest template
        $template = Template::latest()->first();

        // Handle case where no templates exist
        if (!$template) {
            return abort(404, 'No templates available');
        }

        // Check if the user is authenticated
        if (auth()->check()) {
            // Fetch the user's personalized template, if it exists
            $userTemplate = UserTemplate::where('template_id', $template->templateId)
                ->where('user_id', auth()->id())
                ->first();

            if ($userTemplate) {
                // Load the personalized components data
                $componentsData = json_decode($userTemplate->components_data, true);
            } else {
                // Fall back to the default components if no personalization exists
                $componentsData = $this->getDefaultComponents($template->templateId);

                // Optionally create a user template with default data for later modifications
                $userTemplate = new UserTemplate();
                $userTemplate->template_id = $template->templateId;
                $userTemplate->user_id = auth()->id();
                $userTemplate->components_data = json_encode($componentsData);
                $userTemplate->save();
            }
        } else {
            // Load default components for unauthenticated users
            $componentsData = $this->getDefaultComponents($template->templateId);
        }

        // Pass data to the view
        return view('templates.builder', compact('template', 'componentsData'));
    }


    /**
     * Helper function to fetch default components for a template.
     */
    // private function getDefaultComponents($templateId)
    // {
    //     // Fetch components associated with the template
    //     $components = Composant::where('templateId', $templateId)->get();

    //     // Decode components data
    //     $componentsData = [];
    //     foreach ($components as $component) {
    //         $componentsData[$component->name] = json_decode($component->contenu, true);
    //     }

    //     return $componentsData;
    // }

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
 // Mise à jour du composant Navbar
if ($componentName === 'Navbar') {
    // Mise à jour du logo si présent
    if ($request->hasFile('logo')) {
        $contenu['logo'] = $this->storeImage($request->file('logo'), 'navbar_images');
    }

    // Mise à jour des liens de navigation
    if ($request->has('links')) {
        $updatedLinks = [];
        foreach ($request->input('links') as $index => $linkData) {
            $updatedLinks[] = [
                'label' => $linkData['label'] ?? ($contenu['links'][$index]['label'] ?? "Default Label $index"),
                'url' => $linkData['url'] ?? ($contenu['links'][$index]['url'] ?? "#"),
            ];
        }
        $contenu['links'] = $updatedLinks;
    }

    // Supprimer les anciens liens si aucune donnée de lien n'est envoyée
    if (!$request->has('links')) {
        $contenu['links'] = [];
    }
}

// Mise à jour spécifique au composant "Masthead"
if ($componentName === 'Masthead') {
    $contenu['subheading'] = $request->input('subheading', $contenu['subheading'] ?? '');
    $contenu['heading'] = $request->input('heading', $contenu['heading'] ?? '');
    $contenu['buttonText'] = $request->input('buttonText', $contenu['buttonText'] ?? '');
}


   // Mise à jour des services
if ($request->has('services')) {
    // Supprimer les anciens services non présents dans les nouvelles données
    $receivedServiceIndices = array_keys($request->input('services'));
    $existingServiceIndices = array_keys($contenu['services'] ?? []);
    $indicesToRemove = array_diff($existingServiceIndices, $receivedServiceIndices);

    foreach ($indicesToRemove as $indexToRemove) {
        unset($contenu['services'][$indexToRemove]);
    }

    // Mettre à jour ou ajouter les nouveaux services
    foreach ($request->input('services') as $index => $serviceData) {
        $contenu['heading'] = $request->input('heading', $contenu['heading'] ?? 'Services');
        $contenu['subheading'] = $request->input('subheading', $contenu['subheading'] ?? 'Lorem ipsum dolor sit amet consectetur.');
        $contenu['services'][$index] = array_merge(
            $contenu['services'][$index] ?? [],  // Conserver les données existantes
            [
                // Garder l'icône existante à moins que l'utilisateur en fournisse une nouvelle
                'icon' => $serviceData['icon'] ?? ($contenu['services'][$index]['icon'] ?? 'fas fa-star'),
                
                // Mettre à jour le titre et la description
                'title' => $serviceData['title'] ?? ($contenu['services'][$index]['title'] ?? "Default Title $index"),
                'description' => $serviceData['description'] ?? ($contenu['services'][$index]['description'] ?? 'Default description'),
            ]
        );
    }
}

// Mise à jour spécifique au composant "Portfolio"
if ($componentName === 'Portfolio') {
    // Mettre à jour le heading et subheading si présents
    $contenu['heading'] = $request->input('heading', $contenu['heading'] ?? 'Portfolio');
    $contenu['subheading'] = $request->input('subheading', $contenu['subheading'] ?? 'Lorem ipsum dolor sit amet consectetur.');

    // Mise à jour des éléments du portfolio
    if ($request->has('items')) {
        foreach ($request->input('items') as $index => $itemData) {
            $contenu['items'][$index] = array_merge(
                $contenu['items'][$index] ?? [],  // Conserver les données existantes
                [
                    'modal' => $itemData['modal'] ?? ($contenu['items'][$index]['modal'] ?? '#'),
                    'captionHeading' => $itemData['captionHeading'] ?? ($contenu['items'][$index]['captionHeading'] ?? "Default Caption Heading $index"),
                    'captionSubheading' => $itemData['captionSubheading'] ?? ($contenu['items'][$index]['captionSubheading'] ?? "Default Caption Subheading $index"),
                ]
            );

            // Mise à jour de l'image si un fichier est téléchargé
            if ($request->hasFile("items.$index.image")) {
                $contenu['items'][$index]['image'] = $this->storeImage($request->file("items.$index.image"), 'portfolio_images');
            }
        }
    }
}


// Mise à jour spécifique au composant "About"
if ($componentName === 'About') {
    // Mise à jour du heading et subheading
    $contenu['heading'] = $request->input('heading', $contenu['heading'] ?? 'About');
    $contenu['subheading'] = $request->input('subheading', $contenu['subheading'] ?? 'Lorem ipsum dolor sit amet consectetur.');

    // Mise à jour de la timeline
    if ($request->has('timeline')) {
        foreach ($request->input('timeline') as $index => $timelineData) {
            $contenu['timeline'][$index] = array_merge(
                $contenu['timeline'][$index] ?? [],  // Conserver les données existantes
                [
                    'year' => $timelineData['year'] ?? ($contenu['timeline'][$index]['year'] ?? ''),
                    'subheading' => $timelineData['subheading'] ?? ($contenu['timeline'][$index]['subheading'] ?? ''),
                    'description' => $timelineData['description'] ?? ($contenu['timeline'][$index]['description'] ?? ''),
                    'inverted' => isset($timelineData['inverted']) ? (bool)$timelineData['inverted'] : ($contenu['timeline'][$index]['inverted'] ?? false),
                ]
            );

            // Mise à jour de l'image de la timeline
            if ($request->hasFile("timeline.$index.image")) {
                $contenu['timeline'][$index]['image'] = $this->storeImage($request->file("timeline.$index.image"), 'timeline_images');
            }
        }
    }

    // Mise à jour du message final
    if ($request->has('finalMessage')) {
        $contenu['timeline']['finalMessage'] = $request->input('finalMessage', $contenu['timeline']['finalMessage'] ?? 'Be Part Of Our Story!');
    }
}

// Mise à jour des membres de l'équipe (team)
if ($request->has('members')) {
    // Mise à jour du heading et du subheading
if ($request->has('heading') && $request->has('subheading')) {
    $contenu['heading'] = $request->input('heading') ?? $contenu['heading']; // Mettre à jour ou garder l'ancien
    $contenu['subheading'] = $request->input('subheading') ?? $contenu['subheading']; // Mettre à jour ou garder l'ancien
}
    // Supprimer les membres non présents dans les données reçues
    $receivedTeamIndices = array_keys($request->input('members'));
    $existingTeamIndices = array_keys($contenu['members'] ?? []);
    $indicesToRemove = array_diff($existingTeamIndices, $receivedTeamIndices);

    foreach ($indicesToRemove as $indexToRemove) {
        unset($contenu['members'][$indexToRemove]);
    }

    // Mettre à jour ou ajouter les membres de l'équipe
    foreach ($request->input('members') as $index => $teamData) {
        $contenu['members'][$index] = array_merge(
            $contenu['members'][$index] ?? [], // Conserver les données existantes
            [
                'name' => $teamData['name'] ?? ($contenu['members'][$index]['name'] ?? "Default Name $index"),
                'role' => $teamData['role'] ?? ($contenu['members'][$index]['role'] ?? "Default Role"),
                'social' => [
                    'twitter' => $contenu['members'][$index]['social']['twitter'] ?? '#', // Conserver l'ancienne valeur
                    'facebook' => $contenu['members'][$index]['social']['facebook'] ?? '#', // Conserver l'ancienne valeur
                    'linkedin' => $contenu['members'][$index]['social']['linkedin'] ?? '#', // Conserver l'ancienne valeur
                ],
            ]
        );
        

        // Mise à jour de la photo du membre de l'équipe
        if ($request->hasFile("members.$index.image")) {
            $contenu['members'][$index]['image'] = $this->storeImage($request->file("members.$index.image"), 'team_photos');
        }
    }
}

// Mise à jour des logos des clients
if ($request->has('logos')) {
    // Supprimer les logos non présents dans les données reçues
    $receivedLogoIndices = array_keys($request->input('logos'));
    $existingLogoIndices = array_keys($contenu['logos'] ?? []);
    $indicesToRemove = array_diff($existingLogoIndices, $receivedLogoIndices);

    foreach ($indicesToRemove as $indexToRemove) {
        unset($contenu['logos'][$indexToRemove]);
    }

    // Mettre à jour ou ajouter les logos
    foreach ($request->input('logos') as $index => $logoData) {
        $contenu['logos'][$index] = array_merge(
            $contenu['logos'][$index] ?? [], // Conserver les données existantes
            [
                'alt' => $logoData['alt'] ?? ($contenu['logos'][$index]['alt'] ?? "Default Alt Text $index"),
                'aria_label' => $logoData['aria_label'] ?? ($contenu['logos'][$index]['aria_label'] ?? "Default Aria Label"),
                // Pas de mise à jour pour 'link', il reste inchangé
            ]
        );

        // Mise à jour de l'image du logo
        if ($request->hasFile("logos.$index.image")) {
            $contenu['logos'][$index]['image'] = $this->storeImage($request->file("logos.$index.image"), 'client_logos');
        }
    }
}

// Mise à jour des données du footer
if ($request->has('footer')) {
    // Mettre à jour uniquement le texte du copyright
    $contenu['copyright'] = $request->input('copyright') ?? $contenu['copyright'];

    // Les URLs sociales et les liens de pied de page restent inchangées
    $contenu['social_links'] = [
        'twitter' => $contenu['social_links']['twitter'], // Pas de changement
        'facebook' => $contenu['social_links']['facebook'], // Pas de changement
        'linkedin' => $contenu['social_links']['linkedin'], // Pas de changement
    ];

    $contenu['footer_links'] = [
        'privacy_policy' => $contenu['footer_links']['privacy_policy'], // Pas de changement
        'terms_of_use' => $contenu['footer_links']['terms_of_use'], // Pas de changement
    ];
}

    // Mise à jour du contenu dans la base de données
    $component->contenu = json_encode($contenu, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    dd($component->contenu);
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
