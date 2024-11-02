<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Função para obter a taxa de câmbio usando a API
function obterTaxaDeCambio(string $moedaOrigem, string $moedaDestino)  {
    $client = new Client();
    $url = "https://v6.exchangerate-api.com/v6/58efd1fa9a64b73ee895f268/pair/{$moedaOrigem}/{$moedaDestino}";

    try {
        $response = $client->request('GET', $url);
        $dados = json_decode($response->getBody()->getContents(), true);

        return $dados['conversion_rate'] ?? 1.0;
    } catch (RequestException $e) {
        return 1.0;
    }
}

// Função pura para converter o valor
function converterMoeda(float $valor, string $moedaOrigem, string $moedaDestino) {
    $taxa = obterTaxaDeCambio($moedaOrigem, $moedaDestino);
    return $valor * $taxa;
}

// Função de ordem superior para converter uma lista de valores
function converterListaDeValores(array $valores, string $moedaOrigem, string $moedaDestino) {
    return array_map(fn($valor) => converterMoeda($valor, $moedaOrigem, $moedaDestino), $valores);
}
