<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of slider
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class slider extends crud {
	
    protected $table = 'slider';
    private $slider_id;
    private $titulo;
    private $descricao;
    private $caminho_img;
    private $loja_id;
    private $ordem_do_slide;


    function getSlider_id() {
        return $this->slider_id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCaminho_img() {
        return $this->caminho_img;
    }

    function getLoja_id() {
        return $this->loja_id;
    }

    function getOrdem_do_slide() {
        return $this->ordem_do_slide;
    }

    function setSlider_id($slider_id) {
        $this->slider_id = $slider_id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCaminho_img($caminho_img) {
        $this->caminho_img = $caminho_img;
    }

    function setLoja_id($loja_id) {
        $this->loja_id = $loja_id;
    }

    function setOrdem_do_slide($ordem_do_slide) {
        $this->ordem_do_slide = $ordem_do_slide;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (titulo, descricao, caminho_img, loja_id, ordem_do_slide) VALUES (:titulo, :descricao, :caminho_img, :loja_id, :ordem_do_slide)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':titulo',         $this->titulo);
        $stmt->bindParam(':descricao',      $this->descricao);
        $stmt->bindParam(':caminho_img',    $this->caminho_img);
        $stmt->bindParam(':loja_id',        $this->loja_id);
        $stmt->bindParam(':ordem_do_slide', $this->ordem_do_slide);
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
    
    
    
    
    
    
public function selectexistente(){
            $sql    = "SELECT * FROM $this->table WHERE titulo <> '' LIMIT 5";
            $stmt   = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        #StartTransaction
        public function selectexisteid($id1,$id2){
            #beginTransaction();/* Inicia a transação */
            $sql  = "SELECT ordenacao FROM $this->table WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id1, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0): #Se retornar valor true >1 o usuário existe e está inativo
                $valorid1 = $stmt->fetch(PDO::FETCH_COLUMN);
                #echo $valordoid1;
                $stmt->bindParam(':id', $id2, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->rowCount() > 0): #Se retornar valor true >1 o usuário existe e está inativo
                    $valorid2 = $stmt->fetch(PDO::FETCH_COLUMN);
                    
                    #echo $valordoid2;
                    $sql  = "UPDATE $this->table SET ordenacao = :valorid WHERE id = :id;";
                    $stmt = DB::prepare($sql);
                    $stmt->bindParam(':valorid',     $valorid1);
                    $stmt->bindParam(':id',          $id2, PDO::PARAM_INT);
                    $stmt->execute();

                    $stmt->bindParam(':valorid',     $valorid2);
                    $stmt->bindParam(':id',          $id1, PDO::PARAM_INT);
                    return $stmt->execute();
                else:
                    echo '<script>alert("Erro /n Operação não realizada! /n Campo com valor nulo!")</script>';
                endif;
            else:
                echo '<script>alert("Erro /n Operação não realizada! /n ID nulo!")</script>';
            endif;
        }
        
 

 


        #Commit
        #FimTransaction
        
        public function selectAll(){
            $sql  = "SELECT * FROM $this->table ORDER BY ordem_do_slide";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function selectexisteregistro($ordenacao){
            $sql  = "SELECT 0 FROM $this->table WHERE ordenacao = :ordenacao";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':ordenacao', $ordenacao, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }
        
        public function selectexistencia($titulo){
            $sql  = "SELECT 0 FROM $this->table WHERE titulo = :titulo";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }
}


