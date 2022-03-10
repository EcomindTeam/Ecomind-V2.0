<?php
	require "conexao.php";

	$sql = "select p.idproduto,
                   p.nome,
                   sum(iv.qtde) as qtdevendida
              from venda v
                   inner join itemvenda iv
                on v.idvenda = iv.idvenda
                   inner join produto p
                on p.idproduto = iv.idproduto 
             group by p.idproduto,
                   p.nome
             order by qtdevendida desc, nome ";

	$res = pg_query($conecta, $sql);
	$qtde=pg_num_rows($res);	 
?>