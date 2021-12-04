<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produto_ecommerce
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class produto_ecommerce extends crud {
	
    protected $table = 'produto_ecommerce';
    private $produto_id;
    private $quantidade;
    private $preco;
    private $desconto;
    private $ecommerce_id;


    function getProduto_id() {
        return $this->produto_id;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getPreco() {
        return $this->preco;
    }

    function getDesconto() {
        return $this->desconto;
    }

    function getEcommerce_id() {
        return $this->ecommerce_id;
    }

    function setProduto_id($produto_id) {
        $this->produto_id = $produto_id;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    function setEcommerce_id($ecommerce_id) {
        $this->ecommerce_id = $ecommerce_id;
    }

    
    public function insert(){
        $sql  = "INSERT INTO $this->table (produto_id, quantidade, preco, marca, desconto, ecommerce_id) VALUES (:produto_id, :quantidade, :preco, :marca, :desconto, :ecommerce_id)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':produto_id',     $this->produto_id);
        $stmt->bindParam(':quantidade',     $this->quantidade);
        $stmt->bindParam(':preco',          $this->preco);
        $stmt->bindParam(':marca',          $this->marca);
        $stmt->bindParam(':desconto',       $this->desconto);
        $stmt->bindParam(':ecommerce_id',   $this->ecommerce_id);
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


