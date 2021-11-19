require('./bootstrap');

import Alpine from 'alpinejs';

Alpine.store('state', {
    isSidebarOpen: false,
    isLoading: true,
    hasError: true,
    toggleSidebar() {
        this.isSidebarOpen = !this.isSidebarOpen;
    }
});

window.Alpine = Alpine
Alpine.start()

