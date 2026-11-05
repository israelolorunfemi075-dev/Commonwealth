@extends('layouts.app')
@section('title', $page['title'].' | Commonwealth')
@section('body-class', 'info-page info-page--'.$slug)
@section('content')
<section class="page-hero"><div class="container-xl"><p class="eyebrow"><span></span> COMMONWEALTH / {{ str($slug)->replace('-', ' ')->upper() }}</p><h1>{{ $page['title'] }}</h1><p>{{ $page['intro'] }}</p></div></section>
@if (!empty($page['facts']))
<section class="container-xl info-facts" aria-label="Current service status">
    @foreach ($page['facts'] as $fact)
        <article><span>{{ $fact['label'] }}</span><strong>{{ $fact['value'] }}</strong></article>
    @endforeach
</section>
@endif
<section class="container-xl info-wrap">
    @if (!empty($page['draft']))<div class="draft-notice"><strong>WORKING DRAFT | NOT FOR LIVE OPERATIONS</strong><span>This content requires review and completion by qualified professionals before launch.</span></div>@endif
    <div class="info-sections">@foreach($page['sections'] as $section)<article><h2>{{ $section['title'] }}</h2><p>{{ $section['body'] }}</p></article>@endforeach</div>
    @if (!empty($page['links']))
        <nav class="info-related-links" aria-label="Trust and policy resources">
            @foreach ($page['links'] as $link)
                <a class="quiet-link" href="{{ route($link['route']) }}">{{ $link['label'] }} <span aria-hidden="true">↗</span></a>
            @endforeach
        </nav>
    @endif
    <a class="quiet-link" href="{{ route('home') }}">Return to overview <span>↗</span></a>
</section>
@endsection