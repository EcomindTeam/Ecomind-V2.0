<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title>Lista de Produtos Cadastrados para Alteração</title>
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
                    echo '<a href="/samaral/3bimtrab/login/perfil.php"> <img src="/samaral/3bimtrab/imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';
                    echo $_SESSION['nome'];	
                } 
                else
                    echo '<a href="/samaral/3bimtrab/login/login.php"> <img src="/samaral/3bimtrab/imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';

                ?> 
                <a class="zero" href="/samaral/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/design.html"> Design </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/Carrinho/carrinho.php"> <img src="/samaral/3bimtrab/imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/configuracoes.php"> <img src="/samaral/3bimtrab/imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                <br>
            </div>
            <a name="topo"></a> &nbsp;&nbsp;
            <h1>Altera Produto</h1>
        </div>
        <br><br>
            <div class="altera">
                
                    <?php
                    include "../conexao/conexao.php";
                    $sql="SELECT * FROM produto WHERE excluido is false ORDER BY idproduto;";
                    $statement = $conecta->query($sql);
                    $statement->execute();
                    if($statement->fetchAll() <= 0){
                        echo "Não foi encontrado nenhum produto !!!<br><br>";
                        pg_close($conecta);
                        //echo "A conexão com o banco de dados foi encerrada!"
                    }
                    else
                    {
                        echo "<br><br><strong>Produtos Encontrados</strong><br><br><br>";
                        foreach ($statement as $linha)
                        {
                            $linha=pg_fetch_array($resultado);
                            echo "Código do produto.................: ".$linha['idproduto']."<br>";
                            echo "Nome......................................: ".$linha['nome']."<br>";
                            echo "Preço......................................: ".$linha['precoproduto']."<br>";
			                echo "Quantidade em estoque.......: ".$linha['qtdeestoque']."<br>";
                            echo "Descrição...............................: ".$linha['descricaoproduto']."<br>";

                            echo "<a href='form_altera_produto.php?idproduto=".$linha[idproduto]."'> Alterar</a><br><br>"; 
                        } 
                    }
                    ?>
		<br><br>
                
		
            </div><br><br><br>
         
	<center>
		
	    <div id="rodape">
                
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
                
            </div>
	 </center>
        </div>
        </center>
    </body>
</html>