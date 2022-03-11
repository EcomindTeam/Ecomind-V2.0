<?php

    $stringdeconexao = new PDO("pgsql:host=localhost port=5432 dbname=postgres", "postgres", "alunocti", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    $conecta = pg_connect($stringdeconexao);
    
    if (!$conecta) {
        
        echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
        
        exit;
    }

    else
        
        echo "Conexão estabelecida com o banco de dados!<br><br>";
?>