<?php
    $conecta = pg_connect("host=localhost port=5432 dbname=b30samaral user=b30samaral password=cti");
    if (!$conecta)
    {
        echo "Erro fatal: Não foi possível estabelecer conexão com o banco de dados!<br><br>";	
	$erro=pg_last_error();
	echo $erro;
        exit;
    }
?>
