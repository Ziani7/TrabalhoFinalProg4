document.addEventListener("DOMContentLoaded", function () {
    const inputCPF = document.getElementById('cpf');
    const inputNome = document.getElementById('nomeRes');

    inputCPF.addEventListener('blur', function () {
        const cpf = inputCPF.value.trim();

        if (cpf.length >= 11) {
            fetch('../Back/buscar_nome.php?cpf=' + cpf)
                .then(response => response.json())
                .then(data => {
                    if (data.sucesso) {
                        inputNome.value = data.nome;
                    } else {
                        inputNome.value = '';
                        alert('CPF não encontrado!');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar nome:', error);
                });
        }
    });
});
