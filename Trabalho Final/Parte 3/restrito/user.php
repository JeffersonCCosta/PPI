<?php
session_start();

require_once "../main/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $userId = intval($_POST['user_id']);

    if ($userId > 0) {
        $conn = new Conexao();

        if ($conn->conexao) {
            $userData = [];

            $stmt = $conn->conexao->prepare("SELECT * FROM medicos WHERE id = :userId");
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $userData = [
                    'nome' => $result['nome'],
                    'sobrenome' => $result['sobrenome'],
                    'dr_dra' => $result['dr_dra'],
                    'especialidade' => $result['especialidade'],
                    'imagem_url' => $result['imagem_url']
                ];

                header('Content-Type: application/json');
                echo json_encode($userData);
                exit;
            }

            echo json_encode(['error' => 'Usuário não encontrado']);
        } else {
            echo json_encode(['error' => 'Falha na conexão. Verifique a configuração do banco de dados.']);
        }
    } else {
        echo json_encode(['error' => 'ID de usuário inválido']);
    }
} else {
    echo json_encode(['error' => 'Requisição inválida']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="usuario">
    <header>
        <img src="img/logo.png" alt="logo do site LifeTrack Pro">
        <h1>LifeTrack Pro</h1>
    </header>

    <nav>
        <a href="edicao.html">Editar Perfil</a>
        <a href="cadastro.php">Cadastrar</a>
        <a id="currently-active-tab" href="user.php">Usuários</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="container">
        <main>
            <h2>Buscar médicos no banco:</h2>

            <form id="search-form" action="user.php" method="post">
                <div id="users-list">
                    <input type="text" id="user-search" placeholder="Buscar usuário..." required>
                </div>

                <div class="salvar">
                    <button type="submit">Pesquisar</button>
                </div>
            </form>

            <div id="search-results"></div>
        </main>
    </div>

    <script src="script.js"></script>
</body>

</html>