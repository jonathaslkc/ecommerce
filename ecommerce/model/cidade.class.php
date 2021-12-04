<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cidade
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class cidade extends crud {
	
    protected $table = 'cidade';
    private $cidade_id;
    private $nome;
    private $ultima_update;
    private $cod_cidade;
    private $estado_id;


    function getCidade_id() {
        return $this->cidade_id;
    }

    function getNome() {
        return $this->nome;
    }

    function getUltima_update() {
        return $this->ultima_update;
    }

    function getCod_cidade() {
        return $this->cod_cidade;
    }

    function getEstado_id() {
        return $this->estado_id;
    }

    function setCidade_id($cidade_id) {
        $this->cidade_id = $cidade_id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUltima_update($ultima_update) {
        $this->ultima_update = $ultima_update;
    }

    function setCod_cidade($cod_cidade) {
        $this->cod_cidade = $cod_cidade;
    }

    function setEstado_id($estado_id) {
        $this->estado_id = $estado_id;
    }

    
    public function insert(){
        $sql  = "INSERT INTO $this->table (nome, cod_cidade, estado_id) VALUES (:nome, :cod_cidade, :estado_id)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',       $this->nome);
        $stmt->bindParam(':cod_cidade', $this->cod_cidade);
        $stmt->bindParam(':estado_id',  $this->estado_id);
        $stmt->execute();
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
