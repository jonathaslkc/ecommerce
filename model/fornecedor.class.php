<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fornecedor
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class fornecedor extends crud {

    protected $table = 'fornecedor';
    private $fornecedor_id;
    private $cnpj;
    private $insc_estadual;
    private $insc_municipal;
    private $razao_social;
    private $fantasia;
    private $imagem;


    function getFornecedor_id() {
        return $this->fornecedor_id;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getInsc_estadual() {
        return $this->insc_estadual;
    }

    function getInsc_municipal() {
        return $this->insc_municipal;
    }

    function getRazao_social() {
        return $this->razao_social;
    }

    function getFantasia() {
        return $this->fantasia;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setFornecedor_id($fornecedor_id) {
        $this->fornecedor_id = $fornecedor_id;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setInsc_estadual($insc_estadual) {
        $this->insc_estadual = $insc_estadual;
    }

    function setInsc_municipal($insc_municipal) {
        $this->insc_municipal = $insc_municipal;
    }

    function setRazao_social($razao_social) {
        $this->razao_social = $razao_social;
    }

    function setFantasia($fantasia) {
        $this->fantasia = $fantasia;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (cnpj, insc_estadual, insc_municipal, razao_social, fantasia, imagem) VALUES (:cnpj, :insc_estadual, :insc_municipal, :razao_social, :fantasia, :imagem)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cnpj',           $this->cnpj);
        $stmt->bindParam(':insc_estadual',  $this->insc_estadual);
        $stmt->bindParam(':insc_municipal', $this->insc_municipal);
        $stmt->bindParam(':razao_social',   $this->razao_social);
        $stmt->bindParam(':fantasia',       $this->fantasia);
        $stmt->bindParam(':imagem',         $this->imagem);
        return $stmt->execute();
    }

    public function update($id){
        $sql  = "UPDATE $this->table SET insc_estadual = :insc_estadual, insc_municipal = :insc_municipal, razao_social = :razao_social, fantasia = :fantasia WHERE fornecedor_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':insc_estadual',  $this->insc_estadual);
        $stmt->bindParam(':insc_municipal', $this->insc_municipal);
        $stmt->bindParam(':razao_social',   $this->razao_social);
        $stmt->bindParam(':fantasia',       $this->fantasia);
        $stmt->bindParam(':id',         $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function existenciaCnpj($cnpj){
        $sql  = "SELECT * FROM $this->table WHERE cnpj = :cnpj";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
            return $stmt->fetchAll();
        }
    }    
    
    public function findAllfantasia(){
        $sql  = "SELECT * FROM $this->table ORDER BY fantasia";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function findFantasia($fantasia){
        $sql  = "SELECT * FROM $this->table WHERE fantasia LIKE "."'"."$fantasia"."%'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':fantasia', $fantasia, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
        
    public function updateFoto($id){
        $sql  = "UPDATE $this->table SET imagem = :imagem WHERE fornecedor_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':imagem',      $this->imagem);
        $stmt->bindParam(':id',         $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}


