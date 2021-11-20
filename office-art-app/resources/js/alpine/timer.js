export const timer = {
    durationInSeconds: 10,
    id: null,
    startTime: null,
    remainingTime: 0,

    get durationInMilliseconds() {
        return this.durationInSeconds * 1000;
    },

    /**
     * Starts the timer
     */
    start: function () {
        clearInterval(this.id);
        this.id = setInterval(this.changeArtwork.bind(this), this.durationInMilliseconds);
        this.startTime = new Date();
    },

    /**
     * Stops the timer
     */
    pause: function () {
        clearInterval(this.id);
        this.remainingTime = this.durationInMilliseconds - (new Date() - this.startTime);
    },

    /**
     * Resumes the timer
     */
    resume: function () {
        this.startTime = new Date();
        this.id = setInterval(() => {
            this.changeArtwork();
            this.start();
        }, this.remainingTime);
    },

    /**
     * Updates the current artwork
     */
    changeArtwork: function () {
        Alpine.store('objects').swapBuffers();
    }
}
