<?php
session_start();
//@include_once '../include/funcoes.php';
require_once '../model/usuarioDAO.php';
require_once '../model/usuarioClienteDAO.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadUsuario':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $nivel = $_POST['nivel'];
        $clientes = rtrim($_POST['clientes'], ',');

        $clientes = explode(',', $clientes);
        
        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setLogin($login);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);

        $idUsuario = $objUsuarioDao->cadUsuario($objUsuario);

        $objUsuarioCliente->setIdCliente($clientes);
        $objUsuarioCliente->setIdUsuario($idUsuario);

        echo $objUsuarioClienteDao->cadRelacionamento($objUsuarioCliente);
        break;

    case 'altUsuario':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $nivel = $_POST['nivel'];
        $idUsuario = $_POST['idUsuario'];
        $clientes = rtrim($_POST['clientes'], ',');
        $clientes = explode(',', $clientes);

        if ($_POST['senha'] == '') {
            $senha = $_POST['senhaAntiga'];
        } else {
            $senha = md5($_POST['senha']);
        }

        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setLogin($login);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);
        $objUsuario->setIdUsuario($idUsuario);

        $objUsuarioCliente->setIdCliente($clientes);
        $objUsuarioCliente->setIdUsuario($idUsuario);

        $objUsuarioDao->altUsuario($objUsuario);
        $objUsuarioClienteDao->cadRelacionamento($objUsuarioCliente);
        break;

    case 'delUsuario':
        $idUsuario = $_POST['idUsuario'];

        $objUsuario->setIdUsuario($idUsuario);

        $objUsuarioDao->delUsuario($objUsuario);
        break;
}
?>