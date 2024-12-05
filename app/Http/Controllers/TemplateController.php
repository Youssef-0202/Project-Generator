<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Composant;
use App\Models\UserTemplate;
use Illuminate\Http\Request;

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
        $templateId = 1; // Example template ID
        $userId = auth()->id();

        // Ensure user is authenticated
        if (!$userId) {
            return abort(403, 'Unauthorized');
        }

        // Fetch or create the user's personalized template
        $userTemplate = UserTemplate::where('template_id', $templateId)
            ->where('user_id', $userId)
            ->first();

        if (!$userTemplate) {
            $userTemplate = new UserTemplate();
            $userTemplate->template_id = $templateId;
            $userTemplate->user_id = $userId;
            $userTemplate->components_data = json_encode([]);
        }

        // Decode existing components data
        $componentsData = json_decode($userTemplate->components_data, true);

        // Update the specific component
        $data = $request->except('_token');
        $componentsData[$componentName] = $data;

        // Save the updated components data
        $userTemplate->components_data = json_encode($componentsData);
        $userTemplate->save();

        return back()->with('success', "$componentName updated successfully!");
    }

    /**
     * Save the updated components for the user.
     */
    public function saveUserTemplate(Request $request)
    {
        $templateId = 1; // Example template ID
        $userId = auth()->id();

        // Check if the user already has a personalized template
        $userTemplate = UserTemplate::where('template_id', $templateId)
            ->where('user_id', $userId)
            ->first();

        if ($userTemplate) {
            // Update the existing user template with new components data
            $userTemplate->components_data = json_encode($request->componentsData);
            $userTemplate->save();
        } else {
            // Create a new user template with the modified components
            $userTemplate = new UserTemplate();
            $userTemplate->template_id = $templateId;
            $userTemplate->user_id = $userId;
            $userTemplate->components_data = json_encode($request->componentsData);
            $userTemplate->save();
        }

        return response()->json(['message' => 'User template saved successfully']);
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
