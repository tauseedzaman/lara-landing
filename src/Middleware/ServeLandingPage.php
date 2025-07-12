<?php

namespace App\Http\Middleware;

use App\Models\LandingPage;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServeLandingPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = '/'.ltrim($request->path(), '/'); // normalize path (ensure it starts with /)
        // Match by slug
        $landingPage = LandingPage::where('slug', $path)
            ->where('status', 'published')
            ->first();

        if ($landingPage) {
            // Load sections relationship
            $landingPage->load('sections');

            // // Optional: Set meta info in the view share
            // view()->share([
            //     'meta_title' => $landingPage->meta_title,
            //     'meta_description' => $landingPage->meta_description,
            //     'meta_image' => $landingPage->meta_image,
            // ]);

            return response()->view('lara-landing.landing-page.view', [
                'page' => $landingPage,
                'sections' => $landingPage->sections->where('is_visible', true)->sortBy('order'),
            ]);
        }

        // If not a landing page, continue to the next middleware/route
        return $next($request);
    }
}
