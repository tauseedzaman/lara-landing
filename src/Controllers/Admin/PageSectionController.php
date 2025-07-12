<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\LandingSection;
use DB;
use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    // index
    public function index($id)
    {
        $page = LandingPage::findOrFail($id);
        $sections = LandingSection::where('landing_page_id', $page->id)->latest()->paginate(15);
        return view('lara-landing.admin.sections.index', compact('sections', 'page'));
    }

    public function create($id)
    {
        $page = LandingPage::findOrFail($id);
        return view('lara-landing.admin.sections.create', compact('page'));
    }

    public function store(Request $request, $pageId)
    {
        // Validate the request data
        $validated = $request->validate([
            'type' => 'required|string|max:50',
            'content' => 'required',
            'order' => 'required|integer',
            'is_visible' => 'boolean',
            'background_color' => 'nullable|string|max:20',
            'custom_class' => 'nullable|string|max:255',
            'custom_id' => 'nullable|string|max:255',
            'settings' => 'nullable|json',
        ]);

        // Create the new section
        LandingSection::create([
            'landing_page_id' => $pageId,
            'type' => $validated['type'],
            'content' => ($validated['content']),
            'order' => $validated['order'],
            'is_visible' => $validated['is_visible'] ?? true,
            'background_color' => $validated['background_color'] ?? null,
            'custom_class' => $validated['custom_class'] ?? null,
            'custom_id' => $validated['custom_id'] ?? null,
            'settings' => $request->filled('settings') ? json_encode($validated['settings']) : null,
        ]);

        return redirect()
            ->route('lara-landing.landing.sections', $pageId)
            ->with('success', 'Section created successfully!');

    }

    public function edit($pageId, $sectionId)
    {
        $page = LandingPage::findOrFail($pageId);
        $section = $page->sections()->findOrFail($sectionId);

        return view('lara-landing.admin.sections.edit', compact('page', 'section'));
    }

    public function update(Request $request, $pageId, $sectionId)
    {
        // Find the section
        $section = LandingSection::where('landing_page_id', $pageId)
            ->findOrFail($sectionId);

        // Validate the request data
        $validated = $request->validate([
            'type' => 'required|string|max:50',
            'content' => 'required',
            'order' => 'required|integer',
            'is_visible' => 'boolean',
            'background_color' => 'nullable|string|max:20',
            'custom_class' => 'nullable|string|max:255',
            'custom_id' => 'nullable|string|max:255',
            'settings' => 'nullable|json',
        ]);

        try {
            // Update the section
            $section->type = $validated['type'];
            $section->content = ($validated['content']);
            $section->order = $validated['order'];
            $section->is_visible = $validated['is_visible'] ?? true;
            $section->background_color = $validated['background_color'] ?? null;
            $section->custom_class = $validated['custom_class'] ?? null;
            $section->custom_id = $validated['custom_id'] ?? null;
            $section->settings = $request->filled('settings') ? json_decode($validated['settings']) : null;
            $section->save();

            return redirect()
                ->route('lara-landing.landing.sections', $pageId)
                ->with('success', 'Section updated successfully!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Error updating section: ' . $e->getMessage());
        }
    }

    public function destroy($landingPageId, $sectionId)
    {
        // Find the section
        $section = LandingSection::where('landing_page_id', $landingPageId)
            ->findOrFail($sectionId);

        // Delete the section
        $section->delete();

        return redirect()
            ->route('lara-landing.landing.sections', $landingPageId)
            ->with('success', 'Section deleted successfully!');
    }

    public function update_sections_order(Request $request, $pageId)
    {
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:landing_sections,id',
        ]);

        DB::beginTransaction();

        try {
            foreach ($validated['order'] as $index => $sectionId) {
                // Ensure the section belongs to the given landing page
                LandingSection::where('id', $sectionId)
                    ->where('landing_page_id', $pageId)
                    ->update(['order' => $index + 1]);
            }

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Reordering failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


}
