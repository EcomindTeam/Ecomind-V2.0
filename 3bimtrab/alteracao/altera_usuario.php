<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Lista de Usuários Cadastrados para Alteração</title>
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
                <a name="topo"></a> &nbsp;&nbsp;
                <h1>Altera Usuário</h1>
            </div>
            <br><br>
            <div class="altera">

                <?php
                include "../conexao/conexao.php";
                $sql = "SELECT * FROM usuario WHERE excluido is false ORDER BY idusuario;";
                $statement = $stringdeconexao->query($sql);
                $statement->execute();

                if ($statement->fetchAll() <= 0) {
                    echo "Não foi encontrado nenhum usuario !!!<br><br>";
                    //echo "A conexão com o banco de dados foi encerrada!"
                } else {
                    echo "<br><br><strong>Usuários Encontrados</strong><br><br><br>";
                    foreach ($statement as $linha) {
                        $linha = $statement->fetchALL($resultado);
                        echo "ID do Usuário........: " . $linha['idusuario'] . "<br>";
                        echo "Nome.....................: " . $linha['nome'] . "<br>";
                        echo "Senha....................: " . $linha['senha'] . "<br>";
                        echo "Endereço..............: " . $linha['endereco'] . "<br>";
                        echo "CPF.......................: " . $linha['cpf'] . "<br>";

                        echo "<a href='form_altera_usuario.php?idusuario=" . $linha['idusuario'] . "'> Alterar</a><br><br>";
                    }
                }

                ?>

            </div><br><br><br>
            <div id="rodape">
                <center>
                    <br>
                    <a class="um" href="home.php"> Home </a> &nbsp;&nbsp;
                    <a class="um" href="/Ecomind-V2.0/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                    <a class="um" href="design.php"> Design </a> &nbsp;&nbsp;
                    <a class="um" href="/Ecomind-V2.0/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                    <a class="um" href="estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
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