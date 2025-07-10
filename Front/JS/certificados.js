function gerarCertificados(id) {
    const output = document.getElementById('output');
    output.style.display = 'block';
    output.innerHTML = '⏳ Iniciando geração dos certificados...\n';

    fetch(`../Back/gerarCertificado.php?id=${id}`)
        .then(response => {
            const reader = response.body.getReader();
            const decoder = new TextDecoder("utf-8");

            function readChunk() {
                return reader.read().then(({ done, value }) => {
                    if (value) {
                        const text = decoder.decode(value);
                        output.innerHTML += text;
                        output.scrollTop = output.scrollHeight;
                    }

                    if (done) {
                        output.innerHTML += '\n✅ Certificados gerados e enviados com sucesso!';
                        return;
                    }

                    return readChunk();
                });
            }

            return readChunk();
        })
        .catch(error => {
            output.innerHTML += `❌ Erro na requisição: ${error}`;
        });
}
