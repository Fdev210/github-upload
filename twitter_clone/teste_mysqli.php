<?php 

require_once('db.class.php');

$sql = " SELECT * FROM usuarios ";

$objDB = new db();
$link = $objDB -> conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){
	$dados_usuario = array();
								      //também: MYSQLI_NUM, MYSQLY_BOTH
	while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){ 

		$dados_usuario[] = $linha;

	}

	foreach($dados_usuario as $usuario){
		var_dump($usuario);
		echo'<br/>';

	}

} else {
	echo 'Erro na execução da consulta, favor entrar em contato com o administrador do site';
}

?>