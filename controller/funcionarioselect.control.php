<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionarioselect
 *
 * @author Jonathas
 */

if(isset($_GET['acao']) && $_GET['acao'] == 'editar'):
    $id = (int)$_GET['id'];
    $resultado = $funcionario->find($id);
endif;