    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Categoria</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <?php if ($categoria->findAllAtivo()):
                                foreach($categoria->findAllAtivo() as $key => $vallistcat): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordian" href="<?php echo '#item'.$vallistcat->categoria_id; ?>">
                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                    <?php echo $vallistcat->nome; ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div <?php echo 'id="item'.$vallistcat->categoria_id.'" class="panel-collapse collapse"'; ?>>
                                            <div class="panel-body">
                                                <?php
                                                #$res = $sub_categoria->find(1);
                                                    #echo $res->nome;
                                                ?>
                                                <ul>
                                                    <?php foreach($subcategoria->findAllsubcat($vallistcat->categoria_id) as $key => $vallistsubcat): ?>
                                                        
                                                        <li>
                                                            <?php echo '<a href="http://localhost/ecommerce/view/loja.php?ac=categoria&sc='.$vallistsubcat->subcategoria_id.'">'.$vallistsubcat->nome.'</a>'; ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; 
                            endif;?>
                        </div><!--/category-products-->

                        <div class="shipping text-center"><!--shipping-->
                            <?php
                                foreach($bnnpubli->findAll() as $key => $valbnnpubli):
                                    if ($valbnnpubli->posicao == 'esq'):
                                        echo '<img style="width:200px;height:100%;padding-bottom:22px;" src="http://localhost/ecommerce/'.$valbnnpubli->caminho_img.'">';
                                    endif;
                                endforeach;
                            ?>
                            <!--<img src="images/home/shipping.jpg" alt="" />-->
                        </div><!--/shipping-->

                    </div>
                </div>

                <?php include_once 'itens.php'; ?>

            </div>
        </div>
    </section>