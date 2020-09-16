<?php
require_once('db.class.php');

$usuario =  $_GET["usuario"];
echo '<br />';
$email = $_GET["email"];
echo '<br />';
$senha = md5($_GET["senha"]);

$objDB = new db();
$link = $objDB -> conecta_mysql();

$usuario_existe = false;
$email_existe = false;


//verificar se usuário já existe.
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";
if($resultado_id = mysqli_query($link, $sql)) {

	$dados_usuario = mysqli_fetch_array($resultado_id);

	if(isset($dados_usuario['usuario'])){
		$usuario_existe = true;
	}

} else{
	echo 'Erro ao tentar localizar o registro de usuário';
}

//verificar se e-mail já existe
$sql = "SELECT * FROM usuarios WHERE email = '$email' ";
if($resultado_id = mysqli_query($link, $sql)) {

	$dados_usuario = mysqli_fetch_array($resultado_id);

	if(isset($dados_usuario['email'])){
		$email_existe = true;
	}

} else{
	echo 'Erro ao tentar localizar o registro de email';
}

if($usuario_existe || $email_existe){
	header('Location: inscrevase.php');
}

die();

$sql = " insert into usuarios(usuario, email, senha) values('$usuario', '$email', '$senha') ";

//executar a query
if(mysqli_query($link, $sql)){
	echo 'usuario registrado com sucesso!';
} else {
	echo 'Erro ao registrar usuario';
}


?>