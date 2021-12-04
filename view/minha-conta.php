<?php
    $titulopage = 'ADM Ecommerce';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
    
    <!-- Incremento do conteúdo da tag head -->
    <head>
        <?php include_once 'header/head.php'; ?>
    </head>
    <!--/head-->

    <!-- Controle de Acesso -->
    <?php
        if ($_SESSION['logado']):
            //Verifica a condição Logado e se têm Permissão suficiente
            if($_SESSION['logadocli']):

            else:
                header('location: acessonegado.php');
            endif;
        else:
            header('location: acessonegado.php');
        endif;
        
        // Select
        include '../controller/clienteselect.control.php';
        
    ?>
    <!-- /Control Acess -->
    
<body>
    
    <?php include_once 'header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Minha Conta</h2>
                        <div class="single-blog-post">
                            <h3>E-Commerce - Templax Tecnologia</h3>
                            <br>
                            <div class="category-tab shop-details-tab"><!--category-tab-->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#pnl-pedidos" data-toggle="tab">Pedidos</a></li>
                                        <li><a href="#pnl-informacoes" data-toggle="tab">Minhas Informações</a></li>
                                        <li><a href="#pnl-atendimento" data-toggle="tab">Atendimento ao Cliente</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="pnl-pedidos">
                                        <div class="text-center">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h2 class="panel-title">Pedidos</h2>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-6 text-center table-responsive">
                                                            <table class="table text-left table-striped" >
                                                                <th> Nº Pedido </th>
                                                                <th> Data </th>
                                                                <th> Pagamento </th>
                                                                <th> Status </th>
                                                                <?php
                                                                
                                                                    foreach($ecommerce->buscaPedidoCli($_SESSION['id']) as $key => $resultPedidosCli):
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo str_pad($resultPedidosCli->ecommerce_id, 8, "0", STR_PAD_LEFT); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php 
                                                                                echo date("d/m/Y", strtotime($resultPedidosCli->data)); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                    $resulttppagto = $tipo_pagto->find($resultPedidosCli->tipo_pagto_id);
                                                                                    // Se boleto, oferecer oportunidade de imprimir de novo!
                                                                                    
                                                                                    if ($resultPedidosCli->tipo_pagto_id == 2):
                                                                                        ?>
                                                                                        <a href="#" class="text-info" onclick="window.open('../boletophp-master/boleto_itau.php?eco=<?php echo md5($resultPedidosCli->ecommerce_id); ?>', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">
                                                                                            <?php echo utf8_encode($resulttppagto->subtitulo); ?>
                                                                                        </a>
                                                                                    <?php else:
                                                                                        echo utf8_encode($resulttppagto->subtitulo);
                                                                                    endif;
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                    if($resultPedidosCli->status == 0):
                                                                                        echo '<label class="btn btn-danger">Expirado!</label>';
                                                                                    endif;
                                                                                    if($resultPedidosCli->status == 1):
                                                                                        echo '<label class="btn btn-warning">Pendente</label>';
                                                                                    endif;
                                                                                    if($resultPedidosCli->status == 2):
                                                                                        echo '<label class="btn btn-info">Aguardando Postagem</label>';
                                                                                    endif;
                                                                                    if($resultPedidosCli->status == 3):
                                                                                        echo '<label class="btn btn-warning">Em Trânsito</label>';
                                                                                    endif;
                                                                                    if($resultPedidosCli->status == 4):
                                                                                        echo '<label class="btn btn-success">Entregue!</label>';
                                                                                    endif;
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php  
                                                                    endforeach; 
                                                                ?>
                                                                
                                                            </table>
                                                        </div>
                                                        <div class="col-sm-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="pnl-informacoes">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Meu Endereço</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="" class="btn btn-default btn-lg">2º Endereço de Entrega</a>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-2"></div>
                                                    <div class="col-lg-8">
                                                        <h3 class="text-center">Endereço Principal</h3>
                                                        <div class="col-sm-6 text-right">Endereço</div>
                                                        <div class="col-sm-6 text-left"><?php echo utf8_encode($resultEndCli2->logradouro).', '.$resultEndCli->nro_imovel; ?></div>
                                                        <br>
                                                        <div class="col-sm-6 text-right">Bairro/CEP</div>
                                                        <div class="col-sm-6 text-left"><?php echo $resultEndCli2->bairro.' - '.$resultEndCli2->cep; ?></div>
                                                        <br>
                                                        <div class="col-sm-6 text-right">Complemento</div>
                                                        <div class="col-sm-6 text-left"><?php echo $resultEndCli->complemento; ?></div>
                                                        <br>
                                                        <div class="col-sm-6 text-right">Cidade/Estado</div>
                                                        <div class="col-sm-6 text-left"><?php echo $resultEndCli3->nome.' / '.$resultEndCli4->nome; ?></div>
                                                        <br><br>
                                                        <div class="text-center"><a href="editorEnd-cliente.php" class="btn btn-warning btn-lg">Alterar</a></div>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Dados de Acesso</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-2"></div>
                                                    <div class="col-lg-8">
                                                        <div class="col-sm-6 text-right">Nome</div>
                                                        <div class="col-sm-6 text-left"><?php echo utf8_encode($resultEndCli->nome).' '.$resultEndCli->sobrenome; ?></div>
                                                        <br>
                                                        <div class="col-sm-6 text-right">Email</div>
                                                        <div class="col-sm-6 text-left"><?php echo $resultEndCli->email; ?></div>
                                                        <br>
                                                        <div class="col-sm-6 text-right">Telefone</div>
                                                        <div class="col-sm-6 text-left"><?php echo $resultEndCli->fone_fixo.' #-# '.$resultEndCli->fone_movel; ?></div>
                                                        <br><br>
                                                        <div class="text-center"><a href="editorDA-cliente.php" class="btn btn-warning btn-lg">Alterar</a></div>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="pnl-atendimento">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Contato</h3>
                                            </div>
                                            <div class="panel-body">
                                                <p><label>Telefone:</label></p>
                                                <p><label>Email:</label></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div><!--/category-tab-->

                        </div>
                    </div><!--/blog-post-area-->
                </div>	
            </div>
        </div>
    </section>
	
    <?php include_once 'footer.php'; ?>

  
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
</body>
</html>