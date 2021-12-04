<?php
    $titulopage = 'Loja - Templax E-commerce';
    $nomemenu   = 'loja';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <?php include_once 'header/head.php'; 
    
    if(isset($_GET['add'])):
            if($_GET['add'] == 'ok'):
                function add(){
                    if (!isset($_SESSION['pedido'])):
                        $_SESSION['pedido'] = array();
                    endif;
                    if(empty($_SESSION['pedido'][$id])):
                        $_SESSION['pedido'][$id] = 1;
                    else:
                        $_SESSION['pedido'][$id] =+ 1;
                    endif;
                    
                    print_r($_SESSION['pedido']);
                }
            endif;
        endif;
    ?>
    
</head><!--/head-->

<body>

    <?php include_once 'header.php'; ?>

    <section id="advertisement">
        <div class="container">
            <?php
                foreach($bnnpubli->findAll() as $key => $valbnnpubli):
                    if ($valbnnpubli->posicao == 'sup'):
                        echo '<div style="height:150px;width:100%;">
                              <img style="max-width:100%;max-height:100%;" src="http://localhost/ecommerce/'.$valbnnpubli->caminho_img.'">'.
                             '</div>';
                    endif;
                endforeach;
            ?>
            <!--<img src="localhost/ecommerce/web/images/uploads/advertisement.jpg" alt="" />-->
        </div>
    </section>
    
    <?php include_once 'corpo-produto.php'; ?>
	
    <?php include_once 'footer.php'; ?>
  


<!-- Scripts -->

    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
<!-- /Scripts -->
</body>
</html>