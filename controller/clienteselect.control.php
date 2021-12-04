<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clienteselect
 *
 * @author Jonathas
 */

$resultEndCli   = $cliente->find($_SESSION['id']);
$resultEndCli2  = $endereco->find($_SESSION['endereco_id']);
$resultEndCli3  = $cidade->find($resultEndCli2->cidade_id);
$resultEndCli4  = $estado->find($resultEndCli3->estado_id);