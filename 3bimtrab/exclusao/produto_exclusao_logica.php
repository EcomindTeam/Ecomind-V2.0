<?php
include "../conexao/conexao.php";

$idproduto = $_POST['idproduto'];
$data=date('d/m/Y'); //'Y' (maiúsculo) para ano com 4 dígitos

$sql="update produto 
set excluido = true, dataexcluido = '$data' 
WHERE idproduto = $idproduto";
//inserida a data de exclusao do produto para documentação

$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0 )
{
echo "<script type='text/javascript'>alert('Exclusão OK !!!')</script>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=exclui_produto.php'>";
}
else
{
echo "Erro na exclusão !!!<br>";
echo "<a href='exclui_produto.php'>Voltar</a>";
}
?>
