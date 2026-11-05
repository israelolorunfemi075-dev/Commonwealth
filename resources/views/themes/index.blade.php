@extends('layouts.app')

@section('title', 'Investment research areas | Commonwealth')
@section('description', 'Explore 15 educational research areas across digital assets, public markets, consumer brands, operating businesses, and real assets.')
@section('body-class', 'theme-page theme-page--index')

@section('content')
<section class="theme-index-hero">
    <div class="container-xl">
        <p class="eyebrow"><span></span> COMMONWEALTH / RESEARCH AREAS</p>
        <h1>Explore the assets<br>and businesses you follow.</h1>
        <p class="theme-index-hero__lede">A clear research catalogue covering digital assets, public markets, brands, operating businesses, and property.</p>
        <p class="theme-status-note"><strong>Availability:</strong> These are educational research themes. Commonwealth is not currently offering related investments, shares, property interests, deposits, or custody.</p>
    </div>
</section>

<section class="container-xl theme-browser" data-theme-browser aria-labelledby="theme-grid-title">
    <div class="theme-browser__heading">
        <div>
            <p class="eyebrow dark-eyebrow"><span></span> RESEARCH CATALOGUE</p>
            <h2 id="theme-grid-title">Fifteen areas to understand</h2>
            <p>Each page explains the type of rights, records, and risks that would need review before a legitimate offer could exist.</p>
        </div>
        <label class="theme-search">
            <span>Search research areas</span>
            <input type="search" data-theme-search placeholder="Try “property” or “digital assets”" autocomplete="off">
        </label>
    </div>

    <div class="theme-filters" role="group" aria-label="Filter research areas">
        @foreach ($themeGroups as $group)
            <button type="button" class="theme-filter {{ $loop->first ? 'is-active' : '' }}" data-theme-filter="{{ $group['key'] }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $group['label'] }}</button>
        @endforeach
    </div>
    <p class="theme-result-count" data-theme-count role="status" aria-live="polite">Showing {{ count($themes) }} areas</p>

    <div class="theme-grid" data-theme-grid>
        @foreach ($themes as $theme)
            @include('themes._card', ['theme' => $theme])
        @endforeach
    </div>
    <div class="theme-empty" data-theme-empty hidden>
        <h2>No matching areas</h2>
        <p>Try a different search term or choose another category.</p>
    </div>
</section>

<section class="theme-disclaimer">
    <div class="container-xl">
        <p class="eyebrow"><span></span> IMPORTANT</p>
        <h2>Research areas are not offers.</h2>
        <p>Company, product, league, studio, and brand references are for general identification only. They do not imply affiliation, ownership, endorsement, available securities, or investment rights. A future opportunity can appear in the separate offer catalogue only after its structure, rights, disclosures, and eligibility have been reviewed.</p>
        <a class="button button-gold" href="{{ route('opportunities.index') }}">View reviewed opportunities <span aria-hidden="true">→</span></a>
    </div>
</section>
@endsection
