<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ncm
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class ncm extends crud {
	
    protected $table = 'ncm';
    private $ncm_id;
    private $nome;
    private $cest;
    private $st;
    private $icms;
    private $pis;
    private $ipi;
    private $cofins;
    private $csosn;
    private $last_update;
    private $icms_subst;


    function getNcm_id() {
        return $this->ncm_id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCest() {
        return $this->cest;
    }

    function getSt() {
        return $this->st;
    }

    function getIcms() {
        return $this->icms;
    }

    function getPis() {
        return $this->pis;
    }

    function getIpi() {
        return $this->ipi;
    }

    function getCofins() {
        return $this->cofins;
    }

    function getCsosn() {
        return $this->csosn;
    }

    function getLast_update() {
        return $this->last_update;
    }

    function getIcms_subst() {
        return $this->icms_subst;
    }

    function setNcm_id($ncm_id) {
        $this->ncm_id = $ncm_id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCest($cest) {
        $this->cest = $cest;
    }

    function setSt($st) {
        $this->st = $st;
    }

    function setIcms($icms) {
        $this->icms = $icms;
    }

    function setPis($pis) {
        $this->pis = $pis;
    }

    function setIpi($ipi) {
        $this->ipi = $ipi;
    }

    function setCofins($cofins) {
        $this->cofins = $cofins;
    }

    function setCsosn($csosn) {
        $this->csosn = $csosn;
    }

    function setLast_update($last_update) {
        $this->last_update = $last_update;
    }

    function setIcms_subst($icms_subst) {
        $this->icms_subst = $icms_subst;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (ncm_id, nome, cest, st, icms, pis, ipi, cofins, csosn, icms_subst) VALUES (:ncm_id, :nome, :cest, :st, :icms, :pis, :ipi, :cofins, :csosn, :icms_subst)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':ncm_id',     $this->ncm_id);
        $stmt->bindParam(':nome',       $this->nome);
        $stmt->bindParam(':cest',       $this->cest);
        $stmt->bindParam(':st',         $this->st);
        $stmt->bindParam(':icms',       $this->icms);
        $stmt->bindParam(':pis',        $this->pis);
        $stmt->bindParam(':ipi',        $this->ipi);
        $stmt->bindParam(':cofins',     $this->cofins);
        $stmt->bindParam(':csosn',      $this->csosn);
        $stmt->bindParam(':icms_subst', $this->icms_subst);
        return $stmt->execute();
    }
    
    public function update($ncm_id){
        $sql  = "UPDATE $this->table SET nome = :nome, cest = :cest, st = :st, icms = :icms, pis = :pis, ipi = :ipi, cofins = :cofins, csosn = :csosn, last_update = NOW(), icms_subst = :icms_subst WHERE ncm_id = :ncm_id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',       $this->nome);
        $stmt->bindParam(':cest',       $this->cest);
        $stmt->bindParam(':st',         $this->st);
        $stmt->bindParam(':icms',       $this->icms);
        $stmt->bindParam(':pis',        $this->pis);
        $stmt->bindParam(':ipi',        $this->ipi);
        $stmt->bindParam(':cofins',     $this->cofins);
        $stmt->bindParam(':csosn',      $this->csosn);
        $stmt->bindParam(':icms_subst', $this->icms_subst);
        $stmt->bindParam(':ncm_id',     $ncm_id, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function selectexisteregistro($ncm){
        $sql  = "SELECT 0 FROM $this->table WHERE ncm_id = :ncm";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':ncm', $ncm, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
            return $stmt->fetchAll();
        }
    }
    
    public function findAllId(){
            $sql  = "SELECT * FROM $this->table Order by ncm_id";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
    }
    
    public function findNcm($ncm){
        $sql  = "SELECT * FROM $this->table WHERE ncm_id LIKE "."'"."$ncm"."%'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':ncm', $ncm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}


