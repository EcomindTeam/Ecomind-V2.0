<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Ecomind-V2.0/3bimtrab/css/style.css">
    <title>Cadastro - Produto</title>
</head>

<body>
    <center>
        <div id="mãe">

            <div id="topo">
                <div id="logo">
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
                </div><br><br>
                <h1>Cadastro de Produtos</h1>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div id="principal">
                <br>
                <div id="cadastro">
                    <br><br>
                    <form class="box" action="insere_produto.php" method="post">
                        <input type="text" name="nome" placeholder="Nome do produto*" autofocus required>
                        <input type="number" name="precoproduto" step='any' placeholder="Preço do produto*">
                        <input type="text" name="descricaoproduto" placeholder="Descrição do produto">
                        <input type="number" name="qtdeestoque" placeholder="Quantidade de estoque*">
                        <input type="file" name="imagemproduto" placeholder="Selecionar Imagem">

                        <br>
                        <input type="submit" value="Enviar" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" value="Limpar" />
                    </form><br><br><br>
                </div>

            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    </center>

    <center>
        <div id="rodape">

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

        </div>
    </center>
    </div>
</body>

</html>