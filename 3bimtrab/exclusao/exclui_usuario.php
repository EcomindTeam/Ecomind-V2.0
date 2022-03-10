<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title>Lista de Usuários Cadastrados para Exclusão</title>
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
                <a class="zero" href="/samaral/3bimtrab/design.php"> Design </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                <a class="zero" href="/samaral/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="/samaral/3bimtrab/imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/configuracoes.php"> <img src="/samaral/3bimtrab/imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                <br>
            </div>
            <a name="topo"></a> &nbsp;&nbsp;
            <h1>Excluir Usuário</h1>
        </div>
        <br><br><br>
            <div class="altera">
                
                <?php
                    include "../conexao/conexao.php";
                    $sql="SELECT * FROM usuario WHERE excluido is false ORDER BY idusuario;";
                    $resultado= pg_query($conecta, $sql);
                    $qtde=pg_num_rows($resultado);
                    if ($qtde > 0){
                        echo "<br><br><strong>Usuários encontrados</strong><br><br>";
                        for ($cont=0; $cont < $qtde; $cont++)
                        {
                            $linha=pg_fetch_array($resultado);
                            echo "ID do Usuário........: ".$linha['idusuario']."<br>";
                            echo "Login.....................: ".$linha['usuario']."<br>";
                            echo "Senha....................: ".$linha['senha']."<br>";
                            echo "Nome................: ".$linha['nome']."<br>";
                            echo "CPF....: ".$linha['cpf']."<br>";

                            echo "<a href='confirma_exclusao_usuario.php?idusuario=$linha[0]'>
                            Excluir</a><br><br>";					   
                        }
                    }
                    else
                    echo "Não foi encontrado nenhum usuário !!!<br><br>";
                ?>    
                
            </div><br><br><br><br>
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
