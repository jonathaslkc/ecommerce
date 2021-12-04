<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ncm
 *
 * @author Jonathas
 */

# NCM
if(isset($_POST['cadncm'])):

    # Column Table NCM
    $ncm_id     = filter_input(INPUT_POST, "ncm", FILTER_SANITIZE_STRING);
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $cest       = filter_input(INPUT_POST, "cest", FILTER_SANITIZE_STRING);
    $st         = filter_input(INPUT_POST, "st", FILTER_SANITIZE_STRING);
    $icms       = filter_input(INPUT_POST, "icms", FILTER_SANITIZE_NUMBER_FLOAT);
    $pis        = filter_input(INPUT_POST, "pis", FILTER_SANITIZE_NUMBER_FLOAT);
    $ipi        = filter_input(INPUT_POST, "ipi", FILTER_SANITIZE_NUMBER_FLOAT);
    $cofins     = filter_input(INPUT_POST, "cofins", FILTER_SANITIZE_NUMBER_FLOAT);
    $csosn      = filter_input(INPUT_POST, "csosn", FILTER_SANITIZE_STRING);
    $icms_subst = filter_input(INPUT_POST, "icms_subst", FILTER_SANITIZE_NUMBER_FLOAT);
    
    ## Column Class NCM
    $ncm->setNcm_id($ncm_id);
    $ncm->setNome($nome);
    $ncm->setCest($cest);
    $ncm->setSt($st);
    $ncm->setIcms($icms);
    $ncm->setPis($pis);
    $ncm->setIpi($ipi);
    $ncm->setCofins($cofins);
    $ncm->setCsosn($csosn);
    $ncm->setIcms_subst($icms_subst);
    
    if (empty($ncm->selectexisteregistro($ncm_id))):
        try {
            $ncm->insert();
            $msgreturn='Sucesso!<br>Cadastro realizado com êxito!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... O NCM já existe em nosso banco de dados!';
        $tipo='alert';
    endif;
endif;