<?php
    $titulopage = 'Editor - Templax E-commerce';
    $nomemenu   = 'cadast';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
<?php 
    // Head
        include_once 'header/head.php'; 

    // Update
        include '../controller/clienteupdate.control.php';
        
    // Select
        include '../controller/clienteselect.control.php';
?>
    
</head><!--/head-->

<body>

    <?php include_once 'header.php'; ?>

    
        <section id="cart_items">
            <div class="container">
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8 clearfix">
                            <div class="bill-to">
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Formulário de Edição de Cadastro</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-lg-8">
                                                                        <h3 class="text-center">Endereço Atual</h3>
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
                                                                    </div>
                                                                    <div class="col-sm-2"></div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                            <h3 class="text-center">Endereço Novo</h3>
                                                            <div class="col-sm-9">
                                                                <label>CEP</label><label class="text-danger">*</label>
                                                                <div class="text-danger text-left">Somente números</div>
                                                                <input type="number" name="txtnome" id="txtnome" required placeholder="Digite aqui CEP" onblur="getDados();" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <br><br><input type="button" class="btn btn-warning" name="btnPesquisar" value="Pesquisar CEP" onclick="getDados();"/>
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div id="Resultado" class="col-sm-12"></div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <label>Complemento</label>
                                                                <input type="text" name="complemento" placeholder="Digite aqui o complemento" />  
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Número</label><label class="text-danger">*</label>
                                                                <input type="text" required name="nro_imovel" placeholder="Imóvel" />  
                                                            </div>
                                                        </div><br>
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" name="alteraenderecocliente" class="btn btn-warning btn-block btn-lg">Alterar Endereço </button>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>					
                    </div>
                </div>
            </div>
	</section> <!--/#cart_items-->
        
	
    <?php include_once 'footer.php'; ?>


<!-- Scripts -->

    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/buscaCep2.js"></script>
    
<!-- /Scripts -->
</body>
</html>