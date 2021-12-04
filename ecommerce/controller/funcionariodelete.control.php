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
    if(isset($_GET['acaoFuncdel']) && $_GET['acaoFuncdel'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        if ($funcionario->delete($id)):
            header('location: listagem-funcionarios.php');
        endif;
    endif;
