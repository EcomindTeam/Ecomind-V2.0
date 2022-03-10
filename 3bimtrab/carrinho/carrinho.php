<?php
      session_start();
       
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
	
      }
	if (!isset($_SESSION["logou"]))// SE N FOR SETADA     
	{         
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/samaral/3bimtrab/login/login.php'>";         exit; // SAI     
	}
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $idproduto = intval($_GET['idproduto']); // Código do produto que vem da página lista_carrinho.php
            if(!isset($_SESSION['carrinho'][$idproduto])){
               $_SESSION['carrinho'][$idproduto] = 1;
            }else{
               $_SESSION['carrinho'][$idproduto] += 1;
            }
         }
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $idproduto = intval($_GET['idproduto']);
            if(isset($_SESSION['carrinho'][$idproduto])){
               unset($_SESSION['carrinho'][$idproduto]);
            }
         }
         include "../conexao/conexao.php";
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $idproduto => $qtd){
                  $idproduto  = intval($idproduto);
				  //desprezar a parte decimal
                  $qtd = intval($qtd);
                  $sql="SELECT qtdeestoque FROM produto WHERE idproduto = $idproduto";
                  $resultado=pg_query($conecta,$sql);
                  $qtde=pg_num_rows($resultado);
                  if ( $qtde == 0 )
                  {
                     echo "Produto não encontrado  !!!<br><br>";
                     exit;
                  }
                  $linha = pg_fetch_array($resultado);
                  if(!empty($qtd) && $qtd > 0 && $qtd <= $linha['qtdeestoque']){
                     $_SESSION['carrinho'][$idproduto] = $qtd;
                  }else{
                    // echo "<script type='text/javascript'>alert('Quantidade não suportada !!!')</script>";
                    //echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=carrinho.php'>";
                    //unset($_SESSION['carrinho'][$idproduto]);// apaga td do carrinho;
                  }
               }
            }
         }
       
      }
       
       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<link rel="stylesheet" type="text/css" href="/samaral/3bimtrab/css/style.css"/>
			<title>Carrinho de Compras</title>
		</head>
	<body>
	<a name="topo"></a>
	<center>
   
   <div id="mãe"> <!--div mae-->
      <div id="topo"> <!--div camada1-->
            <div class="logo">
                  <a href="home.php">
                     <img src="/samaral/3bimtrab/imagens/logo.png" width="20%">
                  </a>
            </div>
            <br>
            

            <div id="botoes">&nbsp;&nbsp;&nbsp;&nbsp;
               <?php

               session_start();
               if (isset($_SESSION['nome']))
               {
                  echo '<a href="/samaral/3bimtrab/login/perfil.php"> <img src="/samaral/3bimtrab/imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';
                  echo $_SESSION['nome'];	
               } 
               else
                  echo '<a href="/samaral/3bimtrab/login/login.php"> <img src="/samaral/3bimtrab/imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';

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
        
            <?php  
                if($_SESSION["adm"] == true){ echo "<a class='topo' href='usuarios.php'>USUARIOS</a>&nbsp;&nbsp;";}
            ?>
            <a name="topo"></a> &nbsp;&nbsp;
            <h1>Carrinho</h1>
      </div>
      <div id="principal"> <!--div camada3-->
            <br><br>
            <br><br><br><br><br><br><br><br><br><br><br>
	    <form class="box" action="?acao=up" method="post">
            <p2>
					<th width="244">Produto</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<th width="79">Quantidade</th>&nbsp;&nbsp;&nbsp;
					<th width="89">Preço</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<th width="100">SubTotal</th>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;
					<th width="64">Remover</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</p2>
            <br><br>
            <table border="2p">

            <?php
				if(count($_SESSION['carrinho']) == 0)
				{
					echo '<tr> <td>Não há produto no carrinho</td> </tr>';
				}
				else
				{
					require("conexao.php");
					$total = 0;
					
					foreach($_SESSION['carrinho'] as $idproduto => $qtd)
					{ // Início do FOREACH
						$sql = "SELECT * FROM produto WHERE idproduto=$idproduto AND	excluido IS FALSE ORDER BY nome";
						$res = pg_query($conecta, $sql);
						$regs = pg_num_rows($res);
						if($regs>0)
						{
							$linha = pg_fetch_array($res);
							$nome = $linha['nome'];
							$precoproduto= $linha['precoproduto'];
							$sub = $precoproduto * $qtd;
							$total += $sub;
							$precoproduto= number_format($precoproduto, 2, ',', '.');
							$sub = number_format($sub, 2, ',', '.');//formata para padrão brasileiro.
						}
                  
						echo '<p><tr>    
							<td colspan="20">'.$nome.'</td>
							<td colspan="7"><input type="text" size="3" name="prod['.$idproduto.']" value="'.$qtd.'" /></td>
							 <td colspan="7">R$'.$precoproduto.'</td>
							 <td colspan="7">R$ '.$sub.'</td>
							<td colspan="7"><a href="?acao=del&idproduto='.$idproduto.'">Remove</a></td>
							</tr></p>';
					}// Término do FOREACH
					
					$total = number_format($total, 2, ',', '.');
					echo '<td colspan="1">Total R$ '.$total.'';
				}//FECHA ELSE
			?>
               
            </table><br><br>
				<input type="submit" value="Atualizar"/><br><br>
				
				<a class="dois" href="/samaral/3bimtrab/carrinho/produtos.php">Continuar Comprando</a><br><br>
				<a class="dois" href="/samaral/3bimtrab/carrinho/finalizacompra.php">Finalizar Compra</a><br><br>
			</form>
      </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <div id="rodape">
            <center>
                  <br>
                  <a class="um" href="/samaral/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
                  <a class="um" href="/samaral/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                  <a class="um" href="/samaral/3bimtrab/design.php"> Design </a> &nbsp;&nbsp;
                  <a class="um" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                  <a class="um" href="/samaral/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                  <br><br>
                  <a class="um" href="#topo">Voltar ao topo</a>
                  <br>
                  <p>09 - Guilherme Silva &nbsp;&nbsp;  11 - Ian Moura &nbsp;&nbsp;   14 - João Pedro &nbsp;&nbsp;  28 - Renan Pereira &nbsp;&nbsp;   30 - Sara Brandão</p>
                  <br>
            </center>
      </div>
   </div> <!--div mae-->
   </center>
   </body>
</html>	