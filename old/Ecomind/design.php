<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design</title>
    <link rel="stylesheet" type="text/css" href="/samaral/3bimtrab/css/style.css">
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
                    <a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="./imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                    <a href="/samaral/3bimtrab/configuracoes.php"> <img src="./imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                    <br>
                </div>
                <a name="topo"></a> &nbsp;&nbsp;
                <h1>Design</h1>
            </div>
            <br>
            <div id="perfil">
                <div id="dev">
                    <div id="imgdev1">
                        <img src="imagens/guilherme.jpg">
                    </div><br>
                    <div class="text">
                        <h3>&nbsp;&nbsp;09 Guilherme Silva Guimarães</h3>
                    </div><br><br><br><br><br><br><br><br><br>
                    <div id="imgdev2">
                        <img src="imagens/ian.jpg">
                    </div><br>
                    <div class="text">
                        <h3>&nbsp;&nbsp;11 Ian Moura Berbert</h3>
                    </div><br><br><br><br><br><br><br><br><br>
                    <div id="imgdev3">
                        <img src="imagens/joao.jpg">
                    </div><br>
                    <div class="text">
                        <h3>&nbsp;&nbsp;14 João Pedro Giacometti Guerreiro</h3>
                    </div><br><br><br><br><br><br><br><br><br>
                    <div id="imgdev4">
                        <img src="imagens/renan.jpg">
                    </div><br>
                    <div class="text">
                        <h3>&nbsp;&nbsp;28 Renan Pereira Matos</h3>
                    </div><br><br><br><br><br><br><br><br><br>
                    <div id="imgdev5">
                        <img src="imagens/sara.jpg">
                    </div>
                    <br>
                    <div class="text">
                        <h3>&nbsp;&nbsp;30 Sara Brandão Do Amaral</h3>
                    </div><br><br><br><br><br><br><br><br><br>
                </div>        
            </div>
            <br><br><br><br><br>
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
        </div>
    </center>
</body>
</html>