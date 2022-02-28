<?php

    $stringdeconexao = "host=localhost port=5432 dbname=b30samaral user=b30samaral password=cti";

    $conecta = pg_connect($stringdeconexao);
    
    if (!$conecta) {
        
        echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
        
        exit;
    }

    else
        
        echo "Conexão estabelecida com o banco de dados!<br><br>";
?>