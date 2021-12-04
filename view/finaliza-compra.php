<?php
    $titulopage = 'Finalizar Compra - Templax E-commerce';
    $nomemenu   = 'compras';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <?php include_once 'header/head.php'; 
    
    $calvalortotal = 0;
    
    // Insert
    include '../controller/ecommerceinsert.control.php';
    
    // Select-Compra
    include '../controller/compraselect.control.php';
    
    
//    if (isset($_POST['compraBoleto'])):
//        header('location:compra_concluida_boleto.php');
//    endif;
    
    ?>
    
</head><!--/head-->

<body onload="getValorCep('41106', 0)">

    <?php include_once 'header.php'; ?>

    
        <section id="cart_items">
            <div class="container">
                
                <div class="table-responsive cart_info">
                    <form name="formCarrinho" method="POST" action="">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Ítem(ns)</td>
                                    <td class="description"></td>
                                    <td class="price">Valor Unitário (R$)</td>
                                    <td class="quantity">Quantidade</td>
                                    <td class="total">Subtotal (R$)</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(empty($_SESSION['item'])):
                                    echo '<tr><td><h2>Seu carrinho está vazio ;( </h2></td></tr>';
                                else:
                                    foreach($_SESSION['item'] as $list):
                                        echo '<tr>'; 
                                        $resultado = $itens->find(current($list));?>

                                        <td class="cart_product">
                                            <a href=""><img src="<?php echo '../'.$resultado->caminho_img_frente; ?>" alt="" style="width:100px"></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><label for="labelnome"><?php echo $resultado->nome; ?></label></h4>
                                            <p>ID: <label for="labelcodigo"><?php echo $resultado->produto_id; ?></label></p>
                                        </td>
                                        
                                        <?php $resultadopreco     = $preco->find2($resultado->produto_id); ?>
                                        
                                        <td class="cart_price">
                                            <p>R$ <span id="labelvalor"><?php echo number_format($resultadopreco->preco_venda, 2, '.',''); ?></span> </p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <div class="cart_quantity_button">
                                                    <input class="cart_quantity_input" type="text" style="width:50px; height: 30px" name="quantity" readonly value="<?php echo $list[2]; ?>" autocomplete="off" size="2">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">R$ 
                                                <span id="labeltotal">
                                                    <?php
                                                        echo ($list[2] * $resultadopreco->preco_venda);
                                                        $calvalortotal += $list[2] * $resultadopreco->preco_venda;
                                                    ?>
                                                </span>
                                            </p>
                                        </td>
                                        <td class="cart_delete">
                                            
                                        </td>
                                <?php
                                    echo '</tr>';
                                    endforeach;
                                    
                                    echo '<tr CLASS="cart_menu">'; ?>
                                        <td colspan="4" class="text-right">
                                            <h3>TOTAL </h3>
                                        </td>
                                        <td colspan="2" class="text-center">
                                            <h2>
                                                <?php echo 'R$ '.number_format($calvalortotal,2,",","."); ?>
                                            </h2>
                                        </td>
                                        
                              <?php echo '</tr>';
                                endif; ?>
                                        
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
	</section> <!--/#cart_items-->

	<section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>Confirmação de Dados de Entrega e Finalização de Compra</h3>
                    <p>Verifique se todos os dados de entrega conferem com o desejado! Escolha a forma de envio, de pagamento e finalize sua compra!</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="chose_area">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <ul>
                                        <li><h4>Nome: </h4></li>
                                        <li><h4>Celular: </h4></li>
                                        <li><h4>Telefone: </h4></li>
                                        <li><h4>Email: </h4></li>
                                        <li><h4>Endereço: </h4></li>
                                        <li><h4>Complem.: </h4></li>
                                        <li><h4>Bairro/CEP: </h4></li>
                                        <li><h4>Cidade: </h4></li>
                                        <li><h4>Estado: </h4></li>
                                    </ul>
                                </div>
                                <div class="col-sm-9 text-left">
                                    <ul>
                                        <li><h4>&nbsp <?php echo $_SESSION['usuario'].' '.$resulDadosCliente->sobrenome; ?> </h4></li>
                                        <li><h4>&nbsp <?php echo $resulDadosCliente->fone_movel; ?> </h4></li>
                                        <li><h4>&nbsp <?php echo $resulDadosCliente->fone_fixo; ?> </h4></li>
                                        <li><h4>&nbsp <?php echo $_SESSION['emailusu']; ?> </h4></li>
                                        <li><h4>&nbsp <?php echo utf8_encode($resulDadosEntrega->logradouro).', '.$resulDadosCliente->nro_imovel; ?> </h4></li>
                                        <li><h4>&nbsp <?php echo utf8_encode($resulDadosCliente->complemento); ?> </h4></li>
                                        <li><h4>&nbsp <?php echo utf8_encode($resulDadosEntrega->bairro).' / '.$resulDadosEntrega->cep; ?> </h4></li>
                                        <li><h4>&nbsp <?php echo utf8_encode($resulDadosCidade->nome); ?> </h4></li>
                                        <li><h4>&nbsp <?php echo utf8_encode($resulDadosEstado->nome); ?> </h4></li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Termos e Condições</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p style="height:180px;width:100%;overflow:scroll;">
                                                <b>Lorem</b> ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum quam at ipsum sollicitudin, eu placerat odio fermentum. Praesent iaculis arcu nec mauris fringilla, quis venenatis eros convallis. Morbi dapibus purus ut dolor imperdiet suscipit. Ut a dui elit. Praesent euismod elementum lacus eu cursus. Aliquam efficitur lobortis sem sit amet volutpat. Sed a semper tortor, at congue erat. Ut varius tristique odio sit amet tristique. Pellentesque purus ligula, faucibus vel lorem at, imperdiet condimentum ipsum. Suspendisse sed hendrerit tellus. Aliquam a augue vel tortor sodales tempus. Donec fringilla a mauris nec malesuada. Phasellus sit amet semper orci. Donec ut sem nisl. Sed gravida risus ac facilisis finibus. Duis at mauris iaculis, viverra turpis ornare, pulvinar arcu.
                                                <br>
                                                <br>
                                                In magna quam, rhoncus eu sapien rutrum, dapibus condimentum massa. Suspendisse lacinia commodo blandit. Nunc sit amet interdum urna. Etiam tristique eleifend laoreet. Nullam commodo interdum turpis. Mauris quis velit nec felis tempus pharetra at id mi. Ut nisi tellus, rhoncus cursus euismod eu, interdum in felis.
                                                <br>
                                                Donec dignissim ex erat, at pharetra velit commodo fermentum. Nam tincidunt quam a venenatis dignissim. Praesent rhoncus, nibh in sodales auctor, velit libero volutpat sapien, a consequat justo sem id odio. Nam tempor est nibh, et accumsan leo condimentum eu. Aliquam mauris lorem, luctus quis porta sed, eleifend ut quam. Suspendisse odio tellus, aliquet eu lectus ut, tempus feugiat augue. Nulla mollis neque vel felis suscipit, non feugiat diam iaculis. Nullam tempus elit in eleifend pharetra. Suspendisse placerat vel eros laoreet faucibus.
                                            </p>
<!--                                            <label>Estou ciente e concordo com o termo de venda da Templax</label><input type="radio" name="acc_contrato" id="acc_contrato">-->
                                        </div>
                                    </div>
                                </div>
<!--                                <div class="col-sm-5">
                                    <i class="fa fa-2x fa-user"></i><h4> <?php echo $_SESSION['usuario']; ?> </h4>
                                    <i class="fa fa-2x fa-phone"></i><h4> <?php echo $resulDadosCliente->fone_fixo.'<br>'.$resulDadosCliente->fone_movel; ?> </h4>
                                    <i class="fa fa-2x fa-envelope"></i><h4> <?php echo $_SESSION['emailusu']; ?> </h4>
                                </div>
                                <div class="col-sm-5">
                                    <i class="fa fa-2x fa-list-alt"></i><h5>Endereço: <?php echo $resulDadosEntrega->logradouro.', '.$resulDadosCliente->nro_imovel.' ('.$resulDadosCliente->complemento.') - '.$resulDadosEntrega->bairro; ?> </h5>
                                    <i class="fa fa-2x fa-map-marker"></i><h5>Cidade: <?php echo $resulDadosCidade->nome.' / '.$resulDadosEstado->nome; ?> </h5>
                                    <i class="fa fa-2x fa-map-marker"></i><h5>Cep: <?php echo $resulDadosEntrega->cep; ?> </h5>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="total_area">
                            <form action="" method="POST">
                                <ul>
                                    <li>Sub total - Compras <span>R$ <?php echo number_format($calvalortotal,2,',','.'); ?></span></li>
                                    <li>Cupom de Desconto <span>R$ 0,00</span></li>
                                    <?php $aa = number_format($calvalortotal,2,',','.'); ?>
                                    <li>
                                        <label>Selecione uma Forma de Envio:</label>
                                        <select id="passaValor" name="tipoentrega" onChange="getValorCep(this.value, 0)">
                                            <optgroup label="Selecione uma Opção!">
                                                <option value="41106" selected>PAC</option>
                                                <option value="40010">SEDEX</option>
                                            </optgroup>
                                        </select>
                                    </li>

                                    <div id="recebeValorC"></div>
    <!--                                <li>Total 
                                        <span>R$ 
                                            <? php 
                                            if (!empty($val->Valor)): 
                                                echo number_format(str_replace("," , "." , $val->Valor) + $calvalortotal,2,',','.'); 
                                            else:
                                                echo number_format($calvalortotal,2,',','.');
                                            endif;
                                            ?>
                                        </span>
                                    </li>-->

                                </ul>
                            </form>
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
        valor2 = "<?=number_format($calvalortotal,2,'.','')?>";
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