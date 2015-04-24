<?php

require_once 'banco.php';
require_once 'bean/cliente.php';
require_once 'bean/usuarioCliente.php';

class ClienteDAO extends Banco {

    public function listaClientes(UsuarioCliente $objUsuarioCliente) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT c.*
                    FROM ".TBL_REL_USUARIO_CLIENTE." uc
                    JOIN ".TBL_USUARIO." u ON u.idUsuario = uc.idUsuario
                    JOIN ".TBL_CLIENTE." c ON c.idCliente = uc.idCliente
                        where uc.idusuario = ".$objUsuarioCliente->getIdUsuario()."
               ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
    }

}

$objClienteDao = new ClienteDAO();
