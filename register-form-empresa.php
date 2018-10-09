<?php include('header.php'); ?>

<?php

	$connect = mysqli_connect("localhost", "root", "", "fidelity");
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

<div class="register">
<img src="images/logo_fidelity.png" class="figure-img img-fluid rounded">
<br>
	<form method="POST">
		
        <div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome">
		</div>
            
		<div class="form-group">
			<label for="razao_social">Razão Social</label>
			<input type="text" class="form-control" id="razao_social" name="razao_social">
		</div>

        <div class="form-group">
			<label for="cnpj">CNPJ</label>
			<input type="text" class="form-control" id="cnpj" name="cnpj">
		</div>
        
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id ="email" name="email">
		</div>

        <div class="form-group">
			<label for="telefone">Telefone</label>
			<input type="text" class="form-control" id="telefone" name="telefone">
		</div>

        <div class="form-group">
			<label for="cep">CEP</label>
			<input type="text" class="form-control" id="cep" name="cep">
		</div>

        <div class="form-group">
			<label for="rua">Rua</label>
			<input type="text" class="form-control" id="rua" name="rua">
		</div>

        <div class="form-group">
			<label for="numero">Número</label>
			<input type="text" class="form-control" id="numero" name="numero">
		</div>

        <div class="form-group">
			<label for="complemento">Complemento</label>
			<input type="text" class="form-control" id="complemento" name="complemento">
		</div>

        <div class="form-group">
			<label for="bairro">Bairro</label>
			<input type="text" class="form-control" id="bairro" name="bairro">
		</div>

        <div class="form-group">
			<label for="cidade">Cidade</label>
			<input type="text" class="form-control" id="cidade" name="cidade">
		</div>

        <div class="form-group">
			<label for="estado">Estado</label>
			<input type="text" class="form-control" id="estado" name="estado">
		</div>

		<div class="form-group">
			<label for="password">Digite sua Senha</label>
			<input type="password" class="form-control" id="password" name="password">
		</div>

		<div class="form-group">
			<label for="confirmPassword">Confirme sua Senha</label>
			<input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
		</div>

		<button type="submit" name="register" class="btn btn-success">Cadastrar</button>
		<br>
		<br>
		<a href="index.php">Voltar</a>
	</form>
</div>

<?php include('footer.php'); ?>