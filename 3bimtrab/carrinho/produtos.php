<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="/Ecomind-V2.0/3bimtrab/css/style.css">
</head>

<body>
    <center>
        <div id="mãe">
            <div id="topo">
                <div class="logo">
                    <a href="/Ecomind-V2.0/3bimtrab/home.php">
                        <img src="/Ecomind-V2.0/3bimtrab/imagens/logo.png" width="20%">
                    </a>
                </div>
                <div id="botoes">&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php

                    session_start();
                    if (isset($_SESSION['nome'])) {
                        echo '<a href="/Ecomind-V2.0/3bimtrab/login/perfil.php"> <img src="/Ecomind-V2.0/3bimtrab/imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';
                        echo $_SESSION['nome'];
                    } else
                        echo '<a href="/Ecomind-V2.0/3bimtrab/login/login.php"> <img src="/Ecomind-V2.0/3bimtrab/imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';

                    ?>
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/design.php"> Design </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                    <a href="/Ecomind-V2.0/3bimtrab/carrinho/carrinho.php"> <img src="/Ecomind-V2.0/3bimtrab/imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                    <a href="/Ecomind-V2.0/3bimtrab/configuracoes.php"> <img src="/Ecomind-V2.0/3bimtrab/imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                    <br>
                </div>
                <a name="topo"></a> &nbsp;&nbsp;<br>
                <h1>Produtos</h1>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <div id="principal">
                <form class="boxpesquisa" method="GET" action="/Ecomind-V2.0/3bimtrab/pesquisa/mostrar.php">
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

            $sql = "SELECT * FROM produto WHERE excluido IS FALSE ORDER BY nome";
            $res = pg_query($conecta, $sql);
            $qtdeestoque = pg_num_rows($res);
            if ($qtdeestoque > 0)
                while ($linha = $statement->fetchALL($res)) {
                    echo "<div id='interna2'>";
                    echo "<div id='interna1'>";
                    echo " <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $linha['nome'] . "</h2> <br />";
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $linha['descricaoproduto'] . " <br />";
                    $precoproduto = number_format($linha['precoproduto'], 2, ',', '.');
                    echo "<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pre&ccedil;o : R$ " . $precoproduto . "</h2><br />";
                    echo "</div>";
                    echo "<div id='interna1'>";
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='" . $linha['imagemproduto'] . "'/> <br />";
                    echo "<br><br>";
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='dois' href='/Ecomind-V2.0/3bimtrab/carrinho/carrinho.php?acao=add&idproduto=" . $linha['idproduto'] . "'>Comprar</a>";
                    echo "<br><br><br>";
                    echo "</div>";
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
                    <a class="um" href="/Ecomind-V2.0/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
                    <a class="um" href="/Ecomind-V2.0/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                    <a class="um" href="/Ecomind-V2.0/3bimtrab/design.php"> Design </a> &nbsp;&nbsp;
                    <a class="um" href="/Ecomind-V2.0/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                    <a class="um" href="/Ecomind-V2.0/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                    <br><br>
                    <a class="um" href="#topo">Voltar ao topo</a>
                    <br>
                    <p>09 - Guilherme Silva &nbsp;&nbsp; 11 - Ian Moura &nbsp;&nbsp; 14 - João Pedro &nbsp;&nbsp; 28 - Renan Pereira &nbsp;&nbsp; 30 - Sara Brandão</p>
                    <br>
                </center>
            </div>
        </div>
    </center>
</body>

</html>