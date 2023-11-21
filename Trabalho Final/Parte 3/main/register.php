<?php
session_start();

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $erro = false;

    // Verificar se os campos obrigatórios estão preenchidos
    $camposObrigatorios = ["nome", "email", "idade", "sus", "genero"];

    foreach ($camposObrigatorios as $campo) {
        if (empty($_POST[$campo])) {
            $erro = true;
            echo '<div class="alert alert-danger mt-3" role="alert">Preencha todos os campos obrigatórios.</div>';
            break; // Se um campo estiver vazio, não é necessário verificar os outros
        }
    }

    if (!$erro) {
        $conn = new Conexao();

        // Inserir dados na tabela 'consulta'
        $inserirConsultaSql = "INSERT INTO consulta (nome, email, idade, sus, genero, objetivo, exercicio, alimentacao, dieta_especifica, refeicoes_diarias, alimentos_processados, consumo_alcool, tabagismo, tipo_medico) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $inserirConsultaStmt = $conn->conexao->prepare($inserirConsultaSql);

        $inserirConsultaStmt->bindParam(1, $_POST["nome"]);
        $inserirConsultaStmt->bindParam(2, $_POST["email"]);
        $inserirConsultaStmt->bindParam(3, $_POST["idade"]);
        $inserirConsultaStmt->bindParam(4, $_POST["sus"]);
        $inserirConsultaStmt->bindParam(5, $_POST["genero"]);
        $inserirConsultaStmt->bindParam(6, $_POST["objetivo"]);
        $inserirConsultaStmt->bindParam(7, $_POST["exercicio"]);
        $inserirConsultaStmt->bindParam(8, $_POST["alimentacao"]);
        $inserirConsultaStmt->bindParam(9, $_POST["dieta-especifica"]);
        $inserirConsultaStmt->bindParam(10, $_POST["refeicoes-diarias"]);
        $inserirConsultaStmt->bindParam(11, $_POST["alimentos-processados"]);
        $inserirConsultaStmt->bindParam(12, $_POST["consumo-alcool"]);
        $inserirConsultaStmt->bindParam(13, $_POST["tabagismo"]);
        $inserirConsultaStmt->bindParam(14, $_POST["tipo-medico"]);

        $inserirConsultaStmt->execute();

        echo '<div class="alert alert-success mt-3" role="alert">Consulta registrada com sucesso.</div>';

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Log</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
      4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <img src="imagens/logo.png" alt="logo do site LifeTrack Pro">
        <h1>LifeTrack Pro</h1>
    </header>

    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.html">Home</a>
        <a class="navbar-brand" href="about.html">About</a>
        <a class="navbar-brand" href="items.html">Lista de Especialistas</a>
        <a class="navbar-brand" id="currently-active-tab" href="register.php">Registro de Consulta</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/TrabalhoFinal/restrito/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="" method="POST" class="container">
        <main>
            <h1>Registro de Consulta</h1>

            <form>
                <div class="form-floating">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="" required>
                    <label for="text">Nome</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="idade" name="idade" placeholder="" required>
                    <label for="number">Idade</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="sus" name="sus" placeholder="" required>
                    <label for="number">Nº SUS</label>
                </div>

                <div>
                    <label for="genero">Gênero:</label>
                    <select id="option" name="genero">

                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="objetivo" name="objetivo" rows="4" placeholder="">
                    <label for="objetivo">Objetivos de Saúde</label>
                </div>

                <br>

                <div>
                    <label for="exercicio">Faz exercício regularmente?</label>
                    <input type="radio" id="exercicio-sim" name="exercicio" value="sim">
                    <label for="exercicio-sim">Sim</label>
                    <input type="radio" id="exercicio-nao" name="exercicio" value="nao">
                    <label for="exercicio-nao">Não</label>
                </div>

                <br>

                <div>
                    <label for="alimentacao">Você se alimenta saudavel?</label>
                    <input type="radio" id="alimentacao-sim" name="alimentacao" value="sim">
                    <label for="alimentacao-sim">Sim</label>
                    <input type="radio" id="alimentacao-nao" name="alimentacao" value="nao">
                    <label for="alimentacao-nao">Não</label>
                </div>

                <br>

                <div class="form-floating">
                    <input type="text" class="form-control" id="dieta-especifica" name="dieta-especifica"
                        placeholder="">
                    <label for="dieta-especifica">Você segue alguma dieta específica? (paleo, cetogênica, etc.)</label>
                </div>

                <div class="form-floating">
                    <input type="number" class="form-control" id="refeicoes-diarias" name="refeicoes-diarias"
                        placeholder="">
                    <label for="refeicoes-diarias">Quantas refeições você faz por dia?</label>
                </div>

                <div>
                    <label for="alimentos-processados">Com que frequência você consome alimentos processados?</label>
                    <select id="option" name="alimentos-processados">
                        <option value="nunca">Nunca</option>
                        <option value="raramente">Raramente</option>
                        <option value="às vezes">Às vezes</option>
                        <option value="frequentemente">Frequentemente</option>
                    </select>
                </div>

                <div>
                    <label for="consumo-alcool">Você consome bebidas alcoólicas regularmente?</label>
                    <input type="radio" id="consumo-alcool-sim" name="consumo-alcool" value="sim">
                    <label for="consumo-alcool-sim">Sim</label>
                    <input type="radio" id="consumo-alcool-nao" name="consumo-alcool" value="nao">
                    <label for="consumo-alcool-nao">Não</label>
                </div>

                <br>

                <div>
                    <label for="tabagismo">Você fuma?</label>
                    <input type="radio" id="tabagismo-sim" name="tabagismo" value="sim">
                    <label for="tabagismo-sim">Sim</label>
                    <input type="radio" id="tabagismo-nao" name="tabagismo" value="nao">
                    <label for="tabagismo-nao">Não</label>
                </div>

                <br>

                <div>
                    <label for="tipo-medico">Tipo de Médico:</label>
                    <select id="option" name="tipo-medico">
                        <option value="Psiquiatra">Psiquiatra</option>
                        <option value="Nutricionista">Nutricionista</option>
                        <option value="Assistente Social">Assistente Social</option>
                        <option value="Cardiologista">Cardiologista</option>
                        <option value="Enfermeiro">Enfermeiro</option>
                        <option value="Terapeuta">Terapeuta</option>
                    </select>
                </div>

                <div class="submit">
                    <button type="submit">Marcar consulta</button>
                </div>

            </form>
        </main>
    </form>

    <footer class="footer-longo">
        © Copyright 2023. All rights reserved.
    </footer>
</body>

</html>