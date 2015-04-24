<?php

require_once 'banco.php';
require_once 'bean/usuario.php';

class UsuarioDAO extends Banco {
    public function listaUsuarios(Usuario $objUsuario = NULL) {
        $conexao = $this->abreConexao();

        if (empty($objUsuario)) {
            $sql = "SELECT u.*, GROUP_CONCAT(uc.idCliente) AS idCliente
                        FROM " . TBL_USUARIO . " u
                            LEFT JOIN " . TBL_REL_USUARIO_CLIENTE . " uc ON u.idUsuario = uc.idUsuario
                            GROUP BY u.idUsuario";

            $banco = $conexao->query($sql);

            $linhas = array();
            while ($linha = $banco->fetch_assoc()) {
                $linhas[] = $linha;
            }
        } else {
            $sql = "SELECT u.*, GROUP_CONCAT(uc.idCliente) AS cliente
                        FROM " . TBL_USUARIO . " u
                        LEFT JOIN " . TBL_REL_USUARIO_CLIENTE . " uc ON u.idUsuario = uc.idUsuario
                            WHERE u.idUsuario = " . $objUsuario->getIdUsuario();

            $banco = $conexao->query($sql);

            $linhas = $banco->fetch_assoc();
        }

        return $linhas;

        $conexao = $this->fechaConexao();
    }
    
    public function verificaLogin($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "select * from " . TBL_USUARIO . " where login='" . $objUsuario->getLogin() . "' and senha='" . $objUsuario->getSenha() . "'";

        $banco = $conexao->query($sql);

        $num_linhas = $banco->num_rows;

        if ($num_linhas == 0) {
            $resposta = 0;
        } else {
            $resposta = $banco->fetch_assoc();
        }

        return $resposta;

        $this->fechaConexao();
    }

    public function numClientes(Usuario $objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT COUNT(*) AS quantidade
                    FROM " . TBL_REL_USUARIO_CLIENTE . "
                        WHERE idUsuario = " . $objUsuario->getIdUsuario() . "
               ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha['quantidade'];
    }
}

$objUsuarioDao = new UsuarioDAO();
