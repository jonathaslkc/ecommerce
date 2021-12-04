<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banner
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class banner extends crud{
	
	protected $table = 'banner';
	private $banner_id;
        private $caminho_img;
        private $posicao;
        private $loja_id;
        
        
        function getBanner_id() {
            return $this->banner_id;
        }

        function getCaminho_img() {
            return $this->caminho_img;
        }

        function getPosicao() {
            return $this->posicao;
        }

        function getLoja_id() {
            return $this->loja_id;
        }

        function setBanner_id($banner_id) {
            $this->banner_id = $banner_id;
        }

        function setCaminho_img($caminho_img) {
            $this->caminho_img = $caminho_img;
        }

        function setPosicao($posicao) {
            $this->posicao = $posicao;
        }

        function setLoja_id($loja_id) {
            $this->loja_id = $loja_id;
        }

        
        public function insert(){
            $sql  = "INSERT INTO $this->table (caminho_img, posicao, loja_id) VALUES (:caminho_img, :posicao, :loja_id)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':caminho_img',$this->caminho_img);
            $stmt->bindParam(':posicao',    $this->posicao);
            $stmt->bindParam(':loja_id',    $this->loja_id);
            return $stmt->execute();
	}
        
	public function update($posicao){
            $sql  = "UPDATE $this->table SET caminho_img = :caminho_img WHERE posicao = :posicao";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':caminho_img',  $this->caminho_img);
            $stmt->bindParam(':posicao', $posicao, PDO::PARAM_STR);
            return $stmt->execute();
	}
        
        public function selectexistencia($posicao){
            $sql  = "SELECT * FROM $this->table WHERE posicao = :posicao";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':posicao', $posicao, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
                return $stmt->fetchAll();
            }
        }
}
      

