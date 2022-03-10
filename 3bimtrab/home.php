<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                    <a href="/samaral/3bimtrab/carrinho/carrinho.php"> <img src="imagens/carrinho.png" width="3.5%"></a> &nbsp;&nbsp;
                    <a href="/samaral/3bimtrab/configuracoes.php"> <img src="imagens/engrenagem.png" width="3.5%"></a> &nbsp;&nbsp;
                    <br>
                </div>
                <a name="topo"></a> &nbsp;&nbsp;
                <h1>Home</h1>
            </div>
            <br>
            <div id="principal">
                <div id="central">
                    <div class="slideshow-container">
                        <div class="mySlides fade"> 
                            <img src="imagens/produtos2.jpg" width="70%">  
                            <h3>&nbsp;&nbsp;Aqui na Ecomind, conforto, simplicidade e consciência andam lado a lado com o meio ambiente.</h3>
                        </div>
                        
                        <div class="mySlides fade">                          
                            <img src="imagens/prodsustentaveis.jpg" style="width:70%">
                            <h3>&nbsp;&nbsp;Nossos produtos foram pensados para auxiliar seu dia a dia, trazendo mais praticidade para você!</h3> 
                        </div>
                        
                        <div class="mySlides fade">                          
                            <img src="imagens/todosprodutos.jpg" style="width:70%">
                            <h3>&nbsp;&nbsp;Venha conhecer nossos incríveis produtos e dessa forma ajudar a natureza!!</h3> 
                        </div>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        <br><br>
                    </div>
                </div><br><br>
                <div id="text_image1">
                    <div id="interna1">
                        <img src="/samaral/3bimtrab/imagens/copo.jpg" width="80%">
                    </div><br>
                    <div id="interna2">
                        <p>&nbsp;&nbsp;Copo de silicone: retrátil e pratico, perfeito para &nbsp;&nbsp;ser carregado junto a você aonde estiver!</p><br>
                    </div><br>
                </div>
                <div id="text_image2">
                    <div id="interna1">
                        <img src="/samaral/3bimtrab/imagens/escova.jpg" width="80%">
                    </div><br>
                    <div id="interna2">
                        <p>&nbsp;&nbsp;Escova de cabelo de bambu: bonita, confortável &nbsp;&nbsp;e ecológica, tudo que seu cabelo precisa!</p><br>
                    </div>
                    <br>
                </div>
                <div id="text_image3">                        
                    <div id="interna1">
                        <img src="/samaral/3bimtrab/imagens/escovadentes.jpg" width="80%">
                    </div><br>
                    <div id="interna2">
                        <p>&nbsp;&nbsp;Escova de dente de bambu: higiênica, &nbsp;&nbsp;minimalista e o melhor de tudo: compostável!</p><br>
                    </div>
                    <br>
                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div id="video">
                <div id="text_filme">
                    <h2>Confira no vídeo ao lado algumas maneiras de melhorar sua vida deixando-a mais sustentável!</h2><br><br>
                </div>
                <div id="filme">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/VCvN5uU-huc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
    <script>
    
        var slideIndex = 1;
            
        showSlides(slideIndex);
        
        function plusSlides(n) {
            
          showSlides(slideIndex += n);
            
        }
        
        function currentSlide(n) {
            
          showSlides(slideIndex = n);
            
        }
        
        function showSlides(n) {
            
          var i;
            
          var slides = document.getElementsByClassName("mySlides");
            
          var dots = document.getElementsByClassName("dot");
            
          if (n > slides.length) {slideIndex = 1}  
            
          if (n < 1) {slideIndex = slides.length}
            
          for (i = 0; i < slides.length; i++) {
              
              slides[i].style.display = "none"; 
              
          }
          for (i = 0; i < dots.length; i++) {
              
              dots[i].className = dots[i].className.replace(" active", "");
              
          }
          slides[slideIndex-1].style.display = "block"; 
            
          dots[slideIndex-1].className += " active";
            
        }
            
    </script>
</body>
</html>