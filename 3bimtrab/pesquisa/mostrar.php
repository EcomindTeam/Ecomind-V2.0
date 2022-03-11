<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesquisa</title>
    <link rel="stylesheet" type="text/css" href="/samaral/3bimtrab/css/style.css">
</head>
<body>
    <center>
        <div id="mãe">
            <div id="topo">
                <div class="logo">
                    <a href="home.php">
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
                    <a class="zero" href="estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                    <a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                    <a href="/samaral/3bimtrab/configuracoes.php"> <img src="imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                    <br>
                </div><br><br>
                <h1>Resultados da Pesquisa</h1>
            </div>
		<div class="altera">
            <br><br>
            <?php
            //include "conectar.php";
            include "../conexao/conexao.php";
        
            $opcao = $_GET["opcao"];
            $pesquisa = strtolower($_GET["pesquisa"]); //transforma texto em minï¿½sculo
            
            if(!isset($opcao)) //se usuï¿½rio nï¿½o quer usar filtro
            $sql="SELECT * FROM produto WHERE excluido is false ORDER BY nome;";

        
            else //se usuï¿½rio escolheu um dos dois filtros
            {
                switch ($opcao)
                {
                    case 1: $x="$pesquisa%"; break; //no inï¿½cio
                    case 2: $x="%$pesquisa%"; break; //em qualquer parte
                }
                
                $sql="SELECT * FROM produto WHERE lower(nome) like'$x' and excluido is false ORDER BY nome;";
                
                /* funï¿½ï¿½es sql: lower -> para transformar texto em minï¿½sculo
                upper -> para transformar texto em maiï¿½sculo */
            }
            $resultado= pg_query($conecta, $sql);
            $qtde=pg_num_rows($resultado);
            
            if ($qtde > 0)
            {
                echo "Produtos encontrados<br><br>";
                while($linha = $statement->fetchAll($resultado)) //ou
                    //for ($cont=0; $cont < $qtde; $cont++)
                {
                    //$linha=pg_fetch_array($resultado);
                    //echo "Codigo: $linha[0]<br>"; //usar com ï¿½ndice numï¿½rico ou
                    // do jeito abaixo com matriz associativa:
                    echo "Código do produto........: ".$linha['idproduto']."<br>";
                    echo "Nome.....................: ".$linha['nome']."<br>";
                    echo "Preço....................: ".$linha['preco']."<br>";
                    echo "Descrição................: ".$linha['descricaoproduto']."<br>";
                    echo "Quantidade em estoque....: ".$linha['qtdeestoque']."<br><br><br>";

                }
            }
            else
                echo "Não foi encontrado nenhum produto!!!";
            ?>
		</div>
            <br><br><br>
 		<a class="zero" href="/samaral/3bimtrab/carrinho/produtos.php"> Voltar </a> &nbsp;&nbsp;
		<br><br>
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