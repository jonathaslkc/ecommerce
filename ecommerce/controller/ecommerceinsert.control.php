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
            $valor          = 17.00;
            $tipo_entrega = $tipoentrega;
            $peso           = 1;
            $val = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entrega));
            ///////
            $val->Valor = str_replace(',','.',str_replace(',','.',$val->Valor));
            $Valor =   ((float)$val->Valor + (float)$valorTotalCompra);

            $cupom         = '';
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
            
    
//    if (!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL)) {
//        echo("Email is not valid");
//    } else {
//        echo("Email is valid");
//    };
//    $cupom          = filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
//    $status         = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
//    $nro_nfe        = filter_input(INPUT_POST, "idendereco", FILTER_SANITIZE_NUMBER_INT);
//    $cliente_id     = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_STRING);
//    $tipo_pagto_id  = filter_input(INPUT_POST, "nro_imovel", FILTER_SANITIZE_STRING);
//    $loja_id        = filter_input(INPUT_POST, "fone_movel", FILTER_SANITIZE_STRING);
//    $funcionario_id = filter_input(INPUT_POST, "fone_fixo", FILTER_SANITIZE_STRING);
//
//    
//
//    ## Column Class CLIENTE
//    $cliente->setNome($nome);
//    $cliente->setSobrenome($sobrenome);
//    $cliente->setEmail($email);
//    $cliente->setLoja_id(1);
//    $cliente->setEndereco_id($endereco_id);
//    $cliente->setComplemento($complemento);
//    $cliente->setNro_imovel($nro_imovel);
//    $cliente->setFone_movel($fone_movel);
//    $cliente->setFone_fixo($fone_fixo);
//    $cliente->setSenha($senha);
//
//    if (empty($cliente->existenciaEmail($email))) :
//        try {
//            $cliente->insert2();
//            $msgreturn='Cadastro realizado com sucesso!<br>Em instantes você será redirecionado...';
//            $tipo='success';
//            
//            $email  = $cliente->getEmail();
//            $senha  = $cliente->getSenha();
//            $cliente->setEmail($email);
//            $cliente->setSenha($senha);
//            
//            if ($cliente->logar($email, $senha)):
//                header("Refresh: 5, ../index.php"); 
//            endif;
//        }catch(PDOException $e){
//            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
//            $tipo='alert';
//            echo $e->getMessage();
//        }
//    else:
//        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Este Email já existente em nosso banco de dados!<br>Por favor, insira outro!';
//        $tipo='alert';
//    endif;
endif;