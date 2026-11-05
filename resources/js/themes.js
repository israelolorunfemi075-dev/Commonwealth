const themeBrowser = document.querySelector('[data-theme-browser]');

if (themeBrowser) {
    const searchInput = themeBrowser.querySelector('[data-theme-search]');
    const cards = [...themeBrowser.querySelectorAll('[data-theme-card]')];
    const filters = [...themeBrowser.querySelectorAll('[data-theme-filter]')];
    const count = themeBrowser.querySelector('[data-theme-count]');
    const empty = themeBrowser.querySelector('[data-theme-empty]');
    let activeGroup = 'all';

    const filterThemes = () => {
        const query = (searchInput?.value || '').trim().toLocaleLowerCase();
        let visible = 0;

        cards.forEach(card => {
            const belongsToGroup = activeGroup === 'all' || card.dataset.themeGroup === activeGroup;
            const matchesQuery = (card.dataset.themeSearch || '').toLocaleLowerCase().includes(query);
            const isVisible = belongsToGroup && matchesQuery;

            card.hidden = !isVisible;
            if (isVisible) visible += 1;
        });

        if (count) count.textContent = 'Showing ' + visible + ' of ' + cards.length + ' areas';
        if (empty) empty.hidden = visible > 0;
    };

    searchInput?.addEventListener('input', filterThemes);
    filters.forEach(button => {
        button.addEventListener('click', () => {
            activeGroup = button.dataset.themeFilter || 'all';
            filters.forEach(filter => {
                const isActive = filter === button;
                filter.classList.toggle('is-active', isActive);
                filter.setAttribute('aria-pressed', String(isActive));
            });
            filterThemes();
        });
    });
}

document.querySelectorAll('[data-theme-image]').forEach(image => {
    image.addEventListener('error', () => {
        image.hidden = true;
        image.closest('.theme-card__media, .theme-detail-hero__image')?.classList.add('is-image-fallback');
    }, { once: true });
});
