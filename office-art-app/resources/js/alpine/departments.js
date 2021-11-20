export const departments = {
    departments: [],
    displayingDepartmentId: null,

    /**
     * Gets the current department being displayed
     */
    get displayingDepartment() {
        return this.objects[this.displayingBufferIndex];
    },

    /**
     * Loads the departments list
     */
    async loadDepartments() {
        const response = await fetch('/api/departments');

        if (!response.ok) {
            return Alpine.store('errors').error('Error fetching departments list:', `${response.status} (${response.statusText})`);
        }

        this.departments = await response.json();

        // set a random department to be displayed
        this.displayingDepartmentId = this.departments[Math.floor(Math.random() * this.departments.length)].id;
    }

}
