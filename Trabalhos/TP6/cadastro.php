<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="" method="POST" class="col-sm-12 col-md-8 col-xl-6 container center box-input">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="111111111">
            <label for="floatingInput">CPF</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Nome">
            <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
            <label for="floatingPassword">Senha</label>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <input class="btn btn-primary" type="submit" value="Cadastrar" />
        </div>
    </form>
    <div class="d-flex justify-content-center mt-3">
        <form action="login.php" method="post">
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
    </div>

    <?php
    session_start();

    require_once "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $erro = false;

        // Verificar se os campos obrigatórios estão preenchidos
        $camposObrigatorios = ["usuario", "nome", "email", "senha"];

        foreach ($camposObrigatorios as $campo) {
            if (empty($_POST[$campo])) {
                $erro = true;
                echo '<div class="alert alert-danger mt-3" role="alert">Preencha todos os campos obrigatórios.</div>';
                break; // Se um campo estiver vazio, não é necessário verificar os outros
            }
        }

        if (!$erro) {
            $conn = new Conexao();

            $verificarUsuarioSql = "SELECT * FROM usuarios WHERE cpf = ?";
            $verificarUsuarioStmt = $conn->conexao->prepare($verificarUsuarioSql);
            $verificarUsuarioStmt->bindParam(1, $_POST["usuario"]);
            $verificarUsuarioStmt->execute();

            if ($verificarUsuarioStmt->rowCount() > 0) {
                echo '<div class="alert alert-danger mt-3" role="alert">Usuário já cadastrado. Escolha outro nome de usuário.</div>';
            } else {
                $cadastrarUsuarioSql = "INSERT INTO usuarios (cpf,nome, email, senha) VALUES (?, ?, ?, ?)";
                $cadastrarUsuarioStmt = $conn->conexao->prepare($cadastrarUsuarioSql);

                $cadastrarUsuarioStmt->bindParam(1, $_POST["usuario"]);
                $cadastrarUsuarioStmt->bindParam(2, $_POST["nome"]);
                $cadastrarUsuarioStmt->bindParam(3, $_POST["email"]);
                $cadastrarUsuarioStmt->bindParam(4, $_POST["senha"]);
                $cadastrarUsuarioStmt->execute();

                echo '<div class="alert alert-success mt-3" role="alert">Cadastro realizado com sucesso. Faça o login agora.</div>';
            }
        }
    }
    ?>

    <footer class="footer">
        <div class="container">
            <p>Trabalho 6 de Programação para Internet @ UFU - Jefferson Cristino da Costa</p>
        </div>
    </footer>
</body>

</html>