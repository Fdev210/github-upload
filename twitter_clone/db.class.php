<?php 

class db {

	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'root';

	//senha
	private $senha = '';

	//banco de dados
	private $database = 'twitter_clone';

	public function conecta_mysql() {

		//criar a conexão
		$con = mysqli_connect($this -> host, $this -> usuario, $this -> senha,  $this -> database);

		//ajustar o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($con, 'ut8');

		//verificar erro de conexão
		if(mysqli_connect_errno()) {
			echo 'erro ao tentar conectar o banco de dados SQL: '.mysqli_connnect_error();
		}

		return $con;
	}
}

?>