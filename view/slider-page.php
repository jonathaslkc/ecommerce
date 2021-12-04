
<?php
    $titulopage = 'ADM Ecommerce - Slider';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header/head.php'; ?>
</head><!--/head-->

<?php
    if(isset($_SESSION['logado'])  && ($_SESSION['tipousuario'] == '1')):  //TESTAR SE ESTÁ LOGADO
        
        else:
            header('location: acessonegado.php');
    endif;
?>

<body>
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <?php
                                foreach($slider->findAll() as $key => $slider1):
                                    #echo '<img style="width:200px;heigth:50px;" src="'.$valbnnpubli->img.'">';
                                    if ($key == 0):
                                        echo '<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>';
                                    else:
                                        echo '<li data-target="#slider-carousel" data-slide-to="'.$key.'" id="'.$slider1->titulo.'"></li>';
                                    endif;
                                endforeach;
                            ?>
                        </ol>

                        <div class="carousel-inner">
                            <?php
                                foreach($slider->findAll() as $key => $slider2):
                                    #echo '<img style="width:200px;heigth:50px;" src="'.$valbnnpubli->img.'">';
                                    if ($key == 0):
                                        echo '
                                            <div class="item active">
                                                <div class="col-sm-6">
                                                    <h1><span>E</span>-commerce</h1>
                                                    <h2>'.$slider2->titulo.'</h2>
                                                    <p>'.$slider2->descricao.'</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <img src="../'.$slider2->caminho_img.'" class="girl img-responsive" alt="" />
                                                </div>
                                            </div>';
                                    else:
                                        echo '
                                            <div class="item" style="height:300px;">
                                                <div class="col-sm-6">
                                                    <h1><span>E</span>-commerce</h1>
                                                    <h2>'.$slider2->titulo.'</h2>
                                                    <p>'.$slider2->descricao.'</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <img src="../'.$slider2->caminho_img.'" style="max-height:300px" class="girl img-responsive" alt="" />
                                                </div>
                                            </div>';
                                    endif;
                                endforeach;
                            ?>                        

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->


    
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
</body>
</html>


<!--<section id="slider">  slider-->
<!--    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                        <li data-target="#slider-carousel" data-slide-to="3"></li>
                        <li data-target="#slider-carousel" data-slide-to="4"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-commerce</h1>
                                <h2>Portal para Vendas Online</h2>
                                <p>Aumente seus lucros com um site e-commerce! </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <button type="button" class="pricing btn btn-default get" style="border-radius:15px;font-weight:bold;">R$ Valor do Ítem</button>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-commerce</h1>
                                <h2>Designer 100% Responsivo</h2>
                                <p>Adaptado para seu Tablet/Smartphone/Notebook e Desktop! </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <button type="button" class="pricing btn btn-default get" style="border-radius:15px;font-weight:bold;">R$ Valor do Ítem</button>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-commerce</h1>
                                <h2>Nome do Ítem 3</h2>
                                <p>Aqui será a descrição para o ítem 3. </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <button type="button" class="pricing btn btn-default get" style="border-radius:15px;font-weight:bold;">R$ Valor do Ítem</button>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-commerce</h1>
                                <h2>Nome do Ítem 4</h2>
                                <p>Aqui será a descrição para o ítem 3. </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <button type="button" class="pricing btn btn-default get" style="border-radius:15px;font-weight:bold;">R$ Valor do Ítem</button>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-commerce</h1>
                                <h2>Nome do Ítem 5</h2>
                                <p>Aqui será a descrição para o ítem 3. </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <button type="button" class="pricing btn btn-default get" style="border-radius:15px;font-weight:bold;">R$ Valor do Ítem</button>
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section> 
/slider-->