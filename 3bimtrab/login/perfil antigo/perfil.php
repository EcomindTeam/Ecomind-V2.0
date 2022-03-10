<?php
    session_start();
    if (!isset($_SESSION["logou"]))
    {
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.php'>";
        exit;
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
</head>
<body>
    <h2>Perfil do Usuário</h2>
    
    <?php
	 include "../conexao/conexao.php";
	 $email = $_SESSION['email'];
         $sql="SELECT * FROM usuario WHERE excluido is false and email = '".$email."'ORDER BY idusuario;";
         $resultado= pg_query($conecta, $sql);
         $qtde=pg_num_rows($resultado);
         if ($qtde > 0)
         {
         	echo "<br><br><strong>Usuários Encontrados</strong><br><br><br>";
                        $linha=pg_fetch_array($resultado);
                        echo "ID do Usuário........: ".$linha['idusuario']."<br>";
                        echo "Login.....................: ".$linha['usuario']."<br>";
                        echo "Senha....................: ".$linha['senha']."<br>";
                        echo "Nome................: ".$linha['nome']."<br>";
                        echo "CPF....: ".$linha['cpf']."<br>";

                        echo "<a href='/samaral/3bimtrab/alteracao/form_altera_usuario.php?idusuario=".$linha[idusuario]."'> Alterar</a><br><br>"; 
          }else
           	echo "Não foi encontrado nenhum usuario !!!<br><br>";
                pg_close($conecta);
                    //echo "A conexão com o banco de dados foi encerrada!"

    ?>
    
    <form action="session_processa_logoffsimples.php" method="POST">
        <center>
            Sair
            <input type="submit" value="Logout">
        </center>
    </form>
</body>
</html>