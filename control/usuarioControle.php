<?php
@session_start();
require_once '../model/usuarioDAO.php';
//require_once '../model/usuarioClienteDAO.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'verificaLogin':
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);

        $objUsuario->setLogin($login);
        $objUsuario->setSenha($senha);

        $resposta = $objUsuarioDao->verificaLogin($objUsuario);

        $retorno = 0;
        if ($resposta != 0) {
            $_SESSION["codigoAR"] = $resposta['idUsuario'];
            $_SESSION['nivel'] = $resposta['nivel'];
            $_SESSION['cliente'] = '';
            $objUsuario->setIdUsuario($resposta['idUsuario']);

            //se o nível for administrador, o usuário será direcionado para
            //a área de administração
            if ($resposta['nivel'] == 1) {
                $retorno = 'admin/admin.php';
            } else {

                //traz a quantidade de clietens que o usuário possui
                $quantidade = $objUsuarioDao->numClientes($objUsuario);

                if ($quantidade == 1) {
                    //se o usuário só tiver um cliente
                    //redireciona para a página de posts

                    $retorno = 'cliente/principal.php';
                } else if($quantidade == 0){
                    $retorno = 1;
                }else {
                    //se o usuário tiver mais de um cliente
                    //redireciona para a página de clientes

                    $retorno = 'cliente/clientes.php';
                }
            }
        }

        print_r($retorno);
        break;
}
?>