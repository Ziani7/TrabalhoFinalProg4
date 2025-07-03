document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    const validateTimes = () => {
        const inicio = document.getElementById('horaInicio')?.value;
        const fim = document.getElementById('horaFinal')?.value;

        document.querySelectorAll('.time-error').forEach(el => el.remove());

        if (inicio && fim) {
            const [inicioHoras, inicioMinutos] = inicio.split(':').map(Number);
            const [fimHoras, fimMinutos] = fim.split(':').map(Number);

            const inicioDate = new Date();
            inicioDate.setHours(inicioHoras, inicioMinutos, 0, 0);

            const fimDate = new Date();
            fimDate.setHours(fimHoras, fimMinutos, 0, 0);

            if (fimDate < inicioDate) {
                const errorMsg = document.createElement('div');
                errorMsg.className = 'time-error text-danger mt-1';
                errorMsg.textContent = 'A hora final não pode ser anterior à hora inicial.';
                document.getElementById('horaFinal').parentNode.appendChild(errorMsg);
                return false;
            }
        }

        return true;
    };

    const horaInicio = document.getElementById('horaInicio');
    const horaFinal = document.getElementById('horaFinal');

    if (horaInicio) horaInicio.addEventListener('change', validateTimes);
    if (horaFinal) horaFinal.addEventListener('change', validateTimes);

    form.addEventListener('submit', (event) => {
        if (!validateTimes()) {
            event.preventDefault();
        }
    });
});
