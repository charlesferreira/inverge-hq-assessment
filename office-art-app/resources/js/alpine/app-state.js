export const appState = () => ({
    hasError: false,
    objectIDs: [],
    objects: [],
    displayingObjectIndex: 0,
    get displayingObject() {
        return this.objects[this.displayingObjectIndex] || {}
    },
    toggleSidebar() {
        this.isSidebarOpen = !this.isSidebarOpen
    },
    async loadObjects() {
        fetch('/api/objects')
            .then(data => data.json())
            .then(data => {
                console.log('Successfully fetched objects', data);
            })
            .catch(error => {
                Alpine.store('errors').hasError = true;
                console.log('Error fetching objects', error.message);
            });
    },
    async prefetchImage() {
        // ...
    }
})