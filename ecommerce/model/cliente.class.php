<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class cliente extends crud {
	
    protected $table = 'cliente';
    private $cliente_id;
    private $loja_id;
    private $nome;
    private $sobrenome;
    private $email;
    private $ativo;
    private $data_cadastro;
    private $ultima_update;
    private $endereco_id;
    private $complemento;
    private $nro_imovel;
    private $fone_fixo;
    private $fone_movel;
    private $clientecol;
    private $senha;


    function getCliente_id() {
        return $this->cliente_id;
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

    function getEmail() {
        return $this->email;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getUltima_update() {
        return $this->ultima_update;
    }

    function getEndereco_id() {
        return $this->endereco_id;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getNro_imovel() {
        return $this->nro_imovel;
    }

    function getFone_fixo() {
        return $this->fone_fixo;
    }

    function getFone_movel() {
        return $this->fone_movel;
    }

    function getClientecol() {
        return $this->clientecol;
    }

    function getSenha() {
        return $this->senha;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
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

    function setEmail($email) {
        $this->email = $email;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setUltima_update($ultima_update) {
        $this->ultima_update = $ultima_update;
    }

    function setEndereco_id($endereco_id) {
        $this->endereco_id = $endereco_id;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setNro_imovel($nro_imovel) {
        $this->nro_imovel = $nro_imovel;
    }

    function setFone_fixo($fone_fixo) {
        $this->fone_fixo = $fone_fixo;
    }

    function setFone_movel($fone_movel) {
        $this->fone_movel = $fone_movel;
    }

    function setClientecol($clientecol) {
        $this->clientecol = $clientecol;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (loja_id, nome, sobrenome, email, ativo, data_cadastro, endereco_id, complemento, nro_imovel, fone_fixo, fone_movel, clientecol, senha) VALUES (:)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':loja_id',        $this->loja_id);
        $stmt->bindParam(':nome',           $this->nome);
        $stmt->bindParam(':sobrenome',      $this->sobrenome);
        $stmt->bindParam(':email',          $this->email);
        $stmt->bindParam(':ativo',          $this->ativo);
        $stmt->bindParam(':data_cadastro',  $this->data_cadastro);
        $stmt->bindParam(':endereco_id',    $this->endereco_id);
        $stmt->bindParam(':complemento',    $this->complemento);
        $stmt->bindParam(':nro_imovel',     $this->nro_imovel);
        $stmt->bindParam(':fone_fixo',      $this->fone_fixo);
        $stmt->bindParam(':fone_movel',     $this->fone_movel);
        $stmt->bindParam(':clientecol',     $this->clientecol);
        $stmt->bindParam(':senha',          $this->senha);
        return $stmt->execute();
    }
    public function insert2(){
        $sql  = "INSERT INTO $this->table (loja_id, nome, sobrenome, email, enedereco_id, complemento, nro_imovel, fone_fixo, fone_movel, senha) VALUES (:loja_id, :nome, :sobrenome, :email, :enedereco_id, :complemento, :nro_imovel, :fone_fixo, :fone_movel, :senha)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':loja_id',        $this->loja_id);
        $stmt->bindParam(':nome',           $this->nome);
        $stmt->bindParam(':sobrenome',      $this->sobrenome);
        $stmt->bindParam(':email',          $this->email);
        #$stmt->bindParam(':data_cadastro',  $this->data_cadastro);
        $stmt->bindParam(':enedereco_id',    $this->endereco_id);
        $stmt->bindParam(':complemento',    $this->complemento);
        $stmt->bindParam(':nro_imovel',     $this->nro_imovel);
        $stmt->bindParam(':fone_fixo',      $this->fone_fixo);
        $stmt->bindParam(':fone_movel',     $this->fone_movel);
        #$stmt->bindParam(':clientecol',     $this->clientecol);
        $stmt->bindParam(':senha',          $this->senha);
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
    
    public function selectestado($email){
        $sql  = "SELECT * FROM $this->table WHERE email = :email AND ativo = '0'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
            return $stmt->fetchAll();
        }
    }
    public function findemail($email){
        $sql  = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function logar($email, $senha){ // -------------------------------- MÉTODO LOGAR
        $sql  = "SELECT * FROM $this->table WHERE email = :email AND senha = :senha AND ativo = '1'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0):
            $dadoslogin = $stmt->fetch(PDO::FETCH_OBJ);
                $_SESSION['usuario']    = $dadoslogin->nome;
                #$_SESSION['ativo']     = $dadoslogin->ativo; //Futuras Verificações de usuário [controle de usuário logado]
                $_SESSION['tipousuario']= false;
                $_SESSION['endereco_id']= $dadoslogin->enedereco_id;
                $_SESSION['emailusu']   = $dadoslogin->email;
                $_SESSION['loja']       = $dadoslogin->loja_id;
                $_SESSION['pais']       = '55';
                $_SESSION['id']         = $dadoslogin->cliente_id;
                $_SESSION['logado']     = true;
                $_SESSION['logadocli']     = true;
            return true;
        else:
            return false;
        endif;
    }

    public static function deslogar(){ // -------------------------------- MÉTODO DESLOGAR
        if(isset($_SESSION['logado'])):
            unset($_SESSION['logado']);  //Destruir Sessão logado
            unset($_SESSION['logadocli']);  //Destruir Sessão Cliente
            header('location: acesso.php');
        endif;
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


