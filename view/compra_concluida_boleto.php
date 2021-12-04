<?php
    $titulopage = 'Compra Efetuada - Templax E-commerce';
    $nomemenu   = 'compras';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <?php include_once 'header/head.php'; 
    
    $calvalortotal = 0;
    
    $resulDadosCliente = $cliente->find($_SESSION['id']);
    $resulDadosEntrega = $endereco->find($_SESSION['endereco_id']);
    $resulDadosCidade  = $cidade->find($resulDadosEntrega->cidade_id);
    $resulDadosEstado  = $estado->find($resulDadosCidade->estado_id);
    
    ?>
    
</head><!--/head-->

<body onload="getValorCep('41106', 0)">

    <?php include_once 'header.php'; ?>


	<section id="do_action">
            <div class="container">
                <div class="heading">
                    <button class="btn btn-success btn-block btn-lg"><h3 style="color:#fff;">Parabéns! <br>Sua compra foi concluída com Sucesso!</h3></button>
                    <p>Você escolheu o método de pagamento via Boleto Bancário. Para visualizar seu boleto, clique no botão "Imprimir Boleto"</p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="chose_area">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
<!--                                            <button class="btn btn-danger btn-block btn-lg"><i class="fa fa-barcode"></i> Imprimir Boleto</button>-->
                                            <a href="#" class="btn btn-danger btn-block btn-lg" onclick="window.open('../boletophp-master/boleto_itau.php?eco=<?php echo $_GET['eco']; ?>', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"><i class="fa fa-barcode"></i> Ver Boleto</a><br><br>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                    <br><br>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Dados da Compra</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-4 text-right"><h3>Código do Pedido:</h3></div>
                                                <div class="col-sm-3 text-left"><h1><?php echo rand(100000, 999999) ?></h1></div>
                                                <div class="col-sm-5 text-center"><a href=""><h3> <i class="fa fa-eye"></i> Acompanhar!</h3></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Termos e Condições</h4>
                  </div>
                  <div class="modal-body">
                    <b>Lorem</b> ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum quam at ipsum sollicitudin, eu placerat odio fermentum. Praesent iaculis arcu nec mauris fringilla, quis venenatis eros convallis. Morbi dapibus purus ut dolor imperdiet suscipit. Ut a dui elit. Praesent euismod elementum lacus eu cursus. Aliquam efficitur lobortis sem sit amet volutpat. Sed a semper tortor, at congue erat. Ut varius tristique odio sit amet tristique. Pellentesque purus ligula, faucibus vel lorem at, imperdiet condimentum ipsum. Suspendisse sed hendrerit tellus. Aliquam a augue vel tortor sodales tempus. Donec fringilla a mauris nec malesuada. Phasellus sit amet semper orci. Donec ut sem nisl. Sed gravida risus ac facilisis finibus. Duis at mauris iaculis, viverra turpis ornare, pulvinar arcu.
                    <br>
                    <br>
                    In magna quam, rhoncus eu sapien rutrum, dapibus condimentum massa. Suspendisse lacinia commodo blandit. Nunc sit amet interdum urna. Etiam tristique eleifend laoreet. Nullam commodo interdum turpis. Mauris quis velit nec felis tempus pharetra at id mi. Ut nisi tellus, rhoncus cursus euismod eu, interdum in felis.
                    <br>
                    Donec dignissim ex erat, at pharetra velit commodo fermentum. Nam tincidunt quam a venenatis dignissim. Praesent rhoncus, nibh in sodales auctor, velit libero volutpat sapien, a consequat justo sem id odio. Nam tempor est nibh, et accumsan leo condimentum eu. Aliquam mauris lorem, luctus quis porta sed, eleifend ut quam. Suspendisse odio tellus, aliquet eu lectus ut, tempus feugiat augue. Nulla mollis neque vel felis suscipit, non feugiat diam iaculis. Nullam tempus elit in eleifend pharetra. Suspendisse placerat vel eros laoreet faucibus.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            
	</section><!--/#do_action-->
	
    <?php include_once 'footer.php'; ?>
  

<!-- Scripts -->
    <script type="text/javascript">
        valor2 = "<?=number_format($calvalortotal,2,',','.')?>";
        function getValorCep(valor){
            $("#recebeValorC").html("<div class='text-center'><h3 class='text-warning'>Carregando informações, aguarde...</h3><img src='../web/images/home/Progresso1.gif'></div>");
            setTimeout(function(){
                $("#recebeValorC").load("../controller/ajaxCepFinaliza-Compra.php",{id:valor,id2:valor2});
            }, 100);
        };
    </script>

    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    
<!-- /Scripts -->
</body>
</html>