<?php
/*
Extraído de:
http://www.davidchc.com.br/video-aula/php/carrinho-de-compras-com-php/
vídeo aula de:https://www.youtube.com/watch?v=CBzfcl-Qk1c

Adaptado por Profa. Ariane Scarelli para banco de dados PostgreSQL (ago/2016)
BD: TesteBD1
Tabela: produto

Adicionado por Prof. Vitor Simeão (out/2019)
*/

      session_start();
       
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Compra Finalizada</title>
<link rel="stylesheet" href="/samaral/3bimtrab/css/style.css">
</head>
 
<body>
	<center>
		<div id="mãe">
			<div id="topo">
				<div class="logo">
					<a href="/samaral/3bimtrab/home.php">
						<img src="/samaral/3bimtrab/imagens/logo.png" width="20%">
					</a>
				</div>
				<div id="botoes">&nbsp;&nbsp;&nbsp;&nbsp;
					<?php

					session_start();
					if (isset($_SESSION['nome']))
					{
						echo '<a href="/samaral/3bimtrab/login/perfil.php"> <img src="imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';
						echo $_SESSION['nome'];	
					} 
					else
						echo '<a href="/samaral/3bimtrab/login/login.php"> <img src="imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';

					?> 
					<a class="zero" href="/samaral/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
					<a class="zero" href="/samaral/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
					<a class="zero" href="/samaral/3bimtrab/design.php"> Design </a> &nbsp;&nbsp;
					<a class="zero" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
					<a class="zero" href="/samaral/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
					<a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="/samaral/3bimtrab/imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
					<a href="/samaral/3bimtrab/configuracoes.php"> <img src="/samaral/3bimtrab/imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
					<br>
				</div>
				<a name="topo"></a> &nbsp;&nbsp;
				<h1>Carrinho de Compras</h1>
			</div>
			<br><br><br><br>
			<table>
				<caption>Carrinho de Compras</caption>
				<thead>
					<tr>
						<th width="100">Código</th>
						<th width="244">Descrição</th>
						<th width="79">Quantidade</th>
						<th width="89">Pre&ccedil;o</th>
						<th width="100">SubTotal</th>
					</tr>
				</thead>
				<form action="?acao=voltar" method="post">
					<tfoot>
						<tr>
						<td colspan="5"><a href="/samaral/3bimtrab/carrinho/carrinho.php">Voltar</a></td>
					</tfoot>
					
					<tbody>
					<?php
						if(count($_SESSION['carrinho']) == 0)
						{
							echo '<tr><td colspan="5">N&atilde;o h&aacute; produto no carrinho</td></tr>';
						}
						else
						{
							require("../conexao/conexao.php");
							$total = 0;
							
							// Gravar Venda
							$sql = "INSERT INTO venda VALUES (2, DEFAULT,NOW(),false);";
							$res = pg_query($conecta, $sql);
							//$regs = pg_affected_rows($res);
							//if ($res <= 0){1
								foreach($_SESSION['carrinho'] as $idproduto => $qtd)
								{ // Início do FOREACH
									$sql = "SELECT * FROM produto WHERE idproduto=$idproduto AND	excluido IS FALSE ORDER BY nome";
									$res = pg_query($conecta, $sql);
									$linha = $statement->fetchALL($res);
									$preco = $linha['precoproduto'];
			
									//$sql = "SELECT MAX(idvenda) FROM venda WHERE excluido IS FALSE";
									//$res = pg_query($conecta, $sql);
									//$linha = pg_fetch_array($res);
									//$idvenda= $linha['max'];
			
									session_start();
									$idusuario = $_SESSION['id'];
			
									$sql = "INSERT INTO itemvenda VALUES (CURRVAL('seq_venda'),$idproduto,$qtd,$preco,FALSE);";
									$res = pg_query($conecta, $sql);

									$sql="UPDATE produto SET qtdeestoque = qtdeestoque-$qtd WHERE idproduto = $idproduto";
									$res= pg_query($conecta,$sql);
								
							}// Término do FOREACH
							$total =0;
							foreach ($_SESSION['carrinho'] as $idproduto => $qtd)
							{
								$sql = "SELECT * FROM produto WHERE idproduto=$idproduto AND	excluido!= true ORDER BY idproduto";
								$res = pg_query($conecta, $sql);
								$linha = $statement->fetchALL($res);
								$valor=$linha['precoproduto']*$qtd;
								echo '<tr><th width="100">'.$linha['idproduto'].'</th>';
								echo '<th width="244">'.$linha['nome'].'</th>';
								echo '<th width="79">'.$qtd.'</th>';
								echo '<th width="89">'.$linha['precoproduto'].'</th>';
								echo '<th width="100">'.$valor.'</th></tr>';
								$total+=$valor;
							}
							if($total > 0)
							{
								echo '<tr><th width="100">TOTAL</th>';
								echo '<th width="244">-</th>';
								echo '<th width="79">-</th>';
								echo '<th width="89">-</th>';
								echo '<th width="100">'.$total.'</th></tr>';
							}
							echo '<tr><td colspan="3">Compra Finalizada</td></tr>';
							// Encerra SESSION
							unset ($_SESSION['carrinho']);
						}
					?>
					<?php
						echo '<a class="dois" href="/samaral/3bimtrab/envioemail/enviagmail.php">Enviar Email</a><br><br>';
					?>
					</tbody>
				</form>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div id="rodape">
                	<center>
                    		<br>
                    		<a class="um" href="home.php"> Home </a> &nbsp;&nbsp;
                    		<a class="um" href="/samaral/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                    		<a class="um" href="design.php"> Design </a> &nbsp;&nbsp;
                    		<a class="um" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                    		<a class="um" href="estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                    		<br><br>
                    		<a class="um" href="#topo">Voltar ao topo</a>
                    		<br>
                    		<p>09 - Guilherme Silva &nbsp;&nbsp;  11 - Ian Moura &nbsp;&nbsp;   14 - João Pedro &nbsp;&nbsp;  28 - Renan Pereira &nbsp;&nbsp;   30 - Sara Brandão</p>
                    		<br>
                	</center>
            		</div>
		</div>
	</center>
</body>
</html>