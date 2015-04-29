<?php

include_once 'bean/cliente.php';
@include_once '../../model/banco.php';
@include_once '../model/banco.php';

class ClienteDAO extends Banco {

    public function listaClientes(Cliente $objCliente = NULL) {
        $conexao = $this->abreConexao();

        if ($objCliente == NULL) {
            $sql = "SELECT * FROM " . TBL_CLIENTE;

            $banco = $conexao->query($sql);

            $linhas = array();
            while ($linha = $banco->fetch_assoc()) {
                $linhas[] = $linha;
            }
        } else {
            $sql = "SELECT * FROM " . TBL_CLIENTE . " WHERE idCliente = " . $objCliente->getIdCliente();

            $banco = $conexao->query($sql);

            $linhas = $banco->fetch_assoc();
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function cadCliente(Cliente $objCliente) {
        $conexao = $this->abreConexao();

        $sql = "
                INSERT INTO " . TBL_CLIENTE . " SET
                nome = '" . $objCliente->getNome() . "',
                pasta = '" . $objCliente->getPasta() . "',
                cor1 = '" . $objCliente->getCor1() . "',
                cor2 = '" . $objCliente->getCor2() . "',
                dataCadastro = '" . $objCliente->getDataCadastro() . "',
                logo = '" . $objCliente->getLogo() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altCliente(Cliente $objCliente) {
        $conexao = $this->abreConexao();

        $sql = "
                UPDATE " . TBL_CLIENTE . " SET
                nome = '" . $objCliente->getNome() . "',
                cor1 = '" . $objCliente->getCor1() . "',
                cor2 = '" . $objCliente->getCor2() . "',
                logo = '" . $objCliente->getLogo() . "'
                    WHERE idCliente = " . $objCliente->getIdCliente() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delCliente(Cliente $objCliente) {
        $conexao = $this->abreConexao();

        $sql1 = "DELETE FROM " . TBL_CLIENTE . " WHERE idCliente = " . $objCliente->getIdCliente();
        $sql2 = "DELETE FROM " . TBL_REL_USUARIO_CLIENTE . " WHERE idCliente = " . $objCliente->getIdCliente();

        $conexao->query($sql1);
        $conexao->query($sql2);

        $this->fechaConexao();
    }
    
    
    public function cadTwitter(Cliente $objCliente){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_CLIENTE." SET
                tokenTwitter = '".$objCliente->getLoginRede()."',
                secretTwitter =  '".$objCliente->getSenhaRede()."'
                    WHERE idCliente = ".$objCliente->getIdCliente()."
               ";
        
        $conexao->query($sql);
    }
    
    
    public function cadFacebook(Cliente $objCliente){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_CLIENTE." SET
                pageIdFacebook = '".$objCliente->getLoginRede()."',
                pageAccessTokenFacebook =  '".$objCliente->getSenhaRede()."'
                    WHERE idCliente = ".$objCliente->getIdCliente()."
               ";
        
        $conexao->query($sql);
    }

}

$objClienteDao = new ClienteDAO();
