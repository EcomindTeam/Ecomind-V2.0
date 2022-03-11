<?php	
    $arquivocss = 'estilos'; // Não colocar extensão
    $titulo = "Produtos mais comprados";

    require "dados_relatorio.php";
 
    @include($arquivocss);

	// include autoloader
	require_once("dompdf/autoload.inc.php");

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

    if($qtde>0)
        while($linha = $statement->fetchAll()($res)){

            $html = $html.
                    '<div class="row">
                        <div class="cell">'
                            .$linha['idproduto'].
                        '</div>
                        <div class="cell">'
                            .$linha['nome'].
                        '</div>
                        <div class="cell">'
                            .$linha['qtdevendida'].
                        '</div>
                    </div>';
    }
      
    $html = $html.'</div>';

    /* ---------------------------------------------------------*/

    /* Preparação do documento final
    */
    $documentTemplate = '
    <!doctype html> 
    <html> 
        <head>
            <link rel="stylesheet" href="'.$arquivocss.'.css" type="text/css">
        </head> 
        <body>
            <h1 style="text-align: center;">'.$titulo.'</h1>
            <br><br>
            <div id="wrapper">
                '.$html.'
            </div>
        </body> 
    </html>';

    echo $documentTemplate;
?>