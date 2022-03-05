<?php
include "../conexao/conexao.php";
//dados enviados do script altera_prod_lista.php
$idproduto=$_POST["idproduto"];
$nome=$_POST["nome"];
$preco=$_POST["precoproduto"];
$descricaoproduto=$_POST["descricaoproduto"];
$qtdeestoque=$_POST["qtdeestoque"];
$sql="UPDATE produto 
SET
idproduto = $idproduto,
nome = '$nome',
precoproduto = $preco,
descricaoproduto = '$descricaoproduto', 
qtdeestoque = $qtdeestoque 
WHERE idproduto = $idproduto;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0)
{
echo "<script type='text/javascript'>alert('Gravação OK !!!')</script>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=altera_produto.php'>";
}
else	
echo "Erro na gravacao !!!<br><br>";
echo pg_last_error();
pg_close($conecta);
echo "A conexão com o banco de dados foi encerrada!"
?>