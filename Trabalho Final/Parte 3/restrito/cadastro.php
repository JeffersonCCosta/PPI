<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastrarPaciente"])) {
    header("Location: edicao.html");
    exit();
}

if (isset($_POST["cadastrarMedico"])) {
    header("Location: cadastroMedico.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-
    4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
</head>

<body id="cadastro">
    <header>
        <img src="img/logo.png" alt="logo do site LifeTrack Pro">
        <h1>LifeTrack Pro</h1>
    </header>

    <nav>
        <a href="edicao.html">Editar Perfil Paciente</a>
        <a id="currently-active-tab" href="cadastro.php">Cadastrar</a>
        <a href="user.php">Usuários</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="container">
        <main>
            <h1>Registro de Médico</h1>

            <form class="editar" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="cadastrarMedico" value="1">

                <div class="cadastro-iten">
                    <button type="submit">Cadastrar Médico</button>
                </div>
            </form>
        </main>
    </div>


    <footer class="footer-curto">
        © Copyright 2023. All rights reserved.
    </footer>
</body>

</html>
