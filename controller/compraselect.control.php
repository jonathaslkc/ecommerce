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
   

///////////////////////////////////SELECT - COMPRA - FINALIZA_COMPRA //////////////////////////////////////////////////
$resulDadosCliente = $cliente->find($_SESSION['id']);
$resulDadosEntrega = $endereco->find($_SESSION['endereco_id']);
$resulDadosCidade  = $cidade->find($resulDadosEntrega->cidade_id);
$resulDadosEstado  = $estado->find($resulDadosCidade->estado_id);