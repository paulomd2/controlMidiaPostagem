<?php

require_once '../model/clienteDAO.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadCliente':
        $nome = $_POST['nome'];
        $cor1 = $_POST['cor1'];
        $cor2 = $_POST['cor2'];
        $logo = uploadImagem();
        $dataCadastro = date('Y-m-d H:i:s');
        $pasta = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', str_replace(" ", "", $_POST['nome']) ) );

        $objCliente->setNome($nome);
        $objCliente->setPasta($pasta);
        $objCliente->setCor1($cor1);
        $objCliente->setCor2($cor2);
        $objCliente->setLogo($logo);
        $objCliente->setDataCadastro($dataCadastro);

        $objClienteDao->cadCliente($objCliente);
        
        header('Location: ../verClientes.php');
        break;

    case 'altCliente':
        $idCliente = $_POST['idCliente'];
        $nome = $_POST['nome'];
        $cor1 = $_POST['cor1'];
        $cor2 = $_POST['cor2'];

        if ($_FILES['foto']['name'] != '') {
            $logo = uploadImagem();
        }else{
            $logo = $_POST['imagemAntiga'];
        }
        
        $objCliente->setIdCliente($idCliente);
        $objCliente->setNome($nome);
        $objCliente->setCor1($cor1);
        $objCliente->setCor2($cor2);
        $objCliente->setLogo($logo);

        $objClienteDao->altCliente($objCliente);
        
        header('Location: ../verClientes.php');
        break;
        
    case 'delCliente':
        $idCliente =$_POST['idCliente'];
        
        $objCliente->setIdCliente($idCliente);
        
        $objClienteDao->delCliente($objCliente);
        break;
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['foto']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['foto']['size'] > (1048576)) { //não pode ser maior que 1Mb
        $valido = false;
    } else {
        @$imagemAntiga = '../../upload/' . $_POST["imagemAntiga"];

        if (!file_exists('../../upload/')) {
            mkdir('../../upload/');
        } elseif (file_exists($imagemAntiga)) {
            @unlink($imagemAntiga);
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../upload/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}
