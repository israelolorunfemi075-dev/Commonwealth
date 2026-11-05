@extends('layouts.app')

@section('title', $theme['title'].' research overview | Commonwealth')
@section('description', $theme['summary'].' Educational research only; no related investment is currently offered.')
@section('body-class', 'theme-page theme-page--detail')

@section('content')
<section class="theme-detail-hero">
    <div class="container-xl theme-detail-hero__grid">
        <div class="theme-detail-hero__copy">
            <p class="eyebrow"><span></span> {{ $theme['group'] }}</p>
            <h1>{{ $theme['title'] }}</h1>
            <p>{{ $theme['summary'] }}</p>
            <p class="theme-status-note"><strong>Research theme only.</strong> No related investment is currently offered through Commonwealth.</p>
            <a class="button button-gold" href="{{ route('themes.index') }}">Back to all research areas <span aria-hidden="true">←</span></a>
        </div>
        <figure class="theme-detail-hero__image">
            <img data-theme-image src="{{ $theme['image'] }}" alt="{{ $theme['image_alt'] }}" fetchpriority="high" decoding="async" referrerpolicy="no-referrer">
            <span class="theme-card__fallback" aria-hidden="true">{{ $theme['group'] }}</span>
            <figcaption>Illustrative image</figcaption>
        </figure>
    </div>
</section>

<section class="container-xl theme-detail-content">
    <div class="theme-detail-main">
        <p class="eyebrow dark-eyebrow"><span></span> HOW EXPOSURE CAN DIFFER</p>
        <h2>Understand the legal interest first.</h2>
        <p>{{ $theme['exposure'] }}</p>
        <div class="theme-risk-panel">
            <p class="eyebrow dark-eyebrow"><span></span> PRINCIPAL RISKS TO CONSIDER</p>
            <p>{{ $theme['risk'] }}</p>
        </div>
        <h2>Questions to answer before any offer</h2>
        <ul class="theme-review-list">
            @foreach ($theme['review'] as $item)
                <li><span aria-hidden="true">—</span>{{ $item }}</li>
            @endforeach
        </ul>
        <div class="theme-scope-note"><strong>Scope of this overview</strong><p>This page does not verify a live offer, establish investment rights, or provide current pricing or valuation. Any future offer would need its own identified issuer, governing jurisdiction, fees, liquidity terms, supporting documents, and risk disclosures.</p></div>
        <p class="theme-disclaimer-copy">This page is general educational information, not financial, legal, or tax advice and not a recommendation or offer. References to third-party companies and marks do not indicate affiliation or endorsement.</p>
    </div>

    <aside class="theme-detail-aside">
        <p class="eyebrow dark-eyebrow"><span></span> CURRENT STATUS</p>
        <h2>Not available to invest</h2>
        <p>Commonwealth has not listed a related offer, enabled subscriptions, or opened deposits or custody.</p>
        <a class="button button-navy w-100" href="{{ route('opportunities.index') }}">Check reviewed offers <span aria-hidden="true">↗</span></a>
        @if (Route::has('register'))
            <a class="theme-detail-aside__link" href="{{ route('register') }}">Create an account for platform updates</a>
        @endif
    </aside>
</section>

@if ($relatedThemes->isNotEmpty())
<section class="container-xl theme-related">
    <div class="theme-browser__heading"><div><p class="eyebrow dark-eyebrow"><span></span> RELATED RESEARCH</p><h2>More in {{ $theme['group'] }}</h2></div><a class="quiet-link" href="{{ route('themes.index') }}">Browse all areas <span aria-hidden="true">↗</span></a></div>
    <div class="theme-grid theme-grid--related">
        @foreach ($relatedThemes as $relatedTheme)
            @include('themes._card', ['theme' => $relatedTheme])
        @endforeach
    </div>
</section>
@endif
@endsection
