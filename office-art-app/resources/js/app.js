require('./bootstrap')

import Alpine from 'alpinejs'

Alpine.store('state', {
    isSidebarOpen: false,
    isLoading: false,
    hasError: false,
    toggleSidebar() {
        this.isSidebarOpen = !this.isSidebarOpen;
    }
})

Alpine.store('gallery', {
    objects: [{
        title: 'Wheat Field with Cypresses',
        date: '1889',
        department: 'European Paintings',
        artist: 'Vincent van Gogh',
        imageUrl: 'https://images.metmuseum.org/CRDImages/ep/original/DT1567.jpg'
    }],
    displayingObjectIndex: 0
})

window.Alpine = Alpine
Alpine.start()

