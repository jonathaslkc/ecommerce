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
   

///////////////////////////////////UPDATE - ACRESCENTA / DESCRESCENTA QTD ARRAY PRODUTO //////////////////////////////////////////////////

if(isset($_GET['add'])){
    $idadd = (int)$_GET['add'];
    $_SESSION['item'][$idadd][2]++;
    header('location: compras.php');
}
if(isset($_GET['dec'])){
    $iddec = (int)$_GET['dec'];
    if ($_SESSION['item'][$iddec][2] > 1):
        $_SESSION['item'][$iddec][2]--;
    endif;
    header('location: compras.php');
}