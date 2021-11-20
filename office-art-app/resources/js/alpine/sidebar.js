export const sidebar = {
    isOpen: false,
    toggle() {
        this.isOpen = !this.isOpen;
        this.isOpen
            ? Alpine.store('timer').pause()
            : Alpine.store('timer').resume();
    }
}
