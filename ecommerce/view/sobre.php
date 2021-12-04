<?php
    $titulopage = 'Sobre - Templax E-commerce';
    $nomemenu   = 'sobre';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header/head.php'; ?>
</head><!--/head-->

<body>
    <?php include_once 'header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Sobre Nós</h2>
                        <div class="single-blog-post">
                            <h3>E-Shopper</h3>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>Nosso Negócio</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute 
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                                        pariatur.
                                    </p><br>
                                </div>
                                <div class="col-sm-4">
                                    <h4>Missão</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                        exercitation.
                                    </p><br>
                                </div>
                                <div class="col-sm-4">
                                    <h4>Visão</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt.
                                    </p><br>
                                </div>
                            </div>

                        </div>
                    </div><!--/blog-post-area-->
                    
                    <div class="media commnets">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://localhost/ecommerce/web/images/blog/man-one.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Jonh Davis</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    
                    <div class="socials-share">
                        <a href=""><img src="http://localhost/ecommerce/web/images/blog/socials.png" alt=""></a>
                    </div><!--/socials-share-->

                </div>	
            </div>
        </div>
    </section>
	
    <?php include_once 'footer.php'; ?>

    
<script type="text/javascript">
   function getValor(valor){
    $("#recebeValor").html("<option value='0'>Carregando...</option>");
        setTimeout(function(){
            $("#recebeValor").load("class/ajaxValor.php",{id:valor})
        }, 500);
};
</script>
  
    <script src="js/jquery.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>