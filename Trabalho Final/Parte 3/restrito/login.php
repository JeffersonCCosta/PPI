<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="style_login.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
		  4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<main>
			<h2>Login</h2>

			<form id="login-form" method="post">
				<div class="form-floating">
					<input type="usuario" class="form-control" id="usuario" name="usuario" placeholder="">
					<label for="text">Usuário</label>
				</div>
				<div class="form-floating">
					<input type="password" class="form-control" id="password" name="password" placeholder="">
					<label for="password">Senha</label>
				</div>
				<div>
					<button type="enter" id="login-button">Entrar</button>
					<button type="return"><a class="return" href="/main/index.html">Return</button></a>
				</div>
			</form>

			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["usuario"]) || empty($_POST["password"])) {
					echo '<div class="alert alert-danger mt-3" role="alert">Preencha todos os campos.</div>';
				} else {
					$usuario = $_POST["usuario"];
					$password = $_POST["password"];

					$usuario_correto = "123";
					$password_correta = "123";

					if ($usuario === $usuario_correto && $password === $password_correta) {
						header("Location: /TrabalhoFinal/restrito/edicao.html");
					} else {
						echo '<div class="alert alert-danger mt-3" role="alert">Usuário e/ou senha inválidos.</div>';
					}
				}

			}
			?>
		</main>
	</div>

	<script src="js/script.js"></script>

</body>

</html>