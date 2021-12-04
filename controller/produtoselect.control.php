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

if(isset($_GET['acao']) && $_GET['acao'] == 'editar'):
    $id = (int)$_GET['id'];
    $resultado          = $itens->find($id);
    $resultadopreco     = $preco->find2($resultado->produto_id);
    $resultadocodbarra  = $barra->find2($resultado->produto_id);
    $resultadocodbarraAll   = $barra->findAll($resultado->produto_id);
    $resultadofornecedor    = $fornecedor->find($resultadocodbarra->fornecedor_id);
    $resultadoccategoria    = $categoria->find($resultado->categoria_id);
    $resultadosubcategoria  = $subcategoria->find2($resultado->subcategoria_id);
endif;