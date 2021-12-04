<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produto
 *
 * @author Jonathas
 */
require_once 'crud.class.php';

class produto extends crud {
	
    protected $table = 'produto';
    private $produto_id;
    private $nome;
    private $promocional;
    private $last_update;
    private $ativo;
    private $caminho_img_frente;
    private $caminho_img_lateral;
    private $caminho_img_fundo;
    private $destacar_site;
    private $data_cadastro;
    private $peso;
    private $altura;
    private $largura;
    private $profundidade;
    private $ncm_id;
    private $subcategoria_id;
    private $categoria_id;
    private $ultimoid;
    private $descricao;
            

    function getProduto_id() {
        return $this->produto_id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPromocional() {
        return $this->promocional;
    }

    function getLast_update() {
        return $this->last_update;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function getCaminho_img_frente() {
        return $this->caminho_img_frente;
    }

    function getCaminho_img_lateral() {
        return $this->caminho_img_lateral;
    }

    function getCaminho_img_fundo() {
        return $this->caminho_img_fundo;
    }

    function getDestacar_site() {
        return $this->destacar_site;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getPeso() {
        return $this->peso;
    }

    function getAltura() {
        return $this->altura;
    }

    function getLargura() {
        return $this->largura;
    }

    function getProfundidade() {
        return $this->profundidade;
    }

    function getNcm_id() {
        return $this->ncm_id;
    }

    function getSubcategoria_id() {
        return $this->subcategoria_id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }
    
    function getUltimoid() {
        return $this->ultimoid;
    }
    
    function getDescricao() {
        return $this->descricao;
    }

    function setProduto_id($produto_id) {
        $this->produto_id = $produto_id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPromocional($promocional) {
        $this->promocional = $promocional;
    }

    function setLast_update($last_update) {
        $this->last_update = $last_update;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    function setCaminho_img_frente($caminho_img_frente) {
        $this->caminho_img_frente = $caminho_img_frente;
    }

    function setCaminho_img_lateral($caminho_img_lateral) {
        $this->caminho_img_lateral = $caminho_img_lateral;
    }

    function setCaminho_img_fundo($caminho_img_fundo) {
        $this->caminho_img_fundo = $caminho_img_fundo;
    }

    function setDestacar_site($destacar_site) {
        $this->destacar_site = $destacar_site;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setLargura($largura) {
        $this->largura = $largura;
    }

    function setProfundidade($profundidade) {
        $this->profundidade = $profundidade;
    }

    function setNcm_id($ncm_id) {
        $this->ncm_id = $ncm_id;
    }

    function setSubcategoria_id($subcategoria_id) {
        $this->subcategoria_id = $subcategoria_id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }
    
    function setUltimoid($ultimoid) {
        $this->ultimoid = $ultimoid;
    }
    
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function insert(){
        $sql  = "INSERT INTO $this->table (nome, promocional, ativo, caminho_img_frente, caminho_img_lateral, caminho_img_fundo, destacar_site, data_Cadastro, peso, altura, largura, profundidade, ncm_id, subcategoria_id, categoria_id, descricao) VALUES (:nome, :promocional, :ativo, :caminho_img_frente, :caminho_img_lateral, :caminho_img_fundo, :destacar_site, NOW(), :peso, :altura, :largura, :profundidade, :ncm_id, :subcategoria_id, :categoria_id, :descricao)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',                   $this->nome);
        $stmt->bindParam(':promocional',            $this->promocional);
        $stmt->bindParam(':ativo',                  $this->ativo);
        $stmt->bindParam(':caminho_img_frente',     $this->caminho_img_frente);
        $stmt->bindParam(':caminho_img_lateral',    $this->caminho_img_lateral);
        $stmt->bindParam(':caminho_img_fundo',      $this->caminho_img_fundo);
        $stmt->bindParam(':destacar_site',          $this->destacar_site);
        #$stmt->bindParam(':data_Cadastro',          $this->data_Cadastro);
        $stmt->bindParam(':peso',                   $this->peso);
        $stmt->bindParam(':altura',                 $this->altura);
        $stmt->bindParam(':largura',                $this->largura);
        $stmt->bindParam(':profundidade',           $this->profundidade);
        $stmt->bindParam(':ncm_id',                 $this->ncm_id);
        $stmt->bindParam(':subcategoria_id',        $this->subcategoria_id);
        $stmt->bindParam(':categoria_id',           $this->categoria_id);
        $stmt->bindParam(':descricao',              $this->descricao);
        #return $stmt->execute();
        $stmt->execute();
        return $this->ultimoid = DB::getInstance()->lastInsertId();
    }

    public function selectAll(){
        $sql  = "SELECT * FROM $this->table WHERE ativo = '1' ORDER BY nome LIMIT 20";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function selectAllId($fksubcategoria){
        $sql  = "SELECT * FROM $this->table WHERE subcategoria_id = :fksubcategoria AND ativo = '1' ORDER BY nome";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':fksubcategoria', $fksubcategoria, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectAllDest(){
        $sql  = "SELECT * FROM $this->table WHERE destacar_site = '1' AND ativo = '1'";
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
    
    public function alteraativoa($id){
        $sql  = "UPDATE $this->table SET ativo = '1' WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function alteraativod($id){
        $sql  = "UPDATE $this->table SET ativo = '0' WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function findNome($nome){
        $sql  = "SELECT * FROM $this->table WHERE nome LIKE "."'"."$nome"."%'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function updateMaisInfo($id){
        $sql  = "UPDATE $this->table SET promocional = :promocional, ativo = :ativo, destacar_site = :destacar_site WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':promocional',    $this->promocional);
        $stmt->bindParam(':ativo',          $this->ativo);
        $stmt->bindParam(':destacar_site',  $this->destacar_site);
        $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function updatePesoDim($id){
        $sql  = "UPDATE $this->table SET peso = :peso, altura = :altura, largura = :largura, profundidade = :profundidade WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':peso',           $this->peso);
        $stmt->bindParam(':altura',         $this->altura);
        $stmt->bindParam(':largura',        $this->largura);
        $stmt->bindParam(':profundidade',   $this->profundidade);
        $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function updateCaminhoImg($id){
        $sql  = "UPDATE $this->table SET caminho_img_frente = :caminho_img_frente, caminho_img_lateral = :caminho_img_lateral, caminho_img_fundo = :caminho_img_fundo WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':caminho_img_frente', $this->caminho_img_frente);
        $stmt->bindParam(':caminho_img_lateral',$this->caminho_img_lateral);
        $stmt->bindParam(':caminho_img_fundo',  $this->caminho_img_fundo);
        $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function updateInfoGer($id){
        $sql  = "UPDATE $this->table SET nome = :nome, ncm_id = :ncm_id, categoria_id = :categoria_id, subcategoria_id = :subcategoria_id, descricao = :descricao WHERE produto_id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome',           $this->nome);
        $stmt->bindParam(':ncm_id',         $this->ncm_id);
        $stmt->bindParam(':categoria_id',   $this->categoria_id);
        $stmt->bindParam(':subcategoria_id',$this->subcategoria_id);
        $stmt->bindParam(':descricao',      $this->descricao);
        $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
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


