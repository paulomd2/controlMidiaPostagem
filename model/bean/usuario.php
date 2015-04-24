<?php
@include_once '../../include/funcoes.php';
@include_once '../include/funcoes.php';
@include_once 'include/funcoes.php';

class Usuario{
    private $idUsuario;
    private $nome;
    private $login;
    private $senha;
    private $nivel;
    private $email;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = seg($idUsuario);
    }
    
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = seg($nome);
    }
    
    
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = seg($login);
    }
    
    
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    
    public function getNivel(){
        return $this->nivel;
    }
    public function setNivel($nivel){
        $this->nivel = seg($nivel);
    }
    
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = seg($email);
    }
}

$objUsuario = new Usuario();