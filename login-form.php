<?php include('header.php'); ?>

<?php

$connect = mysqli_connect("localhost", "root", "", "fidelity");
session_start();

if(isset($_POST['btn-entrar'])):
	echo "CLICOU";
endif;

?>

<div class="login">
	<form>

		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id ="email" name="email" placeholder="Digite seu E-mail">
		</div>

		<div class="form-group">
			<label for="password">Senha</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Digite sua Senha">
		</div>

		<button type="submit" name="btn-entrar" class="btn btn-outline-light">Entrar</button>
	</form>
</div>

<?php include('footer.php'); ?>