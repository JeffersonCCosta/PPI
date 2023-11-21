<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Conversor de Moedas</h2>

    <form action="conversor.php" method="post">
        <label for="moeda_origem">Moeda de Origem:</label>
        <select name="moeda_origem" required>
            <option value="" selected disabled>Selecione</option>
            <?php
                require_once 'conexao.php';

                $conexao = new Conexao();
                $query = $conexao->conexao->query("SELECT * FROM moeda");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row["idmoeda"]}'>{$row["nome"]}</option>";
                }
            ?>
        </select>

        <label for="moeda_destino">Moeda de Destino:</label>
        <select name="moeda_destino" required>
            <option value="" selected disabled>Selecione</option>
            <?php
                $query = $conexao->conexao->query("SELECT * FROM moeda");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row["idmoeda"]}'>{$row["nome"]}</option>";
                }
                $conexao->fecharConexao();
            ?>
        </select>

        <label for="valor">Valor a ser convertido:</label>
        <input type="number" name="valor" required>

        <button type="submit">Converter</button>
    </form>
</body>
</html>
