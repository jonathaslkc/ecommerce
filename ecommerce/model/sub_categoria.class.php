<?php
// -------------------------------- CLASSE USUARIO
require_once 'crud.class.php';

class sub_categoria extends Crud{
	
	protected $table = 'sub_categoria';
	private $subcategoria_id;
        private $nome;
        private $categoria_id;
        private $ultimoid;
        
        
        function getSubcategoria_id() {
            return $this->subcategoria_id;
        }

        function getNome() {
            return $this->nome;
        }

        function getCategoria_id() {
            return $this->categoria_id;
        }
        
        function getUltimoid() {
            return $this->ultimoid;
        }

        function setSubcategoria_id($subcategoria_id) {
            $this->subcategoria_id = $subcategoria_id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setCategoria_id($categoria_id) {
            $this->categoria_id = $categoria_id;
        }
        
        function setUltimoid($ultimoid) {
            $this->ultimoid = $ultimoid;
        }

        
        public function insert(){
            $sql  = "INSERT INTO $this->table (nome, categoria_id) VALUES (:nome, :categoria_id)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',           $this->nome);
            $stmt->bindParam(':categoria_id',   $this->categoria_id);
            #return $stmt->execute();
            $stmt->execute();
            return $this->ultimoid = DB::getInstance()->lastInsertId();
	}

        public function find2($id){
		$sql  = "SELECT * FROM $this->table WHERE subcategoria_id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
        
	public function deleteSC($id){
		$sql  = "DELETE FROM $this->table WHERE subcategoria_id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

        public function update($id){
            $sql  = "UPDATE $this->table SET nome = :nome WHERE subcategoria_id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',           $this->nome);
            $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
            return $stmt->execute();
	}
        
        
        
        
        
        
	/*public function update($id){
		$sql  = "UPDATE $this->table SET razao = :razao, cpfcnpj = :cpfcnpj WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':razao', $this->razao);
		$stmt->bindParam(':cpfcnpj', $this->cpfcnpj);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}*/

        
	public function update2($id){
            $sql  = "UPDATE $this->table SET fkcategoria = :fkcategoria WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':fkcategoria',    $this->fkcategoria);
            $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
            return $stmt->execute();
	}
        
        public function findAllsubcat($fkcategoria) {
            $sql = "SELECT * FROM $this->table WHERE categoria_id = :fkcategoria";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':fkcategoria', $fkcategoria, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
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
        
        public function selectestado($login){
            $sql  = "SELECT * FROM $this->table WHERE login = :login AND ativo = '0'";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }
        
        public function selectexiste($login){
            $sql  = "SELECT * FROM $this->table WHERE login = :login";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
                return $stmt->fetchAll();
            }
        }
}
      
