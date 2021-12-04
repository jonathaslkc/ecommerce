<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codbarras
 *
 * @author Jonathas
 */
    /////////////////////////////////// TELA PARA EXCLUIR CODBARRAS //////////////////////////////////////////////////
    if(isset($_GET['acaoCodBarras']) && $_GET['acaoCodBarras'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];

        try {
            if ($barra->delete($id)):
                header('location: listagem-codbarras.php');
            else:
                echo 'Falha';
            endif;
        } catch (Exception $e) {
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    endif;