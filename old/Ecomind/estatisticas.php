<?php
$arquivocss = 'relatorios_estatisticas/estilos'; // Não colocar extensão
$titulo = "Produtos mais comprados";

require "relatorios_estatisticas/dados_relatorio.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatísticas</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['nome', 'Qtde']

                <?php
                if ($qtde > 0)
                    while ($linha = pg_fetch_array($res)) {
                        echo ",['" . $linha['nome'] . "', " . $linha['qtdevendida'] . "]";
                    }
                ?>
            ]);

            var options = {
                title: "<?php echo $titulo; ?>",
                is3D: false,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }

        function imprimir() {
            print();
        }
    </script>
</head>

<body>
    <center>
        <div id="mãe">
            <div id="topo">
                <div class="logo">
                    <a href="/Ecomind-V2.0/3bimtrab/home.php">
                        <img src="imagens/logo.png" width="20%">
                    </a>
                </div>

                <div id="botoes">&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php

                    session_start();
                    if (isset($_SESSION['nome'])) {
                        echo '<a href="/Ecomind-V2.0/3bimtrab/login/perfil.php"> <img src="imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';
                        echo $_SESSION['nome'];
                    } else
                        echo '<a href="/Ecomind-V2.0/3bimtrab/login/login.php"> <img src="imagens/usuario.png" width="3%"></a> &nbsp;&nbsp;';

                    ?>
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/home.php"> Home </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/carrinho/produtos.php"> Produtos </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/design.php"> Design </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/insercao/cadastro.php"> Cadastro </a> &nbsp;&nbsp;
                    <a class="zero" href="/Ecomind-V2.0/3bimtrab/estatisticas.php"> Estatísticas </a> &nbsp;&nbsp;
                    <a href="/Ecomind-V2.0/3bimtrab/carrinho/carrinho.php"> <img src="imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                    <a href="/Ecomind-V2.0/3bimtrab/configuracoes.php"> <img src="imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                    <br>
                </div>
                <a name="topo"></a> &nbsp;&nbsp;
                <h1>Estatísticas</h1>
            </div>
            <br><br><br><br><br>
            <div id="principal">

                <?php
                $arquivocss = 'relatorios_estatisticas/estilos'; // Não colocar extensão
                $titulo = "Produtos mais comprados";

                require "relatorios_estatisticas/dados_relatorio.php";

                @include($arquivocss);

                // include autoloader
                require_once("relatorios_estatisticas/dompdf/autoload.inc.php");

                //referenciar o DomPDF com namespace
                use Dompdf\Dompdf;

                //Criando a Instancia
                $dompdf = new Dompdf();

                $html = '
                    <div class="table">
                        <div class="row header">
                            <div class="cell titleColor">
                                Id Produto
                            </div>
                            <div class="cell titleColor">
                                Nome
                            </div>
                            <div class="cell titleColor">
                                Qtde
                            </div>
                        </div> ';

                if ($qtde > 0)
                    while ($linha = pg_fetch_array($res)) {

                        $html = $html .
                            '<div class="row">
                                    <div class="cell">'
                            . $linha['idproduto'] .
                            '</div>
                                    <div class="cell">'
                            . $linha['nome'] .
                            '</div>
                                    <div class="cell">'
                            . $linha['qtdevendida'] .
                            '</div>
                                </div>';
                    }

                $html = $html . '</div>';

                /* ---------------------------------------------------------*/

                /* Preparação do documento final
                */
                $documentTemplate = '
                <!doctype html> 
                <html> 
                    <head>
                        <link rel="stylesheet" href="' . $arquivocss . '.css" type="text/css">
                    </head> 
                    <body>
                        <h1 style="text-align: center;">' . $titulo . '</h1>
                        <br><br>
                        <div id="wrapper">
                            ' . $html . '
                        </div>
                    </body> 
                </html>';

                echo $documentTemplate;
                ?>

                <div id="piechart_3d" style="width: 900px; height: 500px;"></div><br><br><br>
                <a class="zero" href="javascript:imprimir();">Imprimir PDF</a>
            </div>
            <br><br><br><br><br><br><br><br>
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