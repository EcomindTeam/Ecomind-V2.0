<?php

   session_start();

    include "../conexao/conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql="SELECT * FROM usuario WHERE excluido is false and email = '".$email."' and senha='".$senha."' ORDER BY idusuario;";
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);

    if ($qtde > 0)
    {
	$linha = pg_fetch_array($resultado);

	    $_SESSION['email'] = $email;
        $_SESSION['logou'] = true;
        $_SESSION['idusuario'] = $linha['idusuario'];
	    $_SESSION['nome'] = $linha['nome'];
    }
    else {
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/samaral/3bimtrab/login/perfil.php'>";
        echo "<script type='text/javascript'>alert('Email ou senha incorretos !!!')</script>";
    }

    pg_close($conecta);
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/samaral/3bimtrab/login/perfil.php'>";
?>