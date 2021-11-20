export const objects = {
    objectIDs: [],
    objects: [],
    displayingObjectIndex: -1,
    displayingBufferIndex: -1,

    /**
     * number of buffers to prefetch images
     */
    numberOfBuffers: 2,

    /**
     * Gets the current object being displayed
     */
    get displayingObject() {
        return this.objects[this.displayingBufferIndex];
    },

    /**
     * Gets the next buffer index to display the image on screen
     */
    get nextBufferIndex() {
        return (this.displayingBufferIndex + 1) % this.numberOfBuffers;
    },

    /**
     * Toggles sidebar visibility
     */
    toggleSidebar() {
        this.isSidebarOpen = !this.isSidebarOpen
    },

    /**
     * Loads the object list from the server and quickstarts the app
     */
    async initializeApp() {
        // try to load the object list
        const response = await fetch('/api/objects');

        if (!response.ok) {
            return Alpine.store('errors').error('Error fetching object list:', `${response.status} (${response.statusText})`);
        }

        const data = await response.json();
        this.objectIDs = data.objectIDs;

        // find next image and starts the timer
        await this.loadNextImage();
        await this.swapBuffers();
        Alpine.store('isLoading', false);
        Alpine.store('timer').start();
    },

    /**
     * Loads the next object until find one that has an image, then makes it ready for swapping
     */
    async loadNextImage() {
        let nextObject;
        while (true) {
            // randomize next object
            const randomObjectIndex = Math.floor(Math.random() * this.objectIDs.length);

            // try to load next object
            const response = await fetch(`/api/objects/${this.objectIDs[randomObjectIndex]}`);

            if (!response.ok) {
                return Alpine.store('errors').error('Error fetching object:', `${response.status} (${response.statusText})`);
            }

            // verify that the object has an image
            nextObject = await response.json();
            if (nextObject.imageUrl) {
                break;
            }

            // if we got here, the object has no image, so we need to try again,
            // but let's sleep for a bit to avoid hammering the server
            await new Promise(resolve => setTimeout(resolve, 500));
        }

        // save next object and prefetch its image
        this.objects[this.nextBufferIndex] = nextObject;

        return this.prefetchNextImage();
    },

    /**
     * Makes a promise to prefetch the next image
     */
    async prefetchNextImage() {
        return await new Promise(resolve => {
            const nextObject = this.objects[this.nextBufferIndex];
            const image = new Image();
            image.onload = resolve;
            image.src = nextObject.imageUrl;
        });
    },

    /**
     * Swaps the currently displayed image and resets the timer
     */
    async swapBuffers() {
        this.displayingBufferIndex = this.nextBufferIndex;
        this.displayingObjectIndex = this.objects[this.displayingBufferIndex].id;

        // gives a little time for the image to fade
        await new Promise(resolve => setTimeout(resolve, 1000));

        await this.loadNextImage();
    },
}
