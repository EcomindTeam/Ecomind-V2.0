<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="validadorsenha/validadorsenha.js"></script>
</head>
<body>
    <center>
        <div id="mãe">
            <div id="topo">
                <div class="logo">
                    <a href="home.php">
                        <img src="../imagens/logo.png" width="20%">
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
                    <a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="../imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                    <a href="/samaral/3bimtrab/configuracoes.php"> <img src="../imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                    <br>
                </div><br>
                <h1>Cadastro</h1>
            </div>
            <br><br>
            <div id="cadastro">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <form class="box" action="insere_usuario.php" method="post">
                    <input type="text" name="email" autofocus required placeholder="Email*">
                    <input type="text" name="senha" class="form-control" placeholder="Senha*"> 
                    <input type="text" name="nome" placeholder="Nome Completo*">
                    <input type="text" name="cpf"placeholder="CPF do Usuário*">
                    <input type="text" name="endereco"placeholder="Endereço*"> 
                    <br>
                    <input type="submit" name="button" id="button" value="Enviar"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" value="Limpar"><br><br>
                    <h3>Já tem uma conta?&nbsp;&nbsp;<a class="dois" href="../login/login.php"> Faça Login aqui</a> &nbsp;&nbsp;</h3>
                </form> 
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
            <br><br><br><br><br><br><br>
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
                    <p>09-Guilherme Silva &nbsp;&nbsp;  11-Ian Moura &nbsp;&nbsp;   14-João Pedro &nbsp;&nbsp;  28-Renan Pereira &nbsp;&nbsp;   30-Sara Brandão</p>
                    <br>
                </center>
            </div>
        </div>
    </center>
</body>
</html>