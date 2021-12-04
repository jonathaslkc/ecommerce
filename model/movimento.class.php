<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movimento
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class movimento extends crud {
	
    protected $table = 'movimento';
    private $produto_id;
    private $saidas;
    private $entradas;
    private $bloqueados;
    private $ultima_saida;
    private $ultima_entrada;


    function getProduto_id() {
        return $this->produto_id;
    }

    function getSaidas() {
        return $this->saidas;
    }

    function getEntradas() {
        return $this->entradas;
    }

    function getBloqueados() {
        return $this->bloqueados;
    }

    function getUltima_saida() {
        return $this->ultima_saida;
    }

    function getUltima_entrada() {
        return $this->ultima_entrada;
    }

    function setProduto_id($produto_id) {
        $this->produto_id = $produto_id;
    }

    function setSaidas($saidas) {
        $this->saidas = $saidas;
    }

    function setEntradas($entradas) {
        $this->entradas = $entradas;
    }

    function setBloqueados($bloqueados) {
        $this->bloqueados = $bloqueados;
    }

    function setUltima_saida($ultima_saida) {
        $this->ultima_saida = $ultima_saida;
    }

    function setUltima_entrada($ultima_entrada) {
        $this->ultima_entrada = $ultima_entrada;
    }

    
    public function insert(){
        $sql  = "INSERT INTO $this->table (produto_id, saidas, entradas, bloqueados, ultima_saida, ultima_entrada) VALUES (:produto_id, :saidas, :entradas, :bloqueados, :ultima_saida, :ultima_entrada)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':produto_id',     $this->produto_id);
        $stmt->bindParam(':saidas',         $this->saidas);
        $stmt->bindParam(':entradas',       $this->entradas);
        $stmt->bindParam(':bloqueados',     $this->bloqueados);
        $stmt->bindParam(':ultima_saida',   $this->ultima_saida);
        $stmt->bindParam(':ultima_entrada', $this->ultima_entrada);
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


