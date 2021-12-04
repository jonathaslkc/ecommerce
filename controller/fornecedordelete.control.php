<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionariodelete
 *
 * @author Jonathas
 */
    ///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['acaoForndel']) && $_GET['acaoForndel'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        if ($fornecedor->delete($id)):
            header('location: listagem-fornecedores.php');
        endif;
    endif;
