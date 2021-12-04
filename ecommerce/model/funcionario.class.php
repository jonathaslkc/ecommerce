<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionario
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class funcionario extends crud {
	
    protected $table = 'funcionario';
    private $funcionario_id;
    private $endereco_id;
    private $loja_id;
    private $nome;
    private $sobrenome;
    private $foto;
    private $email;
    private $username;
    private $password;
    private $perfil_id;
    private $ativo;
    private $ultima_update;
    private $complemento;
    private $nro_imovel;


    function getFuncionario_id() {
        return $this->funcionario_id;
    }

    function getEndereco_id() {
        return $this->endereco_id;
    }

    function getLoja_id() {
        return $this->loja_id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getFoto() {
        return $this->foto;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getPerfil_id() {
        return $this->perfil_id;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function getUltima_update() {
        return $this->ultima_update;
    }
    
    function getComplemento() {
        return $this->complemento;
    }

    function getNro_imovel() {
        return $this->nro_imovel;
    }

    function setFuncionario_id($funcionario_id) {
        $this->funcionario_id = $funcionario_id;
    }

    function setEndereco_id($endereco_id) {
        $this->endereco_id = $endereco_id;
    }

    function setLoja_id($loja_id) {
        $this->loja_id = $loja_id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPerfil_id($perfil_id) {
        $this->perfil_id = $perfil_id;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    function setUltima_update($ultima_update) {
        $this->ultima_update = $ultima_update;
    }
    
    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setNro_imovel($nro_imovel) {
        $this->nro_imovel = $nro_imovel;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (nome, sobrenome, endereco_id, foto, email, loja_id, username, password, perfil_id, complemento, nro_imovel) VALUES (:nome, :sobrenome, :endereco_id, :foto, :email, :loja_id, :username, :password, :perfil_id, :complemento, :nro_imovel)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',       $this->nome);
        $stmt->bindParam(':sobrenome',  $this->sobrenome);
        $stmt->bindParam(':endereco_id',$this->endereco_id);
        $stmt->bindParam(':foto',       $this->foto);
        $stmt->bindParam(':email',      $this->email);
        $stmt->bindParam(':loja_id',    $this->loja_id);
        $stmt->bindParam(':username',   $this->username);
        $stmt->bindParam(':password',   $this->password);
        $stmt->bindParam(':perfil_id',  $this->perfil_id);
        $stmt->bindParam(':complemento',$this->complemento);
        $stmt->bindParam(':nro_imovel', $this->nro_imovel);
        return $stmt->execute();
    }
    
    public function update($id){
        $sql  = "UPDATE $this->table SET nome = :nome, sobrenome = :sobrenome, endereco_id = :endereco_id, email = :email, username = :username, perfil_id = :perfil_id, complemento = :complemento, nro_imovel = :nro_imovel, ativo = :ativo WHERE funcionario_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',       $this->nome);
        $stmt->bindParam(':sobrenome',  $this->sobrenome);
        $stmt->bindParam(':endereco_id',$this->endereco_id);
        $stmt->bindParam(':email',      $this->email);
        $stmt->bindParam(':username',   $this->username);
        #$stmt->bindParam(':password',   $this->password);
        $stmt->bindParam(':perfil_id',  $this->perfil_id);
        $stmt->bindParam(':complemento',$this->complemento);
        $stmt->bindParam(':nro_imovel', $this->nro_imovel);
        $stmt->bindParam(':ativo',      $this->ativo);
        $stmt->bindParam(':id',         $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function updateComSenha($id){
        $sql  = "UPDATE $this->table SET nome = :nome, sobrenome = :sobrenome, endereco_id = :endereco_id, email = :email, username = :username, password = :password, perfil_id = :perfil_id, complemento = :complemento, nro_imovel = :nro_imovel, ativo = :ativo WHERE funcionario_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',       $this->nome);
        $stmt->bindParam(':sobrenome',  $this->sobrenome);
        $stmt->bindParam(':endereco_id',$this->endereco_id);
        $stmt->bindParam(':email',      $this->email);
        $stmt->bindParam(':username',   $this->username);
        $stmt->bindParam(':password',   $this->password);
        $stmt->bindParam(':perfil_id',  $this->perfil_id);
        $stmt->bindParam(':complemento',$this->complemento);
        $stmt->bindParam(':nro_imovel', $this->nro_imovel);
        $stmt->bindParam(':ativo',      $this->ativo);
        $stmt->bindParam(':id',         $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateFoto($id){
        $sql  = "UPDATE $this->table SET foto = :foto WHERE funcionario_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':foto',      $this->foto);
        $stmt->bindParam(':id',         $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function existenciaEmail($email){
        $sql  = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
            return $stmt->fetchAll();
        }
    }
    
    public function existenciaEmail2($email, $id){
        $sql  = "SELECT * FROM $this->table WHERE funcionario_id <> :id AND email = :email";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id',    $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
            return $stmt->fetchAll();
        }
    }

    public function alteraativoa($id){
        $sql  = "UPDATE $this->table SET ativo = '1' WHERE funcionario_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function alteraativod($id){
        $sql  = "UPDATE $this->table SET ativo = '0' WHERE funcionario_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function buscanome($nome){
        $sql  = "SELECT * FROM $this->table WHERE nome = :nome";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }     
    
    public function findNome($nome){
        $sql  = "SELECT * FROM $this->table WHERE nome LIKE "."'"."$nome"."%'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    
    
    
    
    public function selectestado($username){
        $sql  = "SELECT * FROM $this->table WHERE username = :username AND ativo = '0'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
            return $stmt->fetchAll();
        }
    }

    public function selectexiste($username){
        $sql  = "SELECT * FROM $this->table WHERE username = :username";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
            return $stmt->fetchAll();
        }
    }

    public function logar($username, $password){ // -------------------------------- MÉTODO LOGAR
        $sql  = "SELECT * FROM $this->table WHERE username = :username AND password = :password AND ativo = '1'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0):
            $dadoslogin = $stmt->fetch(PDO::FETCH_OBJ);
                $_SESSION['usuario']    = $dadoslogin->nome;
                #$_SESSION['ativo']     = $dadoslogin->ativo; //Futuras Verificações de usuário [controle de usuário logado]
                $_SESSION['tipousuario']= $dadoslogin->perfil_id;
                $_SESSION['loja']       = $dadoslogin->loja_id;
                $_SESSION['pais']       = '55';
                $_SESSION['id']         = $dadoslogin->id;
                $_SESSION['logado']     = true;
                $_SESSION['logadoadm']  = true;
            return true;
        else:
            return false;
        endif;
    }

    public static function deslogar(){ // -------------------------------- MÉTODO DESLOGAR
        if(isset($_SESSION['logado'])):
            unset($_SESSION['logado']);  //Destruir Sessão logado
            unset($_SESSION['logadoadm']);  //Destruir Sessão ADM
            header('location: login.php');
        endif;
    }
}


