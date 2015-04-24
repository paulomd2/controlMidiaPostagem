<?php
@include_once '../../include/funcoes.php';
@include_once '../include/funcoes.php';
@include_once 'include/funcoes.php';
class Cliente{
    private $idCliente;
    private $nome;
    private $logo;
    private $cor1;
    private $cor2;
    private $pasta;
    private $dataCadastro;
    
    
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function setIdCliente($idCliente){
        $this->idCliente = seg($idCliente);
    }
    
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = seg($nome);
    }
    
    
    public function getLogo(){
        return $this->logo;
    }
    public function setLogo($logo){
        $this->logo = seg($logo);
    }
    
    
    public function getCor1(){
        return $this->cor1;
    }
    public function setCor1($cor){
        $this->cor1 = seg($cor);
    }
    
    
    public function getCor2(){
        return $this->cor2;
    }
    public function setCor2($cor){
        $this->cor2 = seg($cor);
    }
    
    
    public function getPasta(){
        return $this->pasta;
    }
    public function setPasta($pasta){
        $this->pasta = seg($pasta);
    }
    
    
    public function getDataCadastro(){
        return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = seg($dataCadastro);
    }
}

$objCliente = new Cliente();