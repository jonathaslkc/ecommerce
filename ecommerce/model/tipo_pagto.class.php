<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_pagto
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class tipo_pagto extends crud {
	
    protected $table = 'tipo_pagto';
    private $tipo_pagto_id;
    private $titulo;
    private $subtitulo;
    private $parcelas;
    private $com_entrada;
    private $percent_entrada;
    private $boleto;


    function getTipo_pagto_id() {
        return $this->tipo_pagto_id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getSubtitulo() {
        return $this->subtitulo;
    }

    function getParcelas() {
        return $this->parcelas;
    }

    function getCom_entrada() {
        return $this->com_entrada;
    }

    function getPercent_entrada() {
        return $this->percent_entrada;
    }

    function getBoleto() {
        return $this->boleto;
    }

    function setTipo_pagto_id($tipo_pagto_id) {
        $this->tipo_pagto_id = $tipo_pagto_id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    function setParcelas($parcelas) {
        $this->parcelas = $parcelas;
    }

    function setCom_entrada($com_entrada) {
        $this->com_entrada = $com_entrada;
    }

    function setPercent_entrada($percent_entrada) {
        $this->percent_entrada = $percent_entrada;
    }

    function setBoleto($boleto) {
        $this->boleto = $boleto;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (titulo, subtitulo, parcelas, com_entrada, percent_entrada, boleto) VALUES (:titulo, :subtitulo, :parcelas, :com_entrada, :percent_entrada, :boleto)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':titulo',         $this->titulo);
        $stmt->bindParam(':subtitulo',      $this->subtitulo);
        $stmt->bindParam(':parcelas',       $this->parcelas);
        $stmt->bindParam(':com_entrada',    $this->com_entrada);
        $stmt->bindParam(':percent_entrada',$this->percent_entrada);
        $stmt->bindParam(':boleto',         $this->boleto);
        return $stmt->execute();
    }
    
    
    
    
    
    public function update($id){
        $sql  = "UPDATE $this->table SET nome = :nome, ultima_update = :ultima_update WHERE pais_id = :pais_id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',           $this->nome);
        $stmt->bindParam(':ultima_update',  $this->ultima_update);
        $stmt->bindParam(':pais_id',        $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}


