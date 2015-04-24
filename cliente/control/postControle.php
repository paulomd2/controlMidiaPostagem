<?php

@session_start();
require_once '../../model/banco.php';
require_once '../model/comentarioDAO.php';
require_once '../model/postDAO.php';
@include_once '../include/funcoes.php';

echo 'cdosfcvjasdjkl';
echo $opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadComentario':
        $comentario = $_POST['comentario'];
        $idPost = $_POST['idPost'];
        $idUsuario = $_SESSION['codigoAR'];
        $data = date('Y-m-d H:i:s');

        $objComentario->setComentario($comentario);
        $objComentario->setIdPost($idPost);
        $objComentario->setIdUsuario($idUsuario);
        $objComentario->setData($data);

        $objComentarioDao->cadComentario($objComentario);
        break;

    case 'cadPost':
        echo 'aqui';
        $data = $_POST['data'];
        $texto = $_POST['texto'];
        $idUsuario = $_SESSION['codigoAR'];
        $dataCadastro = date("Y-m-d H:i:s");
        $idCliente = $_SESSION['cliente'];

        if ($_FILES['foto']['name'] != '') {
            $foto = uploadImagem();
            if ($foto == false) {
                $foto = '';
            }
        } else {
            $foto = '';
        }

        $objPost->setData($data);
        $objPost->setTexto($texto);
        $objPost->setFlag($flag);
        $objPost->setIdUsuario($idUsuario);
        $objPost->setDataCadastro($dataCadastro);
        $objPost->setImagem($foto);

        $objPostDao->cadPost($objPost);

        header("Location: ../principal.php");
        break;

    case 'altPost':
        $data = $_POST['data'];
        $texto = $_POST['texto'];
        $idPost = $_POST['idPost'];


        //var_dump($_FILES);
        if ($_FILES['foto']['name'] != '') {
            $foto = uploadImagem();
            if ($foto == false) {
                $foto = '';
            }
        } else {
            $foto = $_POST['imagemAntiga'];
        }

        $objPost->setData($data);
        $objPost->setTexto($texto);
        $objPost->setImagem($foto);
        $objPost->setIdPost($idPost);

        $objPostDao->altPost($objPost);

        header("Location: ../principal.php");
        break;

    case 'excluirPost':
        $idPost = $_POST['idPost'];

        $objPost->setIdPost($idPost);
        $objComentario->setIdPost($idPost);

        $post = $objPostDao->listaPost1($objPost);
        $objComentarioDao->delComentario($objComentario);

        unlink('../upload/' . $post['imagem']);
        $objPostDao->delPost($objPost);

        break;

    case 'alteraImagem':
        $idPost = $_POST['idPost'];
        $foto = uploadImagem();

        if ($foto === false) {
            $foto = '';
        }

        $objPost->setImagem($foto);
        $objPost->setIdPost($idPost);

        $post = $objPostDao->listaPost1($objPost);
        @unlink('../upload/' . $post['imagem']);

        $objPostDao->altImagem($objPost);

        header("Location: ../principal.php");
        break;

    case 'aprovaPost':
        $idPost = $_POST['idPost'];
        $data = date('Y-m-d H:i:s');

        $objPost->setIdPost($idPost);
        $objPost->setIdUsuario($_SESSION['codigoAR']);
        $objPost->setData($data);

        $objPostDao->aprovaPost($objPost);
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

        if (!file_exists('../upload/')) {
            mkdir('../upload/');
        } elseif (file_exists($imagemAntiga)) {
            @unlink($imagemAntiga);
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], '../upload/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}

?>