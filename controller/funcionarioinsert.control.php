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


if(isset($_POST['cadastrarfuncionario'])):
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../web/images/uploads/fotos/';
    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e uma descrição única)
    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = md5(time()).'.'.$extensao;
    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final);

    $loja_id    = $_SESSION['loja'];

    # Column Table FUNCIONARIO
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $sobrenome  = filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
    $email      = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $endereco_id= filter_input(INPUT_POST, "idendereco", FILTER_SANITIZE_NUMBER_INT);
    $complemento= filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_STRING);
    $nro_imovel = filter_input(INPUT_POST, "nro_imovel", FILTER_SANITIZE_STRING);
    $foto       = 'web/images/uploads/fotos/'.$nome_final;
    $username   = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password   = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $perfil_id  = filter_input(INPUT_POST, "perfil", FILTER_SANITIZE_NUMBER_INT);

    ## Column Class FUNCIONARIO
    $funcionario->setNome($nome);
    $funcionario->setSobrenome($sobrenome);
    $funcionario->setEmail($email);
    $funcionario->setLoja_id($loja_id);
    $funcionario->setEndereco_id($endereco_id);
    $funcionario->setComplemento($complemento);
    $funcionario->setNro_imovel($nro_imovel);
    $funcionario->setFoto($foto);
    $funcionario->setUsername($username);
    $funcionario->setPassword($password);
    $funcionario->setPerfil_id($perfil_id);

    if (empty($funcionario->existenciaEmail($email))) :
        try {
            $funcionario->insert();
            $msgreturn='Sucesso!<br>O Funcionário foi cadastrado com êxito!';
            $tipo='success';
        
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Email já existente em nosso banco de dados!<br>Por favor, insira outro!';
        $tipo='alert';
    endif;
endif;