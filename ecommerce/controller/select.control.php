<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fornecedorselect
 *
 * @author Jonathas
 */

if(isset($_GET['acao']) && $_GET['acao'] == 'mostra'):
    $id                     = $_GET['p'];
    $resultado              = $itens->find($id);
    $resultadoPreco         = $preco->find2($resultado->produto_id);
    $resultadoCategoria     = $categoria->find($resultado->categoria_id);
    $resultadoSubcategoria  = $subcategoria->find2($resultado->subcategoria_id);
endif;

if(isset($_POST['additemcar'])):
    
    if(!isset($_SESSION['item'])):
        $_SESSION['item'] = array();
    endif;

    if(empty($_SESSION['item'][$id])):
        $_SESSION['item'][$id] = array($id,$resultado->nome,1,$resultado->valor);
        #echo '<script>alert("Produto Adicionado com Sucesso!")</script>';
        header('location: compras.php');
    else:
        header('location: compras.php');
    endif;
endif;

