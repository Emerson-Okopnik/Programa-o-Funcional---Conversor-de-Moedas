
async function carregarMoedas() {
    try {
        const response = await fetch('moedas.json');
        const data = await response.json();
        const moedas = data.supported_codes;

        const moedaOrigem = document.getElementById('moedaOrigem');
        const moedaDestino = document.getElementById('moedaDestino');

        moedas.forEach(([codigo, nome]) => {
            const optionOrigem = document.createElement('option');
            optionOrigem.value = codigo;
            optionOrigem.textContent = `${nome} (${codigo})`;

            const optionDestino = optionOrigem.cloneNode(true);

            moedaOrigem.appendChild(optionOrigem);
            moedaDestino.appendChild(optionDestino);
        });
    } catch (error) {
        console.error('Erro ao carregar as moedas:', error);
    }
}

window.onload = carregarMoedas;
