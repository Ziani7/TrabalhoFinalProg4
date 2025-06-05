document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    const validateDates = () => {
        const inicio = document.getElementById('dateInicio')?.value;
        const fim = document.getElementById('dateFinal')?.value;
        const dataAtividade = document.getElementById('date')?.value;

        document.querySelectorAll('.date-error').forEach(el => el.remove());

        if (inicio && fim) {
            const inicioDate = new Date(inicio);
            const fimDate = new Date(fim);

            if (fimDate < inicioDate) {
                const errorMsg = document.createElement('div');
                errorMsg.className = 'date-error text-danger mt-1';
                errorMsg.textContent = 'A data final não pode ser anterior à data inicial.';
                document.getElementById('dateFinal').parentNode.appendChild(errorMsg);
                return false;
            }
        }

        if (dataAtividade) {
            const hoje = new Date();
            hoje.setHours(0, 0, 0, 0);
            const dataSelecionada = new Date(dataAtividade);

            if (dataSelecionada < hoje) {
                const errorMsg = document.createElement('div');
                errorMsg.className = 'date-error text-danger mt-1';
                errorMsg.textContent = 'A data da atividade não pode estar no passado.';
                document.getElementById('date').parentNode.appendChild(errorMsg);
                return false;
            }
        }

        return true;
    };

    const dateInicio = document.getElementById('dateInicio');
    const dateFinal = document.getElementById('dateFinal');
    const dateAtividade = document.getElementById('date');

    if (dateInicio) dateInicio.addEventListener('change', validateDates);
    if (dateFinal) dateFinal.addEventListener('change', validateDates);
    if (dateAtividade) dateAtividade.addEventListener('change', validateDates);

    form.addEventListener('submit', (event) => {
        if (!validateDates()) {
            event.preventDefault();
        }
    });
});
