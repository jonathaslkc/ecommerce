<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class categoria extends crud {
	
	protected $table = 'categoria';
	private $categoria_id;
        private $nome;
        private $ativo;
        
        
        function getCategoria_id() {
            return $this->categoria_id;
        }

        function getNome() {
            return $this->nome;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setCategoria_id($categoria_id) {
            $this->categoria_id = $categoria_id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        
        public function insert(){
            $sql  = "INSERT INTO $this->table (nome) VALUES (:nome)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',     $this->nome);
            return $stmt->execute();
	}

	public function update($id){
            $sql  = "UPDATE $this->table SET nome = :nome WHERE categoria_id = :categoria_id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',    $this->nome);
            $stmt->bindParam(':categoria_id',      $id, PDO::PARAM_INT);
            return $stmt->execute();
	}
        
        public function selectexistente(){
            $sql    = "SELECT * FROM $this->table WHERE titulo <> '' LIMIT 5";
            $stmt   = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function findAllAtivo(){
            $sql    = "SELECT * FROM $this->table WHERE ativa = 1";
            $stmt   = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function selectexisteid($id1,$id2){
            $sql  = "SELECT ordenacao FROM $this->table WHERE categoria_id = :categoria_id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':categoria_id', $id1, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0): #Se retornar valor true >1 o usuário existe e está inativo
                $valorid1 = $stmt->fetch(PDO::FETCH_COLUMN);
                #echo $valordoid1;
                $stmt->bindParam(':categoria_id', $id2, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->rowCount() > 0): #Se retornar valor true >1 o usuário existe e está inativo
                    $valorid2 = $stmt->fetch(PDO::FETCH_COLUMN);
                    
                    #echo $valordoid2;
                    $sql  = "UPDATE $this->table SET ordenacao = :valorid WHERE categoria_id = :categoria_id;";
                    $stmt = DB::prepare($sql);
                    $stmt->bindParam(':valorid',     $valorid1);
                    $stmt->bindParam(':categoria_id',          $id2, PDO::PARAM_INT);
                    $stmt->execute();

                    $stmt->bindParam(':valorid',     $valorid2);
                    $stmt->bindParam(':categoria_id',          $id1, PDO::PARAM_INT);
                    return $stmt->execute();
                else:
                    echo '<script>alert("Erro /n Operação não realizada! /n Campo com valor nulo!")</script>';
                endif;
            else:
                echo '<script>alert("Erro /n Operação não realizada! /n ID nulo!")</script>';
            endif;
        }
        
        public function alteraativoa($id){
            $sql  = "UPDATE $this->table SET ativa = '1' WHERE categoria_id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function alteraativod($id){
            $sql  = "UPDATE $this->table SET ativa = '0' WHERE categoria_id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function selectAll(){
            $sql  = "SELECT * FROM $this->table ORDER BY ordenacao";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function selectexisteregistro($nome){
            $sql  = "SELECT 0 FROM $this->table WHERE nome = :nome";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
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
