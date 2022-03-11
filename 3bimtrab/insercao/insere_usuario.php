<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/samaral/3bimtrab/css/style.css">
    <title>Adição - usuários</title>
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
                <a class="zero" href="/samaral/3bimtrab/estatisticas.php"> Estatí­sticas </a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="/samaral/3bimtrab/imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                <a href="/samaral/3bimtrab/configuracoes.php"> <img src="/samaral/3bimtrab/imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                <br>
            </div>
            <a name="topo"></a> &nbsp;&nbsp;
        </div>
        <br><br><br>
        <div id="corpo">
            <br>
            <div id = "cadastro">
	        <h1>Adição de usuário concluída</h1>
            <?php
                include "../conexao/conexao.php";
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
		        $endereco = $_POST['endereco'];
            

                $string = "INSERT INTO produto VALUES (':email', ':senha',':nome',':cpf', ':endereco'";
                $sql=$conecta->prepare($string);

                $sql->bindParam(":email",$email);
                $sql->bindParam(":senha",$senha);
                $sql->bindParam(":nome",$nome);
                $sql->bindParam(":cpf",$cpf);
                $sql->bindParam(":endereco",$endereco);
                $statement = $stringdeconexao->query($sql);
                $statement->execute();

                $resultado= pg_query($conecta, $sql);
                $qtde=pg_affected_rows($resultado);
                $erro=pg_last_error();

                if ( $statement->fetchAll() <= 0 )
                {
                    echo "<strong>Os registros foram atualizados com sucesso!</strong><br><br><br>";
                    echo '<a class="ali" href="http://200.145.153.175/samaral/3bimtrab/home.php"> Voltar para página inicial</a> ';
                }
                else{
                    echo "Gravação mal-sucedida";
                    echo '<a class="ali" href="http://200.145.153.175/samaral/3bimtrab/home.php"> Voltar para página inicial</a> ';
                } 
            ?>
           </div>
        </div><br><br><br><br><br><br><br><br><br><br><br><br>
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

