<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codbarra
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class codbarra extends crud {
	
    protected $table = 'codbarra';
    private $codbarra_id;
    private $produto_id;
    private $fornecedor_id;
    private $marca;
    private $tamanho;
    private $modelo;
    private $cor;


    function getCodbarra_id() {
        return $this->codbarra_id;
    }

    function getProduto_id() {
        return $this->produto_id;
    }

    function getFornecedor_id() {
        return $this->fornecedor_id;
    }

    function getMarca() {
        return $this->marca;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getCor() {
        return $this->cor;
    }

    function setCodbarra_id($codbarra_id) {
        $this->codbarra_id = $codbarra_id;
    }

    function setProduto_id($produto_id) {
        $this->produto_id = $produto_id;
    }

    function setFornecedor_id($fornecedor_id) {
        $this->fornecedor_id = $fornecedor_id;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (codbarra_id, produto_id, fornecedor_id, marca, tamanho, modelo, cor) VALUES (:codbarra_id, :produto_id, :fornecedor_id, :marca, :tamanho, :modelo, :cor)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':codbarra_id',    $this->codbarra_id);
        $stmt->bindParam(':produto_id',     $this->produto_id);
        $stmt->bindParam(':fornecedor_id',  $this->fornecedor_id);
        $stmt->bindParam(':marca',          $this->marca);
        $stmt->bindParam(':tamanho',        $this->tamanho);
        $stmt->bindParam(':modelo',         $this->modelo);
        $stmt->bindParam(':cor',            $this->cor);
        return $stmt->execute();
    }

    public function update($codbarra_id){
        $sql  = "UPDATE $this->table SET marca = :marca, tamanho = :tamanho, modelo = :modelo, cor = :cor WHERE codbarra_id = :codbarra_id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':marca',      $this->marca);
        $stmt->bindParam(':tamanho',    $this->tamanho);
        $stmt->bindParam(':modelo',     $this->modelo);
        $stmt->bindParam(':cor',        $this->cor);
        $stmt->bindParam(':codbarra_id',$codbarra_id, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function find2($produto_id){
        $sql  = "SELECT * FROM $this->table WHERE produto_id = :produto_id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function findAll2($cod){
        $sql  = "SELECT * FROM $this->table WHERE produto_id = :cod";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cod', $cod, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function delete2($id){
        $sql  = "DELETE FROM $this->table WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); 
    }
    
    public function updateCodBar($id){
        $sql  = "UPDATE $this->table SET fornecedor_id = :fornecedor_id, ativo = :ativo, destacar_site = :destacar_site WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':fornecedor_id',  $this->fornecedor_id);
        $stmt->bindParam(':codbarra_id',    $this->codbarra_id);
        $stmt->bindParam(':destacar_site',  $this->destacar_site);
        $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function findCodBarras($cod){
        $sql  = "SELECT * FROM $this->table WHERE codbarra_id LIKE "."'"."$cod"."%'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cod', $cod, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function selectexisteregistro($cod){
        $sql  = "SELECT 0 FROM $this->table WHERE codbarra_id = :cod";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cod', $cod, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 se existir
            return $stmt->fetchAll();
        }
    }
    
    public function findAllForn(){
            $sql  = "SELECT * FROM $this->table Order by produto_id";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
    }
}


