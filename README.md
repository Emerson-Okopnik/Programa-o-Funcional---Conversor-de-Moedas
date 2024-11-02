Conversor de Moedas
Este é um projeto simples de conversor de moedas que permite ao usuário converter valores entre diferentes moedas. A aplicação utiliza programação funcional para realizar as conversões de forma precisa e imutável.

Funcionalidades
Entrada de dados do valor a ser convertido e seleção de moeda de origem e destino.
Utilização de uma API para obter as taxas de câmbio em tempo real.
Interface web interativa para entrada de dados e exibição de resultados.

Programação Funcional
O projeto aplica os conceitos de programação funcional da seguinte forma:

Funções Puras: Todas as funções de conversão são puras, o que significa que elas não alteram o estado externo nem dependem de variáveis globais.
converterMoeda: Converte um valor único aplicando a taxa de câmbio.
obterTaxaDeCambio: Obtém a taxa de câmbio entre duas moedas a partir de uma API externa.

Imutabilidade: Os valores de entrada não são alterados diretamente. A função converterMoeda e converterListaDeValores retornam novos valores em vez de modificar os valores originais.

Funções de Ordem Superior: A função converterListaDeValores utiliza array_map para aplicar a conversão a uma lista de valores, demonstrando o uso de uma função de ordem superior.

Estrutura de Arquivos

index.php: Contém o formulário e a interface para entrada de dados, bem como o código para exibir os resultados.
main.php: Inclui as funções para a lógica de conversão de moedas.
moedas.json: Arquivo JSON com a lista de moedas suportadas, carregado na interface para seleção de moeda.
script.js: Arquivo JavaScript para carregar a lista de moedas na interface.

Instalação e Execução
Pré-requisitos
PHP 7.4 ou superior
Composer para gerenciar dependências
Servidor HTTP local como Apache
Guzzle para fazer requisições HTTP
