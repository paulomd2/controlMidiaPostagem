<?php

require_once './model/usuarioDAO.php';

$usuarios = $objUsuarioDao->listaUsuarios();
foreach ($usuarios as $usuario) {

    if ($usuario['nivel'] == 1) {
        $nivel = 'Administrador';
    } else if ($usuario['nivel'] == 2) {
        $nivel = 'Editor';
    } else {
        $nivel = 'Cliente';
    }
    echo '<tr>
            <td>' . $usuario["nome"] . '</td>
            <td>' . $usuario["login"] . '</td>
            <td>' . $usuario["email"] . '</td>
            <td>' . $nivel . '</td>
            <td><a href="altUsuario.php?id=' . $usuario["idUsuario"] . '">Alterar</a></td>
            <td><a href="javascript:delUsuario(' . $usuario["idUsuario"] . ')">Excluir</a></td>
          </tr>
         ';
}