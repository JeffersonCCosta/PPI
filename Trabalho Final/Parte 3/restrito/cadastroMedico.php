<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["voltar"])) {
    header("Location: cadastro.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-
    4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
</head>
<body id="edicao">
    <header>
        <img src="img/logo.png" alt="logo do site LifeTrack Pro">
        <h1>LifeTrack Pro</h1>
    </header>
    
    <div class="container">
        <main>
            <h1>Editar Perfil Médico</h1>

            <form class="editar" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" placeholder="">
                    <label for="text">Nome</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" placeholder="">
                    <label for="text">Email</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" name="vacinas" placeholder="">
                    <label for="number">Matrícula</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" name="vacinas" placeholder="">
                    <label for="number">CRM</label>
                </div>

                <div class="cadastro-foto">
                    <input type="file" name="profile-picture" accept="image/*">
                </div>

                <div class="salvar">
                    <button type="salvar" name="salvar">Salvar Alterações</button>
                    <button type="deletar" name="deletar">Excluir Conta</button>
                </div>

                <div class="salvar">
                    <button type="deletar" name="voltar">Voltar</button>
                </div>
            </form>
        </main>
    </div>

    <footer class="footer-curto">
        © Copyright 2023. All rights reserved.
    </footer>
</body>
</html>
