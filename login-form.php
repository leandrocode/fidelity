<?php include('header.php'); ?>


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