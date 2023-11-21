<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <main class="container mt-5">
        <h1 class="mb-4">Login</h1>

        <form action="" method="POST" class="col-sm-12 col-md-8 col-xl-6 container center box-input">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="CPF">
                <label for="floatingInput">CPF</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                <label for="floatingPassword">Senha</label>
            </div>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Entrar" />
            </div>
        </form>

        <div class="d-flex justify-content-center mt-3">
            <form action="cadastro.php" method="post">
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </form>
        </div>

        <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty($_POST["usuario"]) || empty($_POST["senha"])) {
                echo '<div class="alert alert-danger mt-3" role="alert">Preencha todos os campos.</div>';
            } else {
                require_once "conexao.php";
                require_once "UsuarioEntidade.php";

                $conn = new Conexao();

                $sql = "SELECT * FROM usuarios WHERE cpf = ? and senha = ?";
                $stmt = $conn->conexao->prepare($sql);

                $stmt->bindParam(1, $_POST["usuario"]);
                $stmt->bindParam(2, $_POST["senha"]);

                $resultado = $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    $usuario = new UsuarioEntidade();

                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                        $usuario->setCpf($rs->cpf);
                        $usuario->setNome($rs->nome);
                    }

                    $_SESSION["login"] = "1";
                    $_SESSION["usuario"] = $usuario;
                    header("Location: home.php");
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Usuário e/ou senha inválidos.</div>';
                }
            }
        }
        ?>

    </main>

    <footer class="footer">
        <div class="container">
            <p>Trabalho 6 de Programação para Internet @ UFU - Jefferson Cristino da Costa</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>