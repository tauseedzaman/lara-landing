<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $pages = LandingPage::latest()->paginate(15);

        return view('lara-landing.admin.index', compact('pages'));
    }

    public function create()
    {
        return view('lara-landing.admin.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:landing_pages,slug',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_header' => 'boolean',
            'show_footer' => 'boolean',
            'layout' => 'nullable|string|max:50',
            'tracking_scripts' => 'nullable|json',
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string',
            'language' => 'required|string|max:10',
            'template' => 'nullable|string|max:50',
        ]);

        // Handle the meta image upload
        $metaImagePath = null;
        if ($request->hasFile('meta_image')) {
            $metaImagePath = $request->file('meta_image')->store('landing-pages/meta-images', 'public');
        }

        // Create the landing page
        $landingPage = LandingPage::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'status' => $validated['status'],
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_image' => $metaImagePath,
            'show_header' => $validated['show_header'] ?? true,
            'show_footer' => $validated['show_footer'] ?? true,
            'layout' => $validated['layout'] ?? 'default',
            'tracking_scripts' => json_encode($validated['tracking_scripts'] ?? null),
            'custom_css' => json_encode($validated['custom_css'] ?? null),
            'custom_js' => json_encode($validated['custom_js'] ?? null),
            'language' => $validated['language'],
            'template' => $validated['template'] ?? null,
        ]);

        // Redirect with success message
        return redirect()->route('lara-landing.landing.index')
            ->with('success', 'Landing page created successfully!');
    }

    public function edit($id)
    {
        $page = LandingPage::findOrFail($id);

        return view('lara-landing.admin.edit', compact('page'));
    }

    public function update(Request $request, LandingPage $landingPage)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:landing_pages,slug,'.$landingPage->id,
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_header' => 'boolean',
            'show_footer' => 'boolean',
            'layout' => 'nullable|string|max:50',
            'tracking_scripts' => 'nullable|string',
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string',
            'language' => 'required|string|max:10',
            'template' => 'nullable|string|max:50',
        ]);

        // Handle the meta image upload
        $metaImagePath = $landingPage->meta_image;
        if ($request->hasFile('meta_image')) {
            if ($metaImagePath) {
                \Storage::disk('public')->delete($metaImagePath);
            }
            $metaImagePath = $request->file('meta_image')->store('landing-pages/meta-images', 'public');
        }

        // Update the landing page
        $landingPage->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'status' => $validated['status'],
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_image' => $metaImagePath,
            'show_header' => $validated['show_header'] ?? true,
            'show_footer' => $validated['show_footer'] ?? true,
            'layout' => $validated['layout'] ?? 'default',
            'tracking_scripts' => json_encode($validated['tracking_scripts'] ?? null),
            'custom_css' => json_encode($validated['custom_css'] ?? null),
            'custom_js' => json_encode($validated['custom_js'] ?? null),
            'language' => $validated['language'],
            'template' => $validated['template'] ?? null,
        ]);

        // Redirect with success
        return redirect()->route('lara-landing.landing.index')
            ->with('success', 'Landing page updated successfully!');
    }

    // delete function
    public function destroy(LandingPage $landingPage)
    {
        // delete media image if exists
        if ($landingPage->meta_image) {
            \Storage::disk('public')->delete($landingPage->meta_image);
        }

        // if landing page has any sections then return with error
        if ($landingPage->sections()->count() > 0) {
            return redirect()->route('lara-landing.landing.index')
                ->with('error', 'Cannot delete landing page with existing sections. delete sections first');
        }

        // Delete the landing page
        $landingPage->delete();

        // Redirect with success message
        return redirect()->route('lara-landing.landing.index')
            ->with('success', 'Landing page deleted successfully!');
    }
}
