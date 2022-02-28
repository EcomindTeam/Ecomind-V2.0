<?php
include "../conexao/conexao.php";
$idusuario=$_POST["idusuario"];
$usuario=$_POST["usuario"];
$senha=$_POST["senha"];
$nome=$_POST["nome"];
$cpf=$_POST["cpf"];
$sql="UPDATE usuario
SET
idusuario = $idusuario,
senha = '$senha',
nome = '$nome', 
cpf = '$cpf'
WHERE idusuario = $idusuario;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0)
{
echo "<script type='text/javascript'>alert('Gravação OK !!!')</script>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=altera_usuario.php'>";
}
else	
echo "Erro na gravacao !!!<br><br>";
echo pg_last_error();
pg_close($conecta);
echo "A conexão com o banco de dados foi encerrada!"
?>
