<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ncm
 *
 * @author Jonathas
 */
    /////////////////////////////////// TELA PARA EXCLUIR NCM //////////////////////////////////////////////////
    if(isset($_GET['acaoNcm']) && $_GET['acaoNcm'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];

        try {
            if ($ncm->delete($id)):
                header('location: listagem-ncm.php');
            else:
                echo 'Falha';
            endif;
        } catch (Exception $e) {
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    endif;