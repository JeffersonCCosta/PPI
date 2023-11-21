<?php
require_once "conexao.php";

$conn = new Conexao();

$sql = "SELECT * FROM usuarios";
$stmt = $conn->conexao->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main class="container mt-5">
        <h1>Lista de Usuários</h1>
        <table id="userTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>>
                    <th>E-mail</th>>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td>
                            <?= $usuario['cpf'] ?>
                        </td>
                        <td>
                            <?= $usuario['nome'] ?>
                        </td>
                        <td>
                            <?= $usuario['email'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button id="clearTableBtn" class="btn btn-danger mt-3">Limpar Tabela</button>

        <div class="d-flex justify-content-center">
            <form action="" method="POST">
                <input class="btn btn-primary" type="submit" value="Sair" />
            </form>
        </div>
    </main>


    <footer class="footer">
        <div class="container">
            <p>Trabalho 6 de Programação para Internet @ UFU - Jefferson Cristino da Costa</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="script.js"></script>

</body>

</html>