<?php
    $conecta = new PDO("pgsql:host=localhost port=5432 dbname=b30samaral", "user=b30samaral", "password=cti", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    if (!$conecta)
    {
        echo "Erro fatal: Não foi possível estabelecer conexão com o banco de dados!<br><br>";	
        exit;
    }
?>
