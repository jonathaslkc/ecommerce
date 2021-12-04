<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionarioupdate
 *
 * @author Jonathas
 */
///////////////////////////////////UPDATE - ATIVA DESATIVA CADASTRO //////////////////////////////////////////////////
if(isset($_GET['acaoativafunc']) && $_GET['acaoativafunc'] == 'altera'): //Ação de deletar
    $id = $_GET['id'];
    if ($funcionario->alteraativod($id)):
        header('location: listagem-funcionarios.php');
    endif;
endif;
    
if(isset($_GET['acaodesativafunc']) && $_GET['acaodesativafunc'] == 'altera'): //Ação de deletar
    $id = $_GET['id'];
    if ($funcionario->alteraativoa($id)):
        header('location: listagem-funcionarios.php');
    endif;
endif;
    
///////////////////////////////////UPDATE - CADASTRO IMAGEM //////////////////////////////////////////////////    
if(isset($_POST['editarfuncionariofoto'])):
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../web/images/uploads/fotos/';
    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e uma descrição única)
    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = md5(time()).'.'.$extensao;
    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final);

    $id = $_GET['id'];  #ID
    
    # Column Table FUNCIONARIO
    $foto       = 'web/images/uploads/fotos/'.$nome_final;
    
    ## Column Class FUNCIONARIO
    $funcionario->setFoto($foto);
    if ($_FILES['foto']['tmp_name'] != NULL):
        try {
            $funcionario->updateFoto($id);
            $msgreturn='Sucesso!<br>Foto cadastrada com êxito!';
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
if(isset($_POST['editarfuncionario'])):
    $id = $_GET['id'];  #ID
    
    # Column Table FUNCIONARIO
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $sobrenome  = filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
    $email      = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $endereco_id= filter_input(INPUT_POST, "idendereco", FILTER_SANITIZE_NUMBER_INT);
    $complemento= filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_STRING);
    $nro_imovel = filter_input(INPUT_POST, "nro_imovel", FILTER_SANITIZE_STRING);
    $username   = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password   = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $perfil_id  = filter_input(INPUT_POST, "perfil", FILTER_SANITIZE_NUMBER_INT);
    $ativo      = filter_input(INPUT_POST, "ativo", FILTER_SANITIZE_NUMBER_INT);

    
    if ($password == NULL):
        ## Column Class FUNCIONARIO
        $funcionario->setNome($nome);
        $funcionario->setSobrenome($sobrenome);
        $funcionario->setEmail($email);
        $funcionario->setEndereco_id($endereco_id);
        $funcionario->setComplemento($complemento);
        $funcionario->setNro_imovel($nro_imovel);
        $funcionario->setUsername($username);
        #$funcionario->setPassword($password);
        $funcionario->setPerfil_id($perfil_id);
        $funcionario->setAtivo($ativo);
        
        if (empty($funcionario->existenciaEmail2($email,$id))) :
            try {
                $funcionario->update($id);
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
    else:
        ## Column Class FUNCIONARIO
        $funcionario->setNome($nome);
        $funcionario->setSobrenome($sobrenome);
        $funcionario->setEmail($email);
        $funcionario->setEndereco_id($endereco_id);
        $funcionario->setComplemento($complemento);
        $funcionario->setNro_imovel($nro_imovel);
        $funcionario->setUsername($username);
        $funcionario->setPassword($password);
        $funcionario->setPerfil_id($perfil_id);
        $funcionario->setAtivo($ativo);
        if (empty($funcionario->existenciaEmail2($email,$id))) :
            try {
                $funcionario->updateComSenha($id);
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
endif;
