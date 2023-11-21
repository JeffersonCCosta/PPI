<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
    header("Location: /trabalhofinal/main/index.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    

</head>

<body id="logout">
    <header>
        <img src="img/logo.png" alt="logo do site LifeTrack Pro">
        <h1>LifeTrack Pro</h1>
    </header>

    <form action="" method="POST">
    <div class="container">
        <main>
            <h1>Sair do Sistema</h1>

            <p id="sistema">Tem certeza de que deseja sair do sistema?</p>


            <div class="sistema">
                <button type="sim">SIM</button>
                <button type="nao"><a class="nao" href="edicao.html">NÃO</a></button>
            </div>
        </main>
    </div>
    </form>
    

    <footer class="footer-curto">
        © Copyright 2023. All rights reserved.
    </footer>
</body>

</html>