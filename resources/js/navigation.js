document.addEventListener('DOMContentLoaded', () => {
    const nav = document.getElementById('main-nav');
    const toggle = document.getElementById('mobile-menu-toggle');
    const iconOpen = document.getElementById('mobile-menu-icon-open');
    const iconClose = document.getElementById('mobile-menu-icon-close');
    const dropdowns = document.querySelectorAll('[data-nav-dropdown]');

    if (!nav || !toggle) return;

    const isDesktop = () => window.matchMedia('(min-width: 1024px)').matches;

    const setMobileNavOpen = (open) => {
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        nav.classList.toggle('hidden', !open);
        nav.classList.toggle('lg:block', true);
        iconOpen?.classList.toggle('hidden', open);
        iconClose?.classList.toggle('hidden', !open);

        if (!open) {
            closeAllDropdowns();
        }
    };

    const closeAllDropdowns = (except = null) => {
        dropdowns.forEach((dropdown) => {
            if (dropdown === except) return;
            dropdown.classList.remove('is-open');
            dropdown.querySelector('.nav-dropdown-trigger')?.setAttribute('aria-expanded', 'false');
        });
    };

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        setMobileNavOpen(!isOpen);
    });

    dropdowns.forEach((dropdown) => {
        const trigger = dropdown.querySelector('.nav-dropdown-trigger');
        if (!trigger) return;

        trigger.addEventListener('click', (e) => {
            if (isDesktop()) return;

            e.preventDefault();
            const willOpen = !dropdown.classList.contains('is-open');
            closeAllDropdowns(willOpen ? dropdown : null);
            dropdown.classList.toggle('is-open', willOpen);
            trigger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
        });
    });

    document.addEventListener('click', (e) => {
        if (!isDesktop() && !nav.contains(e.target) && !toggle.contains(e.target)) {
            setMobileNavOpen(false);
        }
    });

    window.addEventListener('resize', () => {
        if (isDesktop()) {
            toggle.setAttribute('aria-expanded', 'false');
            nav.classList.remove('hidden');
            nav.classList.add('lg:block');
            iconOpen?.classList.remove('hidden');
            iconClose?.classList.add('hidden');
            closeAllDropdowns();
        } else if (toggle.getAttribute('aria-expanded') !== 'true') {
            nav.classList.add('hidden');
        }
    });
});
