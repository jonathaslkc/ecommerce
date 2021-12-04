    <?php 
        if(isset($_GET['ac']) && $_GET['ac'] == 'categoria'):
            $id = $_GET['sc'];
            $resultado = $subcategoria->find2($id);
        endif;
    ?>
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Nossos Ítens</h2>
        <?php if (isset($id) && ($id)):
            if ($itens->selectAllId($resultado->subcategoria_id)):
                foreach($itens->selectAllId($resultado->subcategoria_id) as $key => $valItensList): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center" id="itemnum<?php echo $valItensList->produto_id; ?>">
                                    <div style="width:100%;height:230px;">
                                        <img src="<?php echo 'http://localhost/ecommerce/'.$valItensList->caminho_img_frente; ?>" style="padding:25px 25px 25px 25px;border-radius:40px;width:100%;height:100%;" class="text-center" alt="" />
                                    </div>
                                    <a href="http://localhost/ecommerce/view/detalhes.php?acao=mostra&p=<?php echo $valItensList->produto_id; ?>" class="btn btn-default btn-block add-to-cart">
                                        <i class="fa fa-info"></i> Ver Produto
                                    </a>
                                    <h2>R$ <?php
                                        $res = $preco->find2($valItensList->produto_id);
                                        echo number_format($res->preco_venda, 2);
                                    ?></h2>
                                    <a href="http://localhost/ecommerce/view/loja.php?acao=listar&IDSubCat=<?php echo $valItensList->produto_id; ?>"><p><?php echo $valItensList->nome; ?></p></a>
                                    <a href="http://localhost/ecommerce/view/compras.php?acao=additemcar&iditem=<?php echo $valItensList->produto_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar ao Carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="detalhes.php?acao=mostra&p=<?php echo $valItensList->produto_id; ?>" class="btn btn-default btn-block add-to-cart">
                                            <i class="fa fa-info"></i> Ver Produto
                                        </a>
                                        <h2>R$ <?php
                                            $res = $preco->find2($valItensList->produto_id);
                                            echo number_format($res->preco_venda, 2);
                                        ?></h2>
                                        <a href="http://localhost/ecommerce/view/detalhes.php?acao=mostra&p=<?php echo $valItensList->produto_id; ?>"><p><?php echo $valItensList->nome; ?></p></a>
                                        <a href="http://localhost/ecommerce/view/compras.php?acao=additemcar&iditem=<?php echo $valItensList->produto_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar ao Carrinho</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
            <!--                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            else:
                echo '<h1>Nenhum registro encontrado para a categoria selecionada!</h1><br><br><br>';
            endif;
        else:
            if ($itens->selectAll()):
                
                foreach($itens->selectAll() as $key => $valItensList): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <div style="width:100%;height:230px;">
                                        <img src="<?php echo 'http://localhost/ecommerce/'.$valItensList->caminho_img_frente; ?>" style="padding:25px 25px 25px 25px;border-radius:40px;width:100%;height:100%;" class="text-center" alt="" />
                                    </div>
                                    <a href="http://localhost/ecommerce/view/detalhes.php?acao=mostra&p=<?php echo $valItensList->produto_id; ?>" class="btn btn-default btn-block add-to-cart">
                                        <i class="fa fa-info"></i> Ver Produto
                                    </a>
                                    <h2>R$ <?php
                                        $res = $preco->find2($valItensList->produto_id);
                                        echo number_format($res->preco_venda, 2);
                                    ?></h2>
                                    <a href="http://localhost/ecommerce/view/detalhes.php?acao=mostra&p=<?php echo $valItensList->produto_id; ?>"><p><?php echo $valItensList->nome; ?></p></a>
                                    <a href="http://localhost/ecommerce/view/compras.php?acao=additemcar&iditem=<?php echo $valItensList->produto_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar ao Carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="http://localhost/ecommerce/view/detalhes.php?acao=mostra&p=<?php echo $valItensList->produto_id; ?>" class="btn btn-default btn-block add-to-cart">
                                            <i class="fa fa-info"></i> Ver Produto
                                        </a>
                                        <h2>R$ <?php
                                            $res = $preco->find2($valItensList->produto_id);
                                            echo number_format($res->preco_venda, 2);
                                        ?></h2>
                                        <a href="http://localhost/ecommerce/view/detalhes.php?acao=mostra&p=<?php echo $valItensList->produto_id; ?>"><p><?php echo $valItensList->nome; ?></p></a>
                                        <a href="http://localhost/ecommerce/view/compras.php?acao=additemcar&iditem=<?php echo $valItensList->produto_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar ao Carrinho</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
            <!--                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            else:?>
                <h4>Nenhum ítem cadastrado!</h4>
            <?php endif;
        endif;?>
    </div><br><br><br><br><br><br><br><br><br><!--features_items-->

    <?php include_once 'itensrecomendados.php'; ?>

</div>