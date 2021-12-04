<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author Jonathas
 */


require_once ('../controller/funcaoCalcFrete.php');


if(isset($_POST['compraBoleto'])):

    $valorTotalCompra = 0;
    $ValorFrete = 0;

    
    $tipoentrega = filter_input(INPUT_POST,'tipoentrega', FILTER_VALIDATE_INT);
    $resul = $endereco->find($_SESSION['endereco_id']);
    $cep_destino    = $resul->cep;
    $cep_origem     = '49985000';
    $tipo_entrega   = $tipoentrega;
    
    foreach($_SESSION['item'] as $list):
        $valor          = $list[3];
        $peso           = $list[4];
        $altura         = $list[5];
        $largura        = $list[6];
        $comprimento    = $list[7];
        if($list[3] <= 17): 
            $list[3] = 17.00; 
        else: 
            
        endif;
        
        $valorTotalCompra   = ($valorTotalCompra + $valor) * $list[2];

        $val                = calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entrega,$altura,$largura,$comprimento);
        echo $val->Valor.'<hr>';
         $ValorFrete         = $ValorFrete + (str_replace(',', '.', $val->Valor) * $list[2]).'<br>';
        
    endforeach;
    
    
    
    try {
        $Valor          = $ValorFrete + $valorTotalCompra;
        echo '<br>Valor Total Compra = '.$valorTotalCompra.'<br>';
        echo 'Valor Frete = '.$ValorFrete.'<br>';
        echo 'Valor Total = '.$Valor.'<br>';
        $cupom          = '';
        $status         = 0;
        $nro_nfe        = '';
        $cliente_id     = $_SESSION['id'];
        $tipo_pagto_id  = 1;
        $loja_id        = $_SESSION['loja'];
        $funcionario_id = 1;

    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;



if(isset($_POST['compraBoleto2'])):

    # Column Table CLIENTE
    #$valor          = $_POST['x'];
    #echo $calvalortotal;
    $valorTotalCompra = 0;

    foreach($_SESSION['item'] as $list):
        $resultadopreco     = $preco->find2(current($list));
        $valorTotalCompra = ($resultadopreco->preco_venda * $list[2]) + $valorTotalCompra;
    endforeach;
        
        try {
            DB::getInstance()->beginTransaction();
            
            #$ecommerce->setValor($valorTotalCompra);
            $tipoentrega = filter_input(INPUT_POST,'tipoentrega', FILTER_VALIDATE_INT);
            $resul = $endereco->find($_SESSION['endereco_id']);
            ///////
            $cep_destino    = $resul->cep;
            $cep_origem     = '49985000';
            #$valor          = 17.00;
            $tipo_entrega = $tipoentrega;
            #$peso           = 1;
            
            $valValor = 0;

            foreach($_SESSION['item'] as $list):
                if($list[3] <= 17): $list[3] = 17.00; else: endif;
                $valor          = $list[3];
                $peso           = $list[4];
                $altura         = $list[5];
                $largura        = $list[6];
                $comprimento    = $list[7];
                $val = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entrega,$altura,$largura,$comprimento));
                $valValor       = ($valValor + ((str_replace(',', '.', $val->Valor)) * $list[2]));
            endforeach;
            
            #$val = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entrega));
            ///////
            #$val->Valor = str_replace(',','.',str_replace(',','.',$val->Valor));
            #$Valor =   ((float)$val->Valor + (float)$valorTotalCompra);
            $Valor          = ($valValor + $calvalortotal);
            echo '<Script> alert("'.$Valor.'")</script>';
            $cupom          = '';
            $status         = 0;
            $nro_nfe        = '';
            $cliente_id     = $_SESSION['id'];
            $tipo_pagto_id  = 1;
            $loja_id        = $_SESSION['loja'];
            $funcionario_id = 1;

            $ecommerce->setValor($Valor);
            $ecommerce->setCupom($cupom);
            $ecommerce->setStatus($status);
            $ecommerce->setNro_nfe($nro_nfe);
            $ecommerce->setCliente_id($cliente_id);
            $ecommerce->setTipo_pagto_id($tipo_pagto_id);
            $ecommerce->setLoja_id($loja_id);
            $ecommerce->setFuncionario_id($funcionario_id);
            if ($ecommerce->insert()):
                $ecommerce_ultimo_id = $ecommerce->getUltimo_id(); #Captura por GET do último ID Cadastrado - MYSQL_INSERT_ID
                header("location: compra_concluida_boleto.php?eco=".md5($ecommerce_ultimo_id));
            endif;
//            echo $ecommerce->getValor($Valor);
//            echo '<br>';
//            echo $ecommerce->getCupom($cupom);
//            echo '<br>';
//            echo $ecommerce->getStatus($status);
//            echo '<br>';
//            echo $ecommerce->getNro_nfe($nro_nfe);
//            echo '<br>';
//            echo $ecommerce->getCliente_id($cliente_id);
//            echo '<br>';
//            echo $ecommerce->getTipo_pagto_id($tipo_pagto_id);
//            echo '<br>';
//            echo $ecommerce->getLoja_id($loja_id);
//            echo '<br>';
//            echo $ecommerce->getFuncionario_id($funcionario_id);
            #if ($ecommerce->logar($email, $senha)):
            #    header("Refresh: 5, ../index.php"); 
            #endif;
            DB::getInstance()->commit();
        }catch(PDOException $e){
            DB::getInstance()->rollBack();
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }

endif;