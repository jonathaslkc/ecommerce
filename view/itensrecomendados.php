


<?php    
    if (($url_atual == 'http://localhost/ecommerce/index.php') || ($url_atual == 'http://localhost/ecommerce/') || ($url_atual == 'http://localhost/ecommerce')):
?>





<div class="row">
    <div class="recommended_items"><!--recommended_items-->
        <?php if (!$itens->selectAllDest()): ?>
            <br><hr><h4 class="text-center">Nenhum ítem cadastrado com destaque!</h4><hr>
        <?php else: ?>
            <h2 class="title text-center">Ítens Recomendados</h2>
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <?php $contitensmostrar = 0;
                    foreach($itens->selectAllDest() as $key => $valItensRec):
                    $contitensmostrar = $contitensmostrar + 1;
                    if($contitensmostrar == 1): ?>
                    <div class="item<?php if($key == 0): echo ' active'; endif;?>">
                    <?php endif; ?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <div style="width:100%;height:170px;">
                                            <a href="view/detalhes.php?acao=mostra&p=<?php echo $valItensRec->produto_id; ?>"><img src="<?php echo 'http://localhost/ecommerce/'.$valItensRec->caminho_img_frente; ?>" style="padding:25px 25px 25px 25px;border-radius:30px;width:100%;height:100%;" class="text-center" alt="" /></a>
                                        </div>
                                        <h2>R$ <?php
                                        $res = $preco->find2($valItensRec->produto_id);
                                        echo number_format($res->preco_venda, 2);
                                        ?></h2>
                                        <p><?php echo $valItensRec->nome; ?></p>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="view/compras.php?acao=additemcar&iditem=<?php echo $valItensRec->produto_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add Produto</a></li>
                                                <li><a href="view/detalhes.php?acao=mostra&p=<?php echo $valItensRec->produto_id; ?>"><i class="fa fa-eye"></i>Ver</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php if(($contitensmostrar == 4) || ($key == end(array_keys($itens->selectAllDest())))): 
                        $contitensmostrar = 0;?>
                    </div>
                    <?php endif;
                    endforeach; ?>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            <?php endif; ?>
        </div>
    </div><!--/recommended_items-->
</div>






<?php
    else:
?>





<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="recommended_items"><!--recommended_items-->
            <?php if (!$itens->selectAllDest()): ?>
                <br><hr><h4 class="text-center">Nenhum ítem cadastrado com destaque!</h4><hr>
            <?php else: ?>
                <h2 class="title text-center">Ítens Recomendados</h2>
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <?php $contitensmostrar = 0;
                        foreach($itens->selectAllDest() as $key => $valItensRec):
                        $contitensmostrar = $contitensmostrar + 1;
                        if($contitensmostrar == 1): ?>
                        <div class="item<?php if($key == 0): echo ' active'; endif;?>">
                        <?php endif; ?>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div style="width:100%;height:170px;">
                                                <a href="../view/detalhes.php?acao=mostra&p=<?php echo $valItensRec->produto_id; ?>"><img src="<?php echo 'http://localhost/ecommerce/'.$valItensRec->caminho_img_frente; ?>" style="padding:25px 25px 25px 25px;border-radius:30px;width:100%;height:100%;" class="text-center" alt="" /></a>
                                            </div>
                                            <h2>R$ <?php
                                            $res = $preco->find2($valItensRec->produto_id);
                                            echo number_format($res->preco_venda, 2);
                                            ?></h2>
                                            <p><?php echo $valItensRec->nome; ?></p>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="../view/compras.php?acao=additemcar&iditem=<?php echo $valItensRec->produto_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add Produto</a></li>
                                                    <li><a href="../view/detalhes.php?acao=mostra&p=<?php echo $valItensRec->produto_id; ?>"><i class="fa fa-eye"></i>Ver</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php if(($contitensmostrar == 4) || ($key == end(array_keys($itens->selectAllDest())))): 
                            $contitensmostrar = 0;?>
                        </div>
                        <?php endif;
                        endforeach; ?>
                    </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div><!--/recommended_items-->
    </div>
    <div class="col-sm-1"></div>
</div>





<?php
    endif;
?>