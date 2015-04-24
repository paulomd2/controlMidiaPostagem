<?php
class UsuarioCliente{
    private $idUsuario;
    private $idCliente;
    private $dataCadastro;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    
    
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }
    
    
    public function getDataCadastro(){
        return $this->dataCadastros;
    }
    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
}

$objUsuarioCliente = new UsuarioCliente();