<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
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
                <a href="/samaral/3bimtrab/login/login.php"> <img src="/samaral/3bimtrab/imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;   
                <a class="zero" href="/samaral/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/design.html"> Design </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/estatisticas.html"> Estatísticas </a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="/samaral/3bimtrab/imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/configuracoes.html"> <img src="/samaral/3bimtrab/imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                <br>
            </div>
            <a name="topo"></a> &nbsp;&nbsp;<br>
            <h1>Produtos</h1>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
        <div id="principal">
            <form class="boxpesquisa" method="GET" action="/samaral/3bimtrab/pesquisa/mostrar.php">
                <center>
                    Pesquisar <input type="textbox" name="pesquisa"><br>
                    Opções:
                    <input type="radio" name="opcao" value="1">Início &nbsp &nbsp
                    <input type="radio" name="opcao" value="2">Contendo <br><br>
                    <input type="submit" value="Pesquisar">&nbsp &nbsp &nbsp &nbsp
                    <input type="reset" value="Limpar">
                </center>
            </form>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
        require "conexao.php";

        $sql = "SELECT * FROM produto WHERE excluido IS FALSE ORDER BY descricaoproduto";
        $res = pg_query($conecta, $sql);
        $qtdeestoque= pg_num_rows($res);
        if($qtdeestoque>0)
            while($linha = pg_fetch_array($res)){
		echo "<div id='compra'>";
		echo "<h2>".$linha['nome']."</h2> <br />";
                echo "<h2>".$linha['descricaoproduto']."</h2> <br />";
                $precoproduto = number_format($linha['precoproduto'], 2, ',', '.');
                echo "Pre&ccedil;o : R$ ".$precoproduto."<br />";
                echo "<img src='image/".$linha['imagemproduto']."' /> <br />";
                echo "<a href='/samaral/3bimtrab/carrinho/carrinho.php?acao=add&idproduto=".$linha['idproduto']."'>Comprar</a>";
		echo "</div>";
                echo "<br />";
        }
        else
            echo "<br />N&atilde;o h&aacute; produtos dispon&iacute;veis!<br />";
        ?>
        <br><br><br><br><br>

        <div id="rodape">
            <center>
		<br>
                <a class="um" href="/samaral/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
		<a class="um" href="/samaral/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                <a class="um" href="/samaral/3bimtrab/design.html"> Design </a> &nbsp;&nbsp;
                <a class="um" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                <a class="um" href="/samaral/3bimtrab/estatisticas.html"> Estatísticas </a> &nbsp;&nbsp;
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