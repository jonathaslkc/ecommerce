<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fornecedorupdate
 *
 * @author Jonathas
 */
    
///////////////////////////////////UPDATE - CADASTRO IMAGEM //////////////////////////////////////////////////    
if(isset($_POST['editarfornecedorfoto'])):
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../web/images/uploads/logotipos/';
    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e uma descrição única)
    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = md5(time()).'.'.$extensao;
    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final);

    $id = $_GET['id'];  #ID
    
    # Column Table FORNECEDOR
    $foto       = 'web/images/uploads/logotipos/'.$nome_final;
    
    ## Column Class FORNECEDOR
    $fornecedor->setImagem($foto);
    if ($_FILES['foto']['tmp_name'] != NULL):
        try {
            $fornecedor->updateFoto($id);
            $msgreturn='Sucesso!<br>Imagem cadastrada com êxito!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nenhum arquivo de imagem encontrado!';
        $tipo='alert';
    endif;
endif;

///////////////////////////////////UPDATE - CADASTRO //////////////////////////////////////////////////    
if(isset($_POST['editarfornecedor'])):
    $id = $_GET['id'];  #ID
    
    # Column Table FORNECEDOR
    #$cnpj       = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING);
    $estadual   = filter_input(INPUT_POST, "estadual", FILTER_SANITIZE_STRING);
    $municipal  = filter_input(INPUT_POST, "municipal", FILTER_SANITIZE_STRING);
    $razao      = filter_input(INPUT_POST, "razao", FILTER_SANITIZE_STRING);
    $fantasia   = filter_input(INPUT_POST, "fantasia", FILTER_SANITIZE_STRING);

   
    ## Column Class FUNCIONARIO
    #$fornecedor->setCnpj($cnpj);
    $fornecedor->setInsc_estadual($estadual);
    $fornecedor->setInsc_municipal($municipal);
    $fornecedor->setRazao_social($razao);
    $fornecedor->setFantasia($fantasia);

    try {
        $fornecedor->update($id);
        $msgreturn='Sucesso!<br>O Fornecedor foi alterado com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;
