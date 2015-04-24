<?php

class InstagramDAO extends Banco{
    public function listaPostsAprovados(){
        $conexao = $this->abreConexao();
        
        $sql = "
                SELECT p.*, c.loginInstagram, c.senhaInstagram
                FROM ".TBL_POST." p
                JOIN ".TBL_CLIENTE." c ON p.idCliente = c.idCliente
                    WHERE
               ";
        
        $this->fechaConexao();
    }
}

$objInstagramDao = new InstagramDAO();