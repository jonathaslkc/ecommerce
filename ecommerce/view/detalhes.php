<?php
    $titulopage = 'Início - Templax E-commerce';
    $nomemenu   = 'inicio';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <?php 
    //HEAD
        include_once 'header/head.php';
        
    // Select
        include '../controller/select.control.php';

    ?>
</head><!--/head-->

<body>

        <?php include_once 'header.php'; ?>

	<section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-7">
                                <div class="view-product">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                <div class="item active">
                                                    <div style="width:300px;height:300px;">
                                                        <a href="<?php echo '../'.$resultado->caminho_img_frente; ?>" class="zoomimg">
                                                            <img src="<?php echo '../'.$resultado->caminho_img_frente; ?>" alt="" style="width:200px;max-height:200px;" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div style="width:300px;height:300px;">
                                                        <img src="<?php echo '../'.$resultado->caminho_img_lateral; ?>" alt="" style="width:200px;max-height:200px;" />
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div style="width:300px;height:300px;">
                                                        <img src="<?php echo '../'.$resultado->caminho_img_fundo; ?>" alt="" style="width:200px;max-height:200px;" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Left and right controls -->
                                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Próxima</span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Anterior</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="product-information">
                                    <h2><?php echo $resultado->nome; ?></h2>
                                    <span>
                                        <span>R$ <?php echo number_format($resultadoPreco->preco_venda, 2, '.', ''); ?></span>
                                    </span>
                                    <p><b>Marca/Modelo do Produto: </b> 
                                        <?php 
                                            foreach($barra->findAll2($resultado->produto_id) as $key => $resultadoCB): 
                                                echo $resultadoCB->marca.' - '.$resultadoCB->modelo;
                                            endforeach;
                                        ?>
                                    </p>
                                    <p><b>Cor(es) disponível(eis):</b>
                                        <?php
                                            foreach($barra->findAll2($resultado->produto_id) as $key => $resultadoCB): 
                                                echo '<img style="border-radius:50%; -moz-border-radius:50%; -webkit-border-radius:50%; background:'.$resultadoCB->cor.';width:30px;height:30px">';
                                            endforeach;
                                        ?>
                                    </p>
                                    <p><b>Tamanho(s):</b>
                                        <?php
                                            foreach($barra->findAll2($resultado->produto_id) as $key => $resultadoCB): 
                                                echo $resultadoCB->tamanho;
                                            endforeach;
                                        ?>
                                    </p>
                                    <p><b>Categoria/Subcategoria: </b> <?php echo $resultadoCategoria->nome.' / '.$resultadoSubcategoria->nome; ?></p>
                                    <form method="POST">
                                        <button type="submit" name="additemcar" class="btn btn-primary btn-lg btn-block"><i class="fa fa-shopping-cart"></i> Adicionar Produto</button>
                                    </form>
                                </div><!--/product-information-->
                            </div>
                        </div><!--/product-details-->

                        <div class="category-tab shop-details-tab"><!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#details" data-toggle="tab">Detalhes</a></li>
                                    <!--<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                                    <li><a href="#tag" data-toggle="tab">Tag</a></li>
                                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>-->
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="details" >
                                    <p><?php echo $resultado->descricao; ?></p>
                                </div>
                                <!--<div class="tab-pane fade" id="companyprofile" >
                                    <p>Company Profile</p>
                                </div>
                                <div class="tab-pane fade" id="tag" >
                                    <p>Tag</p>
                                </div>
                                <div class="tab-pane fade active in" id="reviews" >
                                    <div class="col-sm-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <p><b>Write Your Review</b></p>
                                        <form action="#">
                                            <span>
                                                <input type="text" placeholder="Your Name"/>
                                                <input type="email" placeholder="Email Address"/>
                                            </span>
                                            <textarea name="" ></textarea>
                                            <button type="button" class="btn btn-default pull-right">Submit</button>
                                        </form>
                                    </div>
                                </div>-->
                            </div>
                        </div><!--/category-tab-->

                        <?php include_once 'itensrecomendados.php'; ?>

                    </div>
                
                </div>
            </div>
	</section>
	
    <?php include_once 'footer.php'; ?>
 

<!-- Scripts -->

    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/jqzoom_ev-2.3/js/jquery-1.6.js"></script>
    <script src="../web/js/jqzoom_ev-2.3/js/jquery.jqzoom-core.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            /* simple call */
            $('.zoomimg').jqzoom();
            /* more complex call*/
            var options = {  
              zoomType: 'standard',  
              lens:true,  
              preloadImages: true,  
              alwaysOn:false,  
              zoomWidth: 300,  
              zoomHeight: 250,  
              xOffset:90,  
              yOffset:30,  
              position:'left'  
              //...MORE OPTIONS  
           };
           $('.zoomimg').jqzoom(options); 
        });
    </script>
    
<!-- /Scripts -->
</body>
</html>