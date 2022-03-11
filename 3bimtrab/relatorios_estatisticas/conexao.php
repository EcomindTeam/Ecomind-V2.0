<?php
	//Conecta com o PostgreSQL
    //
    // É preciso alterar o nome do banco, usuário e senha
    //
	$conecta = new PDO("pgsql:host=localhost port=5432 dbname=postgres", "postgres", "alunocti", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

	if (!$conecta)
	{
		echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
		exit;
	}
?>
