<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of compra
 *
 * @author Jonathas
 */
   

///////////////////////////////////DELETE - ARRAY PRODUTO //////////////////////////////////////////////////
if(isset($_GET['acao']) && $_GET['acao'] == 'deletaritem'):
        $iditem = (int)$_GET['iditem'];
        unset($_SESSION['item'][$iditem]);
        header('location: compras.php');
    endif;