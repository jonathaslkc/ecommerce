<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ecommerce
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class ecommerce extends crud {

    protected $table = 'ecommerce';
    private $ecommerce_id;
    private $data;
    private $valor;
    private $cupom;
    private $status;
    private $nro_nfe;
    private $cliente_id;
    private $tipo_pagto_id;
    private $loja_id;
    private $funcionario_id;
    private $ultimo_id;


    function getEcommerce_id() {
        return $this->ecommerce_id;
    }

    function getData() {
        return $this->data;
    }

    function getValor() {
        return $this->valor;
    }

    function getCupom() {
        return $this->cupom;
    }

    function getStatus() {
        return $this->status;
    }

    function getNro_nfe() {
        return $this->nro_nfe;
    }

    function getCliente_id() {
        return $this->cliente_id;
    }

    function getTipo_pagto_id() {
        return $this->tipo_pagto_id;
    }

    function getLoja_id() {
        return $this->loja_id;
    }

    function getFuncionario_id() {
        return $this->funcionario_id;
    }

    function getUltimo_id() {
        return $this->ultimo_id;
    }
    
    function setEcommerce_id($ecommerce_id) {
        $this->ecommerce_id = $ecommerce_id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setCupom($cupom) {
        $this->cupom = $cupom;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setNro_nfe($nro_nfe) {
        $this->nro_nfe = $nro_nfe;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    function setTipo_pagto_id($tipo_pagto_id) {
        $this->tipo_pagto_id = $tipo_pagto_id;
    }

    function setLoja_id($loja_id) {
        $this->loja_id = $loja_id;
    }

    function setFuncionario_id($funcionario_id) {
        $this->funcionario_id = $funcionario_id;
    }

    function setUltimo_id($ultimo_id) {
        $this->ultimo_id = $ultimo_id;
    }
    

    public function insert(){
        $sql  = "INSERT INTO $this->table (valor, cupom, status, nro_nfe, cliente_id, tipo_pagto_id, loja_id, funcionario_id) VALUES (:valor, :cupom, :status, :nro_nfe, :cliente_id, :tipo_pagto_id, :loja_id, :funcionario_id)";
        $stmt = DB::prepare($sql);
        #$stmt->bindParam(':data',           $this->data);
        $stmt->bindParam(':valor',          $this->valor);
        $stmt->bindParam(':cupom',          $this->cupom);
        $stmt->bindParam(':status',         $this->status);
        $stmt->bindParam(':nro_nfe',        $this->nro_nfe);
        $stmt->bindParam(':cliente_id',     $this->cliente_id);
        $stmt->bindParam(':tipo_pagto_id',  $this->tipo_pagto_id);
        $stmt->bindParam(':loja_id',        $this->loja_id);
        $stmt->bindParam(':funcionario_id', $this->funcionario_id);
        $stmt->execute();
        return $this->ultimo_id = DB::getInstance()->lastInsertId();
    }

    public function buscaPedidoCli($cliente_id){
        $sql  = "SELECT * FROM $this->table WHERE cliente_id = :cliente_id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
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


