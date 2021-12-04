<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loja
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class loja extends crud {
	
    protected $table = 'loja';
    private $loja_id;
    private $endereco_id;
    private $ultima_update;


    function getLoja_id() {
        return $this->loja_id;
    }

    function getEndereco_id() {
        return $this->endereco_id;
    }

    function getUltima_update() {
        return $this->ultima_update;
    }

    function setLoja_id($loja_id) {
        $this->loja_id = $loja_id;
    }

    function setEndereco_id($endereco_id) {
        $this->endereco_id = $endereco_id;
    }

    function setUltima_update($ultima_update) {
        $this->ultima_update = $ultima_update;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (endereco_id) VALUES (:endereco_id)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':endereco_id',     $this->endereco_id);
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
