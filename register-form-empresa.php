<?php include('header.php'); ?>

<?php

	$connect = mysqli_connect("localhost", "root", "", "fidelity");
	session_start();

	if(isset($_POST["register"]))
	{
		if(empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["nome"]) || empty($_POST["razao_social"]) || empty($_POST["cnpj"]) || empty($_POST["telefone"]) || empty($_POST["cep"]) || empty($_POST["rua"]) || empty($_POST["bairro"]) || empty($_POST["cidade"]) || empty($_POST["estado"]))
		{
			echo "<script> swal('Erro!', 'Campos obrigatórios!', 'error'); </script>";
		}
		else
		{
			$email = mysqli_real_escape_string($connect, $_POST["email"]);
			$nome = mysqli_real_escape_string($connect, $_POST["nome"]);
			$razao_social = mysqli_real_escape_string($connect, $_POST["razao_social"]);
			$cnpj = mysqli_real_escape_string($connect, $_POST["cnpj"]);
			$telefone = mysqli_real_escape_string($connect, $_POST["telefone"]);
			$cep = mysqli_real_escape_string($connect, $_POST["cep"]);
			$rua = mysqli_real_escape_string($connect, $_POST["rua"]);
			$numero = mysqli_real_escape_string($connect, $_POST["numero"]);
			$complemento = mysqli_real_escape_string($connect, $_POST["complemento"]);
			$bairro = mysqli_real_escape_string($connect, $_POST["bairro"]);
			$cidade = mysqli_real_escape_string($connect, $_POST["cidade"]);
			$estado = mysqli_real_escape_string($connect, $_POST["estado"]);
			$password = mysqli_real_escape_string($connect, $_POST["password"]);
			$password = md5($password);

			$query = "INSERT INTO empresas (nome, razao_social, cnpj, email, telefone, cep, rua, numero, complemento, bairro, cidade, estado, password)	VALUES('$nome', '$razao_social', '$cnpj', '$email', '$telefone', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$password')";

			if(mysqli_query($connect, $query))
			{
				echo "<script> swal('Parabéns!', '" . $nome . ", você foi cadastrado com sucesso!', 'success'); </script>";
			}
		}
		
	}
?>

<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

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
			<input type="text" class="form-control" id="cep" name="cep"
			onblur="pesquisacep(this.value);">
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