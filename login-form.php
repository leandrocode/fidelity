<?php include('header.php'); ?>

<?php

require_once 'db_connect.php';
session_start();

if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['email']);
	$senha = mysqli_escape_string($connect, $_POST['password']);

	if(empty($email) or empty($password)):
		$erros[] = "<li> O campo email/senha precisa ser preenchido </li>";
	else:
	
		$sql = "SELECT login FROM users WHERE login = '$email'";
		$resultado = mysqli_query($connect, $sql);		

		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);       
		$sql = "SELECT * FROM users WHERE login = '$email' AND senha = '$password'";

		$resultado = mysqli_query($connect, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: home.php');
			else:
				$erros[] = "<li> Usuário e senha não conferem </li>";
			endif;

		else:
			$erros[] = "<li> Usuário inexistente </li>";
		endif;

	endif;

endif;
?>

<div class="login">
<img src="images/logo_fidelity.png" class="figure-img img-fluid rounded">
<br>
	<form>
	
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id ="email" name="email" placeholder="Digite seu E-mail">
		</div>

		<div class="form-group">
			<label for="password">Senha</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Digite sua Senha">
		</div>

		<a class="btn btn-danger" href="index.php" role="button">Voltar</a>
		<button type="submit" class="btn btn-success">Entrar</button>
		
	</form>
</div>

<?php include('footer.php'); ?>