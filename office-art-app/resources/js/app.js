require('./bootstrap');

import Alpine from 'alpinejs';

Alpine.data('appState', () => ({
    isSidebarOpen: false,
    isLoading: false,
    hasError: false
}));

window.Alpine = Alpine
Alpine.start()

