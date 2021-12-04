<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pais
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class pais extends crud {
	
    protected $table = 'pais';
    private $pais_id;
    private $nome;
    private $ultima_update;


    function getPais_id() {
        return $this->pais_id;
    }

    function getNome() {
        return $this->nome;
    }

    function getUltima_update() {
        return $this->ultima_update;
    }

    function setPais_id($pais_id) {
        $this->pais_id = $pais_id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUltima_update($ultima_update) {
        $this->ultima_update = $ultima_update;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (nome) VALUES (:nome)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',     $this->nome);
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

