<?php

require_once 'bean/usuarioCliente.php';
require_once 'banco.php';

class UsuarioClienteDAO extends Banco {

    public function cadRelacionamento(UsuarioCliente $objUsuarioCliente) {
        $conexao = $this->abreConexao();

        $sql1 = "DELETE FROM " . TBL_REL_USUARIO_CLIENTE . " WHERE idUsuario = " . $objUsuarioCliente->getIdUsuario();
        $conexao->query($sql1);

        $clientes = $objUsuarioCliente->getIdCliente();
        foreach ($clientes as $cliente) {
            $sql2 = "
                    INSERT INTO " . TBL_REL_USUARIO_CLIENTE . " SET
                    idUsuario = " . $objUsuarioCliente->getIdUsuario().",
                    idCliente = ".$cliente.",
                    dataCadastro = NOW()
                    ";
            $conexao->query($sql2);
        }
    }

}

$objUsuarioClienteDao = new UsuarioClienteDAO();
