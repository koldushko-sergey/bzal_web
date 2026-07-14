const STORAGE_KEY = 'bzal_a11y';

function applyAccessibility(enabled) {
    document.documentElement.classList.toggle('a11y-mode', enabled);
    document.body.classList.toggle('a11y-mode', enabled);

    const btn = document.getElementById('a11y-toggle');
    if (btn) {
        btn.setAttribute('aria-pressed', enabled ? 'true' : 'false');
        btn.title = enabled ? 'Обычная версия сайта' : 'Версия для слабовидящих';
    }
}

const saved = localStorage.getItem(STORAGE_KEY) === '1';
applyAccessibility(saved);

document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('a11y-toggle');
    if (!btn) return;

    btn.addEventListener('click', () => {
        const enabled = !document.body.classList.contains('a11y-mode');
        localStorage.setItem(STORAGE_KEY, enabled ? '1' : '0');
        applyAccessibility(enabled);
    });
});
