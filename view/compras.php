<?php
    $titulopage = 'Lista de Ítens do Carrinho - Templax E-commerce';
    $nomemenu   = 'compras';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <?php 
    //Header
    include_once 'header/head.php'; 
    
    //Variável Somatória de Produto
    $calvalortotal = 0;
    
    // Delete-Compra
        include '../controller/compradelete.control.php';
    
    // Update-Compra
        include '../controller/compraupdate.control.php';
    
    ?>
    
</head><!--/head-->

<body>

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
                                            <a href=""><img src="<?php echo 'http://localhost/ecommerce/'.$resultado->caminho_img_frente; ?>" alt="" style="width:100px"></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><label for="labelnome"><?php echo $resultado->nome; ?></label></h4>
                                            <p>ID: <label for="labelcodigo"><?php echo $resultado->produto_id; ?></label></p>
                                        </td>
                                        <td class="cart_price">
                                            <span id="labelvalor">
                                                R$  <h2><?php $res = $preco->find2($resultado->produto_id); echo number_format($res->preco_venda, 2); ?></h2>
                                            </span>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <div class="cart_quantity_button">
                                                    <a class="cart_quantity_up" href="?add=<?php echo $list[0]; ?>"> + </a>
                                                    <input class="cart_quantity_input" style="width:50px; height: 30px" type="text" name="quantity" readonly value="<?php echo $list[2]; ?>" autocomplete="off">
                                                    <a class="cart_quantity_down" href="?dec=<?php echo $list[0]; ?>"> - </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">R$ 
                                                <span id="labeltotal">
                                                    <?php
                                                        echo ($list[2] * $res->preco_venda);
                                                        $calvalortotal += $list[2] * $res->preco_venda;
                                                    ?>
                                                </span>
                                            </p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href="compras.php?acao=deletaritem&iditem=<?php echo $resultado->produto_id; ?>" onclick='return confirm("Deseja realmente deletar o ítem <?php echo $resultado->nome; ?>?")'><i class="fa fa-times"></i></a>
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
<!--                    <div class="row">
                        <div class="col-sm-2">
                            <input class="btn btn-primary btn-sm" value="Limpar Carrinho">
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                        <div class="col-sm-4 text-right">
                            <?php if((@$_SESSION['logado']) && (@!$_SESSION['logadoadm'])): ?>
                                <a class="btn btn-primary btn-lg check_out" href="finaliza-compra.php">Finalizar Compra</a>
                            <?php else: ?>
                                <a class="btn btn-primary btn-lg check_out" href="identificacao.php">Próxima Etapa</a>
                            <?php endif; ?>
                        </div>
                    </div>-->
                    <div class="text-right">
                        
                    </div>
                </div>
            </div>
	</section> <!--/#cart_items-->

	<section id="do_action">
            <form action="" method="POST">
                <div class="container">
                    <div class="heading">
                        <h3>Verificar CEP</h3>
                        <p>Deseja ver Valor e Prazo para entrega dos produtos selecionados? <br>Insira o CEP logo abaixo:</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="chose_area">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <label>CEP:</label>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <input type="number" maxlength="8" autocomplete="off" id="passaValor" onblur="getValor(this.value, 0)" placeholder="Digite o CEP aqui...">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-warning">Pesquisar</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" id="recebeValorB">

                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <li>Total em Compras <span><b>R$ <?php echo number_format($calvalortotal,2,',','.'); ?></b></span></li>
                                </ul><br><br>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-4">
                                        <a class="btn btn-warning" href="loja.php">Continuar Comprando</a>  
                                    </div>
                                    <div class="col-sm-7">
                                        <?php if((@$_SESSION['logado']) && (@!$_SESSION['logadoadm'])): ?>
                                            <a class="btn btn-success btn-lg" href="finaliza-compra.php">Finalizar Compra</a>
                                        <?php else: ?>
                                            <a class="btn btn-block btn-success btn-lg" href="identificacao.php">Próxima Etapa</a>
                                        <?php endif; ?>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
	</section><!--/#do_action-->
	
    <?php include_once 'footer.php'; ?>
  

<!-- Scripts -->

<?php
    $string_array = $_SESSION["item"];
    print_r($string_array);
    
    ?>
    <script type="text/javascript">
        //valor2 = <? = $string_array ?>;
        function getValor(valor){
            $("#recebeValorB").html("<label class='text-warning'>Pesquisando CEP, aguarde...</label>");
            setTimeout(function(){
                //$("#recebeValorB").load("../controller/ajaxCep.php",{id:valor,id2:valor2});
                $("#recebeValorB").load("../controller/ajaxCep.php",{id:valor});
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