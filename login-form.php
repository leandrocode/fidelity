<?php include('header.php'); ?>

<?php

require_once 'db_connect.php';
session_start();

if(isset($_POST['email'])) {

	$email = mysqli_escape_string($connect, $_POST['email']);
	$password = mysqli_escape_string($connect, $_POST['password']);

	if(empty($email) || empty($password)) {
		$erros = "<li> O campo email/senha precisa ser preenchido </li>";
	} else {
		$sql_users = "SELECT email FROM users WHERE email = '$email'";
		$user_results = mysqli_query($connect, $sql_users);	
		
		$sql_companies = "SELECT email FROM companies WHERE email = '$email'";
		$company_results = mysqli_query($connect, $sql_companies);
	
		if(mysqli_num_rows($user_results) > 0 || mysqli_num_rows($company_results) > 0) {
			$password = md5($password);       
			
			$sql_users = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$user_results = mysqli_query($connect, $sql_users);
			
			$sql_companies = "SELECT * FROM companies WHERE email = '$email' AND password = '$password'";
			$company_results = mysqli_query($connect, $sql_companies);
			// var_dump($password);
			// die();
			// LOGIN DE USUÁRIO
			if(mysqli_num_rows($user_results) == 1) {
				$data = mysqli_fetch_array($user_results);
				mysqli_close($connect);
				$_SESSION['is_company'] = false;
				$_SESSION['logged'] = true;
				$_SESSION['id_user'] = $data['id'];
				header('Location: home.php');
			} elseif (mysqli_num_rows($company_results) == 1) {
				$data = mysqli_fetch_array($company_results);
				mysqli_close($connect);
				$_SESSION['is_company'] = true;
				$_SESSION['logged'] = true;
				$_SESSION['id_user'] = $data['id'];
				header('Location: home.php');
			} else {
				$erros = "<li> Usuário e senha não conferem </li>";
			}
		} else {
			$erros = "<li> Usuário inexistente </li>";
		}

	}
}

?>

<div class="img-login"><img src="images/logo_fidelity.png" class="figure-img img-fluid rounded"></div>
<div class="login">

<br>
	<form method="POST">
	
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail">
		</div>

		<div class="form-group">
			<label for="password">Senha</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Digite sua Senha">
		</div>

		<a class="btn btn-danger" href="index.php" role="button">Voltar</a>
		<button type="submit" class="btn btn-success" value="btn-entrar">Entrar</button>
		
		<div>
			<ul>
				<?php echo isset($erros) ? $erros : ""; ?>
			</ul>
		</div>
	</form>
</div>

<?php include('footer.php'); ?>