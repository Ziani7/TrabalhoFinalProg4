class AlertManager {
    constructor() {
        this.successAlert = document.getElementById('successAlert');
        this.initializeAlerts();
    }

    initializeAlerts() {
        document.addEventListener('DOMContentLoaded', () => {
            this.checkSuccessMessage();
        });
    }

    checkSuccessMessage() {
        const urlParams = new URLSearchParams(window.location.search);
        
        if (!urlParams.has('success') || !this.successAlert) return;
        
        this.showSuccessMessage();
    }

    showSuccessMessage() {
        this.successAlert.classList.remove('d-none');
        
        setTimeout(() => {
            this.successAlert.classList.add('d-none');
        }, 5000);
    }
}

const alertManager = new AlertManager();