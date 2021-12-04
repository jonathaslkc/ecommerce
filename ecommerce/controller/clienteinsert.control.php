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


if(isset($_POST['cadastrocliente'])):

    # Column Table CLIENTE
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $sobrenome  = filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
    $email      = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $endereco_id= filter_input(INPUT_POST, "idendereco", FILTER_SANITIZE_NUMBER_INT);
    $complemento= filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_STRING);
    $nro_imovel = filter_input(INPUT_POST, "nro_imovel", FILTER_SANITIZE_STRING);
    $fone_movel = filter_input(INPUT_POST, "fone_movel", FILTER_SANITIZE_STRING);
    $fone_fixo  = filter_input(INPUT_POST, "fone_fixo", FILTER_SANITIZE_STRING);
    $senha      = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);
    

    ## Column Class CLIENTE
    $cliente->setNome($nome);
    $cliente->setSobrenome($sobrenome);
    $cliente->setEmail($email);
    $cliente->setLoja_id(1);
    $cliente->setEndereco_id($endereco_id);
    $cliente->setComplemento($complemento);
    $cliente->setNro_imovel($nro_imovel);
    $cliente->setFone_movel($fone_movel);
    $cliente->setFone_fixo($fone_fixo);
    $cliente->setSenha($senha);

    if (empty($cliente->existenciaEmail($email))) :
        try {
            $cliente->insert2();
            $msgreturn='Cadastro realizado com sucesso!<br>Em instantes você será redirecionado...';
            $tipo='success';
            
            $email  = $cliente->getEmail();
            $senha  = $cliente->getSenha();
            $cliente->setEmail($email);
            $cliente->setSenha($senha);
            
            if ($cliente->logar($email, $senha)):
                header("Refresh: 5, ../index.php"); 
            endif;
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


if(isset($_POST['cadclienteidentificacao'])):

    # Column Table CLIENTE
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $sobrenome  = filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
    $email      = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $endereco_id= filter_input(INPUT_POST, "idendereco", FILTER_SANITIZE_NUMBER_INT);
    $complemento= filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_STRING);
    $nro_imovel = filter_input(INPUT_POST, "nro_imovel", FILTER_SANITIZE_STRING);
    $fone_movel = filter_input(INPUT_POST, "fone_movel", FILTER_SANITIZE_STRING);
    $fone_fixo  = filter_input(INPUT_POST, "fone_fixo", FILTER_SANITIZE_STRING);
    $senha      = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);
    

    ## Column Class CLIENTE
    $cliente->setNome($nome);
    $cliente->setSobrenome($sobrenome);
    $cliente->setEmail($email);
    $cliente->setLoja_id(1);
    $cliente->setEndereco_id($endereco_id);
    $cliente->setComplemento($complemento);
    $cliente->setNro_imovel($nro_imovel);
    $cliente->setFone_movel($fone_movel);
    $cliente->setFone_fixo($fone_fixo);
    $cliente->setSenha($senha);

    if (empty($cliente->existenciaEmail($email))) :
        try {
            $cliente->insert2();
            $msgreturn='Cadastro realizado com sucesso!<br>Em instantes você será redirecionado...';
            $tipo='success';
            
            $email  = $cliente->getEmail();
            $senha  = $cliente->getSenha();
            $cliente->setEmail($email);
            $cliente->setSenha($senha);
            
            if ($cliente->logar($email, $senha)):
                header("Refresh: 5, finaliza-compra.php"); 
            endif;
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi feito!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Este Email já existente em nosso banco de dados!<br>Por favor, insira outro!';
        $tipo='alert';
    endif;
endif;