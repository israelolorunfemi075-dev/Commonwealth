<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvestmentThemeController extends Controller
{
    public function index(): View
    {
        return view('themes.index', [
            'themes' => config('investment_themes.themes', []),
            'themeGroups' => config('investment_themes.groups', []),
        ]);
    }

    public function show(string $slug): View
    {
        $themes = collect(config('investment_themes.themes', []));
        $theme = $themes->firstWhere('slug', $slug);

        if (! $theme) {
            throw new NotFoundHttpException();
        }

        $relatedThemes = $themes
            ->where('group_key', $theme['group_key'])
            ->where('slug', '!=', $theme['slug'])
            ->take(3)
            ->values();

        return view('themes.show', compact('theme', 'relatedThemes'));
    }
}
