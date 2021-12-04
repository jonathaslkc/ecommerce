<?php

// Verifica se existe a variável txtnome
if (isset($_GET["txtnome"])) :
    $nome = $_GET["txtnome"];

require_once ('../model/config.class.php');
require_once '../model/endereco.class.php';

$endereco           = new endereco();

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
// define para que o PDO lance exceções caso ocorra erros
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultado = $endereco->buscacependereco($nome); //Crud em endereco.class.php
    
    sleep(1);
    
    // Verifica se a consulta retornou linhas 
    if ($resultado <> ''):
        if (!(empty($resultado))):
            echo'<div class="row" style="border:5px solid #E03339">
                    <div class="col-sm-6">
                        <label>Logradouro</label>
                        <input type="text" name="logradouro" id="rua" value="'.utf8_encode($resultado->logradouro).'"/>
                    </div>
                    <div class="col-sm-6">
                        <label>Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="'.utf8_encode($resultado->Bairro).'" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label>Cidade</label>
                        <input type="text" name="cidade" id="cidade" value="'.utf8_encode($resultado->Cidade).'" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label>Estado</label>
                        <input type="text" name="uf" id="uf" value="'.utf8_encode($resultado->Estado).'" readonly>
                        <input type="text" name="idendereco" id="idendereco" hidden value="'.$resultado->idEnd.'" >
                    </div>
                </div>';
        else:
            // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
            echo "<p><label class='text-danger'>Nenhum registro encontrado para esse CEP!<br> Por favor, digite um CEP válido!</label></p>";
        endif;
    else:
        echo "<p><label class='text-danger'>Favor, insira um CEP!</label></p>";
    endif;
endif;