<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Jonathas
 */
   

///////////////////////////////////UPDATE - ATIVA DESATIVA CATEGORIA //////////////////////////////////////////////////
if(isset($_GET['acaoativaCat']) && $_GET['acaoativaCat'] == 'altera'):
    $id = $_GET['id'];
    if ($categoria->alteraativoa($id)):
        header('location: painelcategoria.php');
    endif;
endif;
    
if(isset($_GET['acaodesativaCat']) && $_GET['acaodesativaCat'] == 'altera'):
    $id = $_GET['id'];
    if ($categoria->alteraativod($id)):
        header('location: painelcategoria.php');
    endif;
endif;

///////////////////////////////////UPDATE - CATEGORIA //////////////////////////////////////////////////    
if(isset($_POST['AlterarCat'])):
    
    # Column Table CATEGORIA
    #$cnpj       = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING);
    $idCat      = filter_input(INPUT_POST, "id2edit", FILTER_SANITIZE_NUMBER_INT);
    $nomeCat    = filter_input(INPUT_POST, "categoriaedit", FILTER_SANITIZE_STRING);
   
    ## Column Class CATEGORIA
    $categoria->setNome($nomeCat);

    if ($categoria->selectexisteregistro($nomeCat) == NULL):
        try {
            $categoria->update($idCat);
            $msgreturn='Sucesso!<br>A Categoria foi alterada com êxito!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nome de Categoria existente em nosso banco de dados!';
        $tipo='alert';
    endif;
endif;


///////////////////////////////////UPDATE - SUBCATEGORIA //////////////////////////////////////////////////    
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