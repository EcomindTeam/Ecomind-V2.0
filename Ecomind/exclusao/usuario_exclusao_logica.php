<?php
include "../conexao/conexao.php";

$idusuario = $_POST['idusuario'];
$data=date('d/m/Y'); //'Y' (maiúsculo) para ano com 4 dígitos

$sql="update usuario 
set excluido = true, dataexcluido = '$data' 
WHERE idusuario = $idusuario";
//inserida a data de exclusao do produto para documentação

$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0 )
{
echo "<script type='text/javascript'>alert('Exclusão OK !!!')</script>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=exclui_usuario.php'>";
}
else
{
echo "Erro na exclusão !!!<br>";
echo pg_last_error();
echo "<a href='exclui_usuario.php'>Voltar</a>";
}
?>
