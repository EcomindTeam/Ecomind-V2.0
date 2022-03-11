<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="/Ecomind-V2.0/3bimtrab/css/style.css">
</head>

<body>
    <center>
        <div id="mãe">
            <?php
            include "../conexao/conexao.php";
            $idusuario = $_GET["idusuario"];
            $sql = "SELECT * FROM usuario WHERE idusuario = $idusuario;";
            $resultado = pg_query($conecta, $sql);
            $qtde = pg_num_rows($resultado);
            if ($qtde == 0) {
                echo "Usuário não encontrado  !!!<br><br>";
                exit;
            }
            $linha = $statement->fetchALL($resultado);
            ?>
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
                <h1>Exclusão de Usuário</h1>
            </div>
            <br><br><br><br>
            <div id="principal">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <form class="box" action="usuario_exclusao_logica.php" method="post">
                    ID do Usuário <input type="number" name="idusuario" value="<?php echo $linha[0]; ?>" readonly>
                    Login <input type="text" name="usuario" value="<?php echo $linha[1]; ?>" readonly>
                    Senha <input type="text" name="senha" value="<?php echo $linha[2]; ?>" readonly>
                    Nome <input type="text" name="nome" value="<?php echo $linha[3]; ?>" readonly>
                    CPF <input type="text" name="cpf" value="<?php echo $linha[4]; ?>" readonly><br>

                    <input type="submit" value="Excluir">

                </form>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
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