<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of preco
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class preco extends crud {
	
    protected $table = 'preco';
    private $produto_id;
    private $preco_venda;
    private $preco_compra;
    private $preco_promocional;
    private $preco_custo;
    private $desconto;


    function getProduto_id() {
        return $this->produto_id;
    }

    function getPreco_venda() {
        return $this->preco_venda;
    }

    function getPreco_compra() {
        return $this->preco_compra;
    }

    function getPreco_promocional() {
        return $this->preco_promocional;
    }

    function getPreco_custo() {
        return $this->preco_custo;
    }

    function getDesconto() {
        return $this->desconto;
    }

    function setProduto_id($produto_id) {
        $this->produto_id = $produto_id;
    }

    function setPreco_venda($preco_venda) {
        $this->preco_venda = $preco_venda;
    }

    function setPreco_compra($preco_compra) {
        $this->preco_compra = $preco_compra;
    }

    function setPreco_promocional($preco_promocional) {
        $this->preco_promocional = $preco_promocional;
    }

    function setPreco_custo($preco_custo) {
        $this->preco_custo = $preco_custo;
    }

    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (produto_id, preco_venda, preco_compra, preco_promocional, preco_custo, desconto) VALUES (:produto_id, :preco_venda, :preco_compra, :preco_promocional, :preco_custo, :desconto)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':produto_id',         $this->produto_id);
        $stmt->bindParam(':preco_venda',        $this->preco_venda);
        $stmt->bindParam(':preco_compra',       $this->preco_compra);
        $stmt->bindParam(':preco_promocional',  $this->preco_promocional);
        $stmt->bindParam(':preco_custo',        $this->preco_custo);
        $stmt->bindParam(':desconto',           $this->desconto);
        return $stmt->execute();
    }

    public function find2($produto_id){
        $sql  = "SELECT * FROM $this->table WHERE produto_id = :produto_id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    } 
    
    public function delete2($id){
        $sql  = "DELETE FROM $this->table WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); 
    }
    
    public function updatePrecoCusto($id){
        $sql  = "UPDATE $this->table SET preco_venda = :preco_venda, preco_compra = :preco_compra, preco_promocional = :preco_promocional, preco_custo = :preco_custo, desconto = :desconto WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':preco_venda',        $this->preco_venda);
        $stmt->bindParam(':preco_compra',       $this->preco_compra);
        $stmt->bindParam(':preco_promocional',  $this->preco_promocional);
        $stmt->bindParam(':preco_custo',        $this->preco_custo);
        $stmt->bindParam(':desconto',           $this->desconto);
        $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
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


