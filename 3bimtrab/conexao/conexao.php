<?php
    $conecta = new PDO("pgsql:host=localhost port=5432 dbname=Ecomind", "postgres", "alunocti", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    if (!$conecta)
    {
        echo "Erro fatal: Não foi possível estabelecer conexão com o banco de dados!<br><br>";	
        exit;
    }
?>
