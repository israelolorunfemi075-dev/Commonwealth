<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $themes = collect(config('investment_themes.themes', []))->keyBy('slug');
        $featuredThemes = collect([
            'bitcoin',
            'tesla',
            'logistics-business',
            'rental-properties',
            'farmland',
            'ethereum',
        ])->map(fn (string $slug) => $themes->get($slug))->filter()->values();

        return view('home', compact('featuredThemes'));
    }
}
