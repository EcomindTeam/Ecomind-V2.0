<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" type="text/css" href="/samaral/3bimtrab/css/style.css">
</head>
<body>
    <center>
        <div id="mãe">
            <div id="topo">
                <div class="logo">
                    <a href="/samaral/3bimtrab/home.php">
                        <img src="imagens/logo.png" width="20%">
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
                <h1>Configurações</h1>
            </div>
            <br>
            <div id="principal">
                <div id="conf">
                    <h3>Inserção</h3>
                    <a class="zero" href="/samaral/3bimtrab/insercao/form_insere_produto.php"> Inserir Produto </a><br><br><br>
                    <h3>Alteração</h3>
                    <a class="zero" href="/samaral/3bimtrab/alteracao/altera_produto.php"> Alterar Produto </a><br><br><br>
                    <a class="zero" href="/samaral/3bimtrab/alteracao/altera_usuario.php"> Alterar Usuário </a><br><br><br>
                    <h3>Exclusão</h3>
                    <a class="zero" href="/samaral/3bimtrab/exclusao/exclui_produto.php"> Excluir Produto </a><br><br><br>
                    <a class="zero" href="/samaral/3bimtrab/exclusao/exclui_usuario.php"> Excluir Usuário </a><br><br><br>
                </div>
            </div>
            <br><br><br><br><br><br><br><br><br>
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