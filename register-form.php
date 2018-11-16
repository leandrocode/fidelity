<?php include('header.php'); ?>

<?php

	require_once 'db_connect.php';
	session_start();

	if(isset($_POST["register"]))
	{
		if(empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["username"]))
		{
			echo "<script> swal('Erro!', 'Todos os campos são obrigatórios!', 'error'); </script>";
		}
		else
		{
			$email = mysqli_real_escape_string($connect, $_POST["email"]);
			$username = mysqli_real_escape_string($connect, $_POST["username"]);
			$password = mysqli_real_escape_string($connect, $_POST["password"]);
			$password = md5($password);

			$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";

			if(mysqli_query($connect, $query))
			{
				echo "<script> swal('Parabéns!', '" . $username . ", você foi cadastrado com sucesso!', 'success'); </script>";
			}
		}
		
	}
?>
<div class="img-logo"><img src="images/logo_fidelity.png" class="figure-img img-fluid rounded"></div>
<div class="register-user">

<br>
	<form method="POST">
		
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="username">Nome</label>
			<input type="text" class="form-control" id="username" name="username">
		</div>

		<div class="form-group col-md-6">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id ="email" name="email">
		</div>
		</div>

		<div class="form-row">
		<div class="form-group col-md-6">
			<label for="password">Digite sua Senha</label>
			<input type="password" class="form-control" id="password" name="password">
		</div>

		<div class="form-group col-md-6">
			<label for="confirmPassword">Confirme sua Senha</label>
			<input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
		</div>
		</div>

		<a class="btn btn-danger" href="index.php" role="button">Voltar</a>
		<button type="submit" name="register" class="btn btn-success">Cadastrar</button>
		
	</form>
</div>

<?php include('footer.php'); ?>