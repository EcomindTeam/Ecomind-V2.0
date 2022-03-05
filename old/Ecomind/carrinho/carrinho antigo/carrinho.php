

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
			<link rel="stylesheet" type="text/css" href="estilo.css"/>
			<title>Carrinho de Compras</title>
			<style>
					img{border-radius: 10px;}
					iframe{border-radius: 10px;}
			</style>
		</head>
	
	<body>
	<a name="topo"></a>
	<center>
   
   <div id="mae"> <!--div mae-->
   
    <br>

    <div id="camada1"> <!--div camada1-->
            <br>
            <div id="camadalogo">
           <?php
                if($_SESSION["logou"] == 'S')
                {
                    echo "<a class='topo' href='login.php'><img src='imagem/login.png' width='90px' height='55px'></a>";
                }
                else
                {
                    echo "<a class='topo' href='login.php'><img src='imagem/cadastro.png' width='41px' height='48px'></a>";
                }
           ?>

            <a href="index.php"><img src="imagem/logotipo.png" width="220"></a>
            <a class="topo" href="carrinho.php"><img src="imagem/carrinhocompras.png" width="50px" height="45px"></a>
            </div>
            <div id="camadalinktopo">
            <p> 
            <a class="topo" href="index.php">HOME</a>&nbsp;&nbsp;
            <a class="topo" href="produtos.php">PRODUTOS</a>&nbsp;&nbsp;
            <?php  
                if($_SESSION["adm"] == true){ echo "<a class='topo' href='usuarios.php'>USUARIOS</a>&nbsp;&nbsp;";}
            ?>
            <a class="topo" href="devs.php">ESTATÍSTICAS</a>&nbsp;&nbsp;
            <a class="topo" href="devs.php">DEVS</a>&nbsp;&nbsp;
            </div>
            </p>
            <br>
        </div><!--div camada1-->
        
           
            
          <br> <!--separa divs-->
          
 
      <div id="camada3"> <!--div camada3-->
          <br>
          <h1> CARRINHO </h1>
          <br><br>
          
			<div id="camadacarrinho">  <!--div camadacarrinho-->
         <br><br>
				<p2>
					<th width="244">Produto</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<th width="79">Quantidade</th>&nbsp;&nbsp;&nbsp;
					<th width="89">Preço</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<th width="100">SubTotal</th>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;
					<th width="64">Remover</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</p2>
            <br><br>
			<form action="?acao=up" method="post">
			
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
				<input type="submit" value="Atualizar Carrinho" /><br><br>
				
				<a href="produtos.php">Continuar Comprando</a><br><br>
				
				<a href="finalizacompra.php">Finalizar Compra</a><br><br>
			
			
			
			
			</form>
         </div>  <!--div camadacarrinho-->
          
         
      
          <br> <!--separa divs-->
          
 
          <div id="camada7"> <!--div camada7-->
            <br>
            <p>
            <a class="rodape" href="index.php">HOME</a>&nbsp;&nbsp;
            <a class="rodape" href="produtos.php">PRODUTOS</a>&nbsp;&nbsp;
            <a class="rodape" href="anterior.html">ESTATÍSTICAS</a>&nbsp;&nbsp;
            <a class="rodape" href="comprar.html">COMPRAR</a>&nbsp;&nbsp;
            <a class="rodape" href="devs.html">DEVS</a>&nbsp;&nbsp;
            </p>
            <p1>
            <br>
            09 - Guilherme Silva &nbsp;&nbsp;  11 - Ian Moura &nbsp;&nbsp;   14 - João Pedro &nbsp;&nbsp;  28 - Renan Pereira &nbsp;&nbsp;   30 - Sara Brandão</p>
            <br><br>
            </p1>
            <p>
            <a class="voltar" href="#topo">VOLTAR AO TOPO</a>
            </p> 
            <br>
        </div><!--div camada7-->
      
      
      <br>
      
      
       

   </div> <!--div mae-->
   
    </center>
    <script type="text/javascript" src="scripts/script_functions.js"></script>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
	
	</body>
	</html>



	