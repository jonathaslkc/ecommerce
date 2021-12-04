<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NCM
 *
 * @author Jonathas
 */
   

///////////////////////////////////UPDATE - ATIVA DESATIVA NCM //////////////////////////////////////////////////
if(isset($_GET['ActionEditPanel']) && $_GET['ActionEditPanel'] == 'yes'):
    $id = $_GET['ident'];

    foreach($ncm->findAll() as $key => $resultNcm2): 
        if (md5($resultNcm2->ncm_id) == $id):
            $resultadoNCM = True;
            $resultadoNCMValue = $ncm->find($resultNcm2->ncm_id);
            $msgreturn='Sucesso!<br>Registro Capturado com êxito!';
            $tipo='success';
        endif;
    endforeach;
endif;

///////////////////////////////////UPDATE - NCM //////////////////////////////////////////////////    
if(isset($_POST['AlterarNCM'])):
    
    # Column Table NCM
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $cest       = filter_input(INPUT_POST, "cest", FILTER_SANITIZE_STRING);
    $st         = filter_input(INPUT_POST, "st", FILTER_SANITIZE_STRING);
    $icms       = filter_input(INPUT_POST, "icms", FILTER_SANITIZE_STRING);
    $pis        = filter_input(INPUT_POST, "pis", FILTER_SANITIZE_STRING);
    $ipi        = filter_input(INPUT_POST, "ipi", FILTER_SANITIZE_STRING);
    $cofins     = filter_input(INPUT_POST, "cofins", FILTER_SANITIZE_STRING);
    $csosn      = filter_input(INPUT_POST, "csosn", FILTER_SANITIZE_STRING);
    $icms_subst = filter_input(INPUT_POST, "icms_subst", FILTER_SANITIZE_STRING);
    
    ## Column Class NCM
    $ncm->setNome($nome);
    $ncm->setCest($cest);
    $ncm->setSt($st);
    $ncm->setIcms($icms);
    $ncm->setPis($pis);
    $ncm->setIpi($ipi);
    $ncm->setCofins($cofins);
    $ncm->setCsosn($csosn);
    $ncm->setIcms_subst($icms_subst);
    
    try {
        $ncm->update($resultadoNCMValue->ncm_id);
        $resultadoNCM = False;
        $msgreturn='Sucesso!<br>NCM atualizado com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;


///////////////////////////////////UPDATE - NCM //////////////////////////////////////////////////    
if(isset($_POST['AlterarSubCat'])):
    
    # Column Table SUBCATEGORIA
    $idSCat      = filter_input(INPUT_POST, "idedit", FILTER_SANITIZE_NUMBER_INT);
    $nomeSCat    = filter_input(INPUT_POST, "subcategoriaedit", FILTER_SANITIZE_STRING);
   
    ## Column Class SUBCATEGORIA
    $subcategoria->setNome($nomeSCat);

    try {
        $subcategoria->update($idSCat);
        $msgreturn='Sucesso!<br>A SubCategoria foi alterada com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;