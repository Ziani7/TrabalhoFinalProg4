// Classe para gerenciar as mensagens de erro
class ErrorHandler {
    constructor() {
        this.errorAlert = document.getElementById('errorAlert');
        this.initializeErrorHandling();
    }

    initializeErrorHandling() {
        document.addEventListener('DOMContentLoaded', () => {
            this.checkUrlErrors();
        });
    }

    checkUrlErrors() {
        const urlParams = new URLSearchParams(window.location.search);
        if (!urlParams.has('error') || !this.errorAlert) return;

        const errorType = urlParams.get('error');
        const errorMessage = this.getErrorMessage(errorType, urlParams);
        
        this.showError(errorMessage);
    }

    getErrorMessage(errorType, urlParams) {
        const errorMessages = {
            database: 'Erro ao salvar no banco de dados. O login pode já estar em uso.',
            method: 'Método de requisição inválido.',
            validation: () => {
                const msg = urlParams.get('msg');
                return msg ? decodeURIComponent(msg) : 'Erro de validação. Verifique os campos e tente novamente.';
            }
        };

        return typeof errorMessages[errorType] === 'function' 
            ? errorMessages[errorType]()
            : errorMessages[errorType] || 'Ocorreu um erro no cadastro. Por favor, tente novamente.';
    }

    showError(message) {
        this.errorAlert.textContent = message;
        this.errorAlert.classList.remove('d-none');

        // Auto-hide após 8 segundos
        setTimeout(() => {
            this.errorAlert.classList.add('d-none');
        }, 8000);
    }
}

// Inicializar o gerenciador de erros
const errorHandler = new ErrorHandler();