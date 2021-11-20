export const errors = {
    hasError: false,
    error(...message) {
        console.error(...message);
        this.hasError = true;
    }
}