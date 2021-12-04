<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estado
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class estado extends crud {
	
    protected $table = 'estado';
    private $estado_id;
    private $pais_id;
    private $sigla;
    private $nome;


    function getEstado_id() {
        return $this->estado_id;
    }

    function getPais_id() {
        return $this->pais_id;
    }

    function getSigla() {
        return $this->sigla;
    }

    function getNome() {
        return $this->nome;
    }

    function setEstado_id($estado_id) {
        $this->estado_id = $estado_id;
    }

    function setPais_id($pais_id) {
        $this->pais_id = $pais_id;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (estado_id,sigla,nome,pais_id) VALUES (:estado_id, :sigla, :nome, :pais_id)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':estado_id',     $this->estado_id);
        $stmt->bindParam(':sigla',     $this->sigla);
        $stmt->bindParam(':nome',     $this->nome);
        $stmt->bindParam(':pais_id',     $this->pais_id);
        return $stmt->execute();
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

