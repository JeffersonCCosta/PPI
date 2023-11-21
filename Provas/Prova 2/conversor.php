<?php
require_once 'conexao.php';

class Conversor {
    private $conexao;

    function __construct() {
        $this->conexao = new Conexao();
    }

    function converterMoeda($valor, $moedaOrigem, $moedaDestino) {
        $query = $this->conexao->conexao->prepare("SELECT valor FROM cotacao WHERE moeda_idmoeda1 = :moedaOrigem AND moeda_idmoeda2 = :moedaDestino");
        $query->bindParam(':moedaOrigem', $moedaOrigem, PDO::PARAM_INT);
        $query->bindParam(':moedaDestino', $moedaDestino, PDO::PARAM_INT);
        $query->execute();
        $cotacao = $query->fetch(PDO::FETCH_COLUMN);

        if ($cotacao) {
            $valor_convertido = $valor * $cotacao;
        
            $simboloOrigem = $this->obterSimboloMoeda($moedaOrigem);
            $simboloDestino = $this->obterSimboloMoeda($moedaDestino);
        
            echo "<div class='resultado'>";
            echo "<p>{$simboloOrigem} {$valor} equivale a {$simboloDestino} {$valor_convertido}</p>";
            echo "</div>";
        } else {
            echo "<div class='erro'>";
            echo "<p>Cotação não encontrada para as moedas selecionadas.</p>";
            echo "</div>";
        }        
    }

    private function obterSimboloMoeda($idMoeda) {
        $query = $this->conexao->conexao->prepare("SELECT simbolo FROM moeda WHERE idmoeda = :idMoeda");
        $query->bindParam(':idMoeda', $idMoeda, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_COLUMN);
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'];
    $moedaOrigem = $_POST['moeda_origem'];
    $moedaDestino = $_POST['moeda_destino'];

    $conversor = new Conversor();
    $conversor->converterMoeda($valor, $moedaOrigem, $moedaDestino);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style-conversor.css">
</head>
<body>
    <button type="submit"><a class="link" href="index.php">Converter outro valor</a></button>
    
</body>
</html>
