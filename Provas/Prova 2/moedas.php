<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $moeda_origem = $_POST["moeda_origem"];
    $moeda_destino = $_POST["moeda_destino"];
    $valor = floatval($_POST["valor"]);

    $conversor = new Conversor();
    $conversor->converterMoeda($moeda_origem, $moeda_destino, $valor);
}
?>

<?php
class Conversor {
    private $conexao;

    function __construct() {
        $this->conexao = new Conexao();
    }

    function converterMoeda($moeda_origem, $moeda_destino, $valor) {
        $query = $this->conexao->conexao->prepare("SELECT valor FROM cotacao WHERE moeda_idmoeda1 = ? AND moeda_idmoeda2 = ?");
        $query->execute([$moeda_origem, $moeda_destino]);
        $cotacao = $query->fetch(PDO::FETCH_COLUMN);

        if ($cotacao) {
            $valor_convertido = $valor * $cotacao;
            echo "{$valor} equivale a {$valor_convertido}";
        } else {
            echo "Cotação não encontrada para as moedas selecionadas.";
        }
    }
}
?>
