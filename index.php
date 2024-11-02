<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Conversor de Moedas</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php">
                            <div class="form-group">
                                <label for="valores">Lista de Valores (separados por vírgula)</label>
                                <input type="text" class="form-control" id="valores" name="valores" placeholder="Exemplo: 10,20,30">
                            </div>
                            <div class="form-group">
                                <label for="moedaOrigem">Moeda de Origem</label>
                                <select class="form-control" id="moedaOrigem" name="moedaOrigem" required>
                                    <option>Escolha uma moeda.</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="moedaDestino">Moeda de Destino</label>
                                <select class="form-control" id="moedaDestino" name="moedaDestino" required>
                                    <option>Escolha uma moeda.</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Converter</button>
                        </form>                            
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            require 'main.php';
                            
                            $moedaOrigem = $_POST['moedaOrigem'];
                            $moedaDestino = $_POST['moedaDestino'];
                            $valores = isset($_POST['valores']) ? explode(',', $_POST['valores']) : [];

                            if (!empty($valores)) {
                                $valoresNumericos = array_filter($valores, 'is_numeric');
                                $valoresConvertidos = converterListaDeValores($valoresNumericos, $moedaOrigem, $moedaDestino);

                                echo '<div class="alert alert-info mt-3">';
                                echo '<strong>Valores convertidos:</strong> ' . implode(', ', array_map(fn($v) => number_format($v, 2), $valoresConvertidos));
                                echo '</div>';
                            }  else {
                                echo '<div class="alert alert-danger mt-3">';
                                echo 'Valor inválido. Por favor, insira um valor numérico e positivo.';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
