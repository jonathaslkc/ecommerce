<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codbarras
 *
 * @author Jonathas
 */
   

///////////////////////////////////UPDATE - ATIVA DESATIVA NCM //////////////////////////////////////////////////
if(isset($_GET['ActionEditPanel']) && $_GET['ActionEditPanel'] == 'yes'):
    $id = $_GET['ident'];

    foreach($barra->findAll() as $key => $resultBarras): 
        if (md5($resultBarras->codbarra_id) == $id):
            $resultadoCodBarr = True;
            $resultadoCodBarrasValue = $barra->find($resultBarras->codbarra_id);
            $msgreturn='Sucesso!<br>Registro Capturado com êxito!';
            $tipo='success';
        endif;
    endforeach;
endif;

///////////////////////////////////UPDATE - NCM //////////////////////////////////////////////////    
if(isset($_POST['AlterarCodBarras'])):
    
    # Column Table CODBARRA
    $codbarra_id    = $_POST['codbarra_id'];
    $marca          = $_POST['marca'];
    $tamanho        = $_POST['tamanho'];
    $modelo         = $_POST['modelo'];
    $cor            = $_POST['cor'];

    ## Column Class CODBARRA
    $barra->setMarca($marca);
    $barra->setTamanho($tamanho);
    $barra->setModelo($modelo);
    $barra->setCor($cor);
    
    try {
        $barra->update($codbarra_id);
        $resultadoCodBarr = False;
        $msgreturn='Sucesso!<br>Código de Barras atualizado com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;