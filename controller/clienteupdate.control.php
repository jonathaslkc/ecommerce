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


if(isset($_POST['alteraenderecocliente'])):

    # Column Table CLIENTE
    
    $endereco_id= filter_input(INPUT_POST, "idendereco", FILTER_SANITIZE_NUMBER_INT);
    $complemento= filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_STRING);
    $nro_imovel = filter_input(INPUT_POST, "nro_imovel", FILTER_SANITIZE_STRING);
    

    ## Column Class CLIENTE
    $cliente->setEndereco_id($endereco_id);
    $cliente->setComplemento($complemento);
    $cliente->setNro_imovel($nro_imovel);
    
    if (!empty($endereco->existenciaCep($cliente->getEndereco_id()))):
        try {
            //Atualizando a Session
            $_SESSION['endereco_id']= $cliente->getEndereco_id();

            $cliente->updateEndereco($_SESSION['id']);
            $msgreturn='Atualização realizada com sucesso!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... O Cep mencionado não existe em nosso banco de dados!';
        $tipo='alert';
    endif;
endif;


if(isset($_POST['alteradadoscliente'])):
# Column Table CLIENTE
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $sobrenome  = filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
    $fone_movel = filter_input(INPUT_POST, "fone_movel", FILTER_SANITIZE_STRING);
    $fone_fixo  = filter_input(INPUT_POST, "fone_fixo", FILTER_SANITIZE_STRING);
    

    ## Column Class CLIENTE
    $cliente->setNome($nome);
    $cliente->setSobrenome($sobrenome);
    $cliente->setFone_movel($fone_movel);
    $cliente->setFone_fixo($fone_fixo);

    try {
        
        $_SESSION['usuario']    = $cliente->getNome();
        
        $cliente->updateEnderecoDA($_SESSION['id']);
        $msgreturn='Dados alterados com sucesso!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;


if(isset($_POST['alteraemailcliente'])):
    # Column Table CLIENTE
    $email      = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    

    ## Column Class CLIENTE
    $cliente->setEmail($email);

    if (empty($cliente->existenciaEmail($email))) :
        try {
        
            $_SESSION['emailusu'] = $cliente->getEmail();
            
            $cliente->updateEnderecoEmail($_SESSION['id']);
            $msgreturn='Email alterado com sucesso!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Este Email já existente em nosso banco de dados!<br>Por favor, insira outro!';
        $tipo='alert';
    endif;
endif;

if(isset($_POST['alterasenhacliente'])):
    # Column Table CLIENTE
    $senha  = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

    ## Column Class CLIENTE
    $cliente->setSenha($senha);

    try {
        $cliente->updateEnderecoSenha($_SESSION['id']);
        $msgreturn='Senha alterada com sucesso!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;