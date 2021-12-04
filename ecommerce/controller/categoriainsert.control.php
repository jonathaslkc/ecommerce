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

# CATEGORIA
if(isset($_POST['InserirCat'])):

    # Column Table CATEGORIA
    $nome       = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_STRING);
    
    ## Column Class CATEGORIA
    $categoria->setNome($nome);
    
    if (empty($categoria->selectexisteregistro($nome))) :
        try {
            $categoria->insert();
            $msgreturn='Sucesso!<br>A Categoria foi cadastrada com êxito!';
            $tipo='success';
        }catch(PDOException $e){
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    else:
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... A Categoria já existe em nosso banco de dados!';
        $tipo='alert';
    endif;
endif;



# SUBCATEGORIA
if(isset($_POST['InserirSubCat'])):

    # Column Table SUBCATEGORIA
    $subcategoriaN = filter_input(INPUT_POST, "subcategoria", FILTER_SANITIZE_STRING);
    $categoria_id  = filter_input(INPUT_POST, "fkcategoria", FILTER_SANITIZE_NUMBER_INT);
    
    ## Column Class SUBCATEGORIA
    $subcategoria->setNome($subcategoriaN);
    $subcategoria->setCategoria_id($categoria_id);

    try {
        $subcategoria->insert();
        $msgreturn='Sucesso!<br>A SubCategoria foi cadastrada com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;