<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class perfil extends crud {
	
    protected $table = 'perfil';
    private $perfil_id;
    private $acao;


    function getPerfil_id() {
        return $this->perfil_id;
    }

    function getAcao() {
        return $this->acao;
    }

    function setPerfil_id($perfil_id) {
        $this->perfil_id = $perfil_id;
    }

    function setAcao($acao) {
        $this->acao = $acao;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (acao) VALUES (:acao)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':acao',     $this->acao);
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
    
    public function selectperfil($tipousuario){
        $sql  = "SELECT acao FROM $this->table WHERE perfil_id = :tipousuario";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':tipousuario', $tipousuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
