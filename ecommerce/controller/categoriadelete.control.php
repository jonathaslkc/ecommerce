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
    ///////////////////////////////////TELA PARA EXCLUIR CATEGORIA//////////////////////////////////////////////////
    if(isset($_GET['acaoCategoria']) && $_GET['acaoCategoria'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];

        try {
            if ($categoria->delete($id)):
                header('location: painelcategoria.php');
            else:
                echo 'Falha';
            endif;
        } catch (Exception $e) {
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado! Chave estrangeira em uso!';
            $tipo='alert';
            echo $e->getMessage();
        }
    endif;

    ///////////////////////////////////TELA PARA EXCLUIR SUBCATEGORIA//////////////////////////////////////////////////
    if(isset($_GET['acaoSubcat']) && $_GET['acaoSubcat'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        try {
            if ($subcategoria->deleteSC($id)):
                header('location: painelcategoria.php');
            else:
                echo 'Falha';
            endif;
        } catch (Exception $e) {
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
        
    endif;