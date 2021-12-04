<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionarioinsert
 *
 * @author Jonathas
 */


if(isset($_POST['cadastrarfornecedor'])):
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../web/images/uploads/logotipos/';
    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e uma descrição única)
    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = md5(time()).'.'.$extensao;
    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final);


    # Column Table FORNECEDOR
    $cnpj       = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING);
    $estadual   = filter_input(INPUT_POST, "estadual", FILTER_SANITIZE_STRING);
    $municipal  = filter_input(INPUT_POST, "municipal", FILTER_SANITIZE_STRING);
    $razao      = filter_input(INPUT_POST, "razao", FILTER_SANITIZE_STRING);
    $fantasia   = filter_input(INPUT_POST, "fantasia", FILTER_SANITIZE_STRING);
    $foto       = 'web/images/uploads/logotipos/'.$nome_final;

    ## Column Class FORNECEDOR
    $fornecedor->setCnpj($cnpj);
    $fornecedor->setInsc_estadual($estadual);
    $fornecedor->setInsc_municipal($municipal);
    $fornecedor->setRazao_social($razao);
    $fornecedor->setFantasia($fantasia);
    $fornecedor->setImagem($foto);
    

    if (empty($fornecedor->existenciaCnpj($cnpj))) :
        try {
            $fornecedor->insert();
            $msgreturn='Sucesso!<br>O Fornecedor foi cadastrado com êxito!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... CNPJ já existente em nosso banco de dados!';
        $tipo='alert';
    endif;
endif;