<?php 
if(!isset($_SESSION)) { session_start(); }       
require_once ('../controller/funcaoCalcFrete.php');
require_once ('../model/endereco.class.php');

$endereco           = new endereco();

$tpentrega = $_POST["id"];
$valorCompra = $_POST['id2'];

$resul = $endereco->find($_SESSION['endereco_id']);

$cep_destino    = $resul->cep;
$cep_origem     = '04023000';
#$valor          = 17.00;
$tipo_entrega   = $tpentrega;
#$peso           = 1;


$valValor = 0;

foreach($_SESSION['item'] as $list):
    
    if($list[3] <= 17):
        $list[3] = 17.00;
    else:
        
    endif;
    $valor          = $list[3];
    $peso           = $list[4];
    $altura         = $list[5];
    $largura        = $list[6];
    $comprimento    = $list[7];
    
    $val = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entrega,$altura,$largura,$comprimento));
    
    $valValor       = ($valValor + ((str_replace(',', '.', $val->Valor)) * $list[2]));
    
endforeach;
#echo '<BR>'.$valValor.'<BR>';


if ($tpentrega):
    
    #$val = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entrega));

    if ($valValor == '0,00'):
        echo '
            <h5> Digite um CEP válido! </h5>
        ';
    
    else:
        echo ('
            <li>Valor Frete
                <span> R$ '.number_format($valValor,2,',','.').'</span>
            </li>
            <li>Tempo de Entrega (dias)
                <span>'.$val->PrazoEntrega.'</span>
            </li>
            <li>Valor Total a ser pago
                <span> R$ <b>'
        );
            
        echo (
                number_format($valValor+$valorCompra,2,',','.').'</b></span>
            </li>
            
            <li style="background:none;">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Escolha a Forma de Pagamento:</h4>
                        <p>Clicando em um dos botões a baixo você estará <b>concordando com o Termo de Compra</b> da Templax Tecnologia - Ecommerce. <a type="button" data-toggle="modal" data-target="#myModal">Ver Termo na íntegra</a></p>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" name="compraBoleto" class="btn btn-default check_out"><i class="fa fa-2x fa-barcode"></i> <h4>Pagar com Boleto</h4></button>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" name="imprimir" class="btn btn-default check_out"><i class="fa fa-2x fa-credit-card"></i> <h4>Pagar com Cartão</h4></button>
                    </div>
                </div>
            </li>
        ');
        
    endif;
else:
    echo'
        <h5> Digite um CEP válido! </h5>
    ';
endif;


//            <li style="background:none;">
//                <div class="row">
//                    <div class="col-sm-4">
//                        <a class="btn btn-warning btn-block" href="">Voltar para Checkout</a>
//                    </div>
//                    <div class="col-sm-8">
//                        <a class="btn btn-success btn-block" href="">Finalizar Compra</a>
//                    </div>
//                </div>
//            </li>