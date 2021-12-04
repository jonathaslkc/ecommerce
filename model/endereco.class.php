<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of endereco
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class endereco extends crud {
	
    protected $table = 'endereco';
    private $endereco_id;
    private $logradouro;
    private $complemento;
    private $cidade_id;
    private $cep;
    private $ultima_update;


    function getEndereco_id() {
        return $this->endereco_id;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getCidade_id() {
        return $this->cidade_id;
    }

    function getCep() {
        return $this->cep;
    }

    function getUltima_update() {
        return $this->ultima_update;
    }

    function setEndereco_id($endereco_id) {
        $this->endereco_id = $endereco_id;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setCidade_id($cidade_id) {
        $this->cidade_id = $cidade_id;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setUltima_update($ultima_update) {
        $this->ultima_update = $ultima_update;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (logradouro, complemento, cidade_id, cep) VALUES (:logradouro, :complemento, :cidade_id, :cep)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':logradouro',     $this->logradouro);
        $stmt->bindParam(':complemento',    $this->complemento);
        $stmt->bindParam(':cidade_id',      $this->cidade_id);
        $stmt->bindParam(':cep',            $this->cep);
        return $stmt->execute();
    }

    public function existenciaCep($id){
        $sql  = "SELECT * FROM $this->table WHERE endereco_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
            return $stmt->fetchAll();
        }
    }
    
    public function buscacependereco($id){
        $sql  = "SELECT ES.nome 'Estado', CI.nome 'Cidade', CI.cod_cidade 'IBGE', EN.bairro 'Bairro', EN.logradouro 'logradouro', EN.endereco_id 'idEnd', EN.cep 'cep' FROM estado ES
                INNER JOIN cidade CI ON (CI.estado_id = ES.estado_id) 
                INNER JOIN endereco EN ON (EN.cidade_id = CI.cidade_id)
                WHERE EN.cep = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function update($id){
        $sql  = "UPDATE $this->table SET sigla = :sigla, nome = :nome WHERE sigla = :";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',           $this->nome);
//        $stmt->bindParam(':ultima_update',  $this->ultima_update);
        $stmt->bindParam(':pais_id',        $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
