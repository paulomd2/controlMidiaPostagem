<?php
require_once './model/clienteDAO.php';

$clientes = $objClienteDao->listaClientes();
foreach ($clientes as $cliente){
    echo '<tr>
            <td>'.$cliente["nome"].'</td>
            <td><img src="../upload/'.$cliente["logo"].'" width="100" /></td>
            <td>'.$cliente["cor1"].'</td>
            <td>'.$cliente["cor2"].'</td>
            <td><a href="altCliente.php?id='.$cliente["idCliente"].'">Alterar</a></td>
            <td><a href="javascript:delCliente('.$cliente["idCliente"].')">Excluir</a></td>
          </tr>
         ';
}