<article class="theme-card" data-theme-card data-theme-group="{{ $theme['group_key'] }}" data-theme-search="{{ strtolower($theme['title'].' '.$theme['group'].' '.$theme['summary']) }}">
    <a class="theme-card__link" href="{{ route('themes.show', $theme['slug']) }}">
        <figure class="theme-card__media">
            <img data-theme-image src="{{ $theme['image'] }}" alt="{{ $theme['image_alt'] }}" loading="lazy" decoding="async" referrerpolicy="no-referrer">
            <span class="theme-card__fallback" aria-hidden="true">{{ $theme['group'] }}</span>
            <figcaption>Illustrative image</figcaption>
        </figure>
        <div class="theme-card__body">
            <p class="theme-card__eyebrow">{{ $theme['group'] }}</p>
            <h3>{{ $theme['title'] }}</h3>
            <p>{{ $theme['summary'] }}</p>
            <span class="theme-card__action">Explore the research area <span aria-hidden="true">↗</span></span>
        </div>
    </a>
</article>
