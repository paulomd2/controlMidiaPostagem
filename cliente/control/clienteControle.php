<?php
@session_start();
require_once '../model/clientesDAO.php';

$opcao = $_POST['opcao'];
switch($opcao){
case 'altCliente':
    $idCliente = $_POST['idCliente'];
    $objCliente->setIdCliente($idCliente);
    
    $_SESSION['cliente'] = $objCliente->getIdCliente();
    
    
    break;
}