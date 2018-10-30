<?php include('header.php'); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "fidelity";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "<script> swal('Erro!', 'Falha na conexão com o Banco de Dados!', 'error'); </script>";
endif;
?>

<?php include('footer.php'); ?>