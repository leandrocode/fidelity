<?php include('header.php'); ?>

<div class="register">
	<form>
		
		<div class="form-group">
			<label for="name">Nome</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>

		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id ="email" name="email">
		</div>

		<div class="form-group">
			<label for="password">Digite sua Senha</label>
			<input type="password" class="form-control" id="password" name="password">
		</div>

		<div class="form-group">
			<label for="confirmPassword">Confirme sua Senha</label>
			<input type="confirmPassword" class="form-control" id="confirmPassword" name="confirmPassword">
		</div>

		<button type="submit" class="btn btn-success">Cadastrar</button>
	</form>
</div>

<?php include('footer.php'); ?>