<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <link rel="stylesheet" href="/samaral/3bimtrab/css/style.css">
</head>
<body>
    <center>
        <div id="mãe">
            <?php
                include "../conexao/conexao.php";
                //dados enviados do script altera_prod.php
                $idproduto = $_GET["idproduto"];
                $sql="SELECT * FROM produto WHERE idproduto = $idproduto;";
                $resultado=pg_query($conecta,$sql);
                $qtde=pg_num_rows($resultado);
                if ( $qtde == 0 )
                {
                echo "Produto nao encontrado  !!!<br><br>";
                exit;
                }
                $linha = pg_fetch_array($resultado);
            ?>
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
                    <a class="zero" href="/samaral/3bimtrab/design.php"> Design </a> &nbsp;&nbsp;
                    <a class="zero" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                    <a class="zero" href="/samaral/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                    <a href="/samaral/3bimtrab/Carrinho/carrinho.php"> <img src="/samaral/3bimtrab/imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                    <a href="/samaral/3bimtrab/configuracoes.php"> <img src="/samaral/3bimtrab/imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                    <br>
                </div>
                <a name="topo"></a> &nbsp;&nbsp;
                <h1>Alteração de Produtos</h1>
            </div>
            <br><br>
            <div id="principal">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <form class="box" action="grava_produto_alterado.php" method="post">
         
                    Código do produto <input type="number" name="idproduto" 
                    value="<?php echo $linha[idproduto]; ?>" readonly>
                    Nome <input type="text" name="nome" 
                    value="<?php echo $linha[nome]; ?>" >
                    Preço <input type="number" name="precoproduto" step="0.01"
                    value="<?php echo $linha[precoproduto]; ?>" >
                    Descrição <input type="text" name="descricaoproduto" 
                    value="<?php echo $linha[descricaoproduto]; ?>" >
                    Quantidade em estoque <input type="number" name="qtdeestoque" 
                    value="<?php echo $linha[qtdeestoque]; ?>" ><br>
                    <input type="submit" value="Gravar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		            <input type="reset" value="Redefinir">                  
                </form>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            </div>
            <br><br><br><br><br><br><br><br><br><br>
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
