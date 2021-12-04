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

# NCM
if(isset($_POST['cadCodBarras'])):

    # Column Table CODBARRA
    $codbarra_id    = $_POST['codbarra_id'];
    $produto_id     = $_POST['produto_id'];
    $fornecedor_id  = $_POST['fornecedor_id'];
    $marca          = $_POST['marca'];
    $tamanho        = $_POST['tamanho'];
    $modelo         = $_POST['modelo'];
    $cor            = $_POST['cor'];

    ## Column Class CODBARRA
    $barra->setCodbarra_id($codbarra_id);
    $barra->setProduto_id($produto_id);
    $barra->setFornecedor_id($fornecedor_id);
    $barra->setMarca($marca);
    $barra->setTamanho($tamanho);
    $barra->setModelo($modelo);
    $barra->setCor($cor);
    
    if (empty($ncm->selectexisteregistro($codbarra_id))):
        try {
            $barra->insert();
            $msgreturn='Sucesso!<br>Cadastro realizado com êxito!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... O Código de Barras já existe em nosso banco de dados!';
        $tipo='alert';
    endif;
endif;