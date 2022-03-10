<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Menu de Pesquisa</title>
    <link rel="stylesheet" type="text/css" href="/samaral/3bimtrab/css/style.css">
</head>
<body>
    <!-- script foi chamado de menu.php -->
    <form class="box" method="GET" action="mostrar.php">
        <center>
            Pesquisar <input type="textbox" name="pesquisa"><br><br>
            Opções:
            <p><input type="radio" name="opcao" value="1">Início</p>
            <p><input type="radio" name="opcao" value="2">Contendo</p>
            <input type="submit" value="Pesquisar">&nbsp &nbsp
            <input type="reset" value="Limpar">
        </center>
    </form>
</body>
</html>