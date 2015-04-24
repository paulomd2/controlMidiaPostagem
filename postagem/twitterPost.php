<?php
include './twitter/twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = 'dXiUbVxc9dEMgfFdGDL2n29Gm';
$consumerSecret = 'd36QgeNPCFqYypBBBrIclx6qO8qK31uOv9YH1wzYnjHH1nEqrF';
$mensagem = "Example tweet";
$imagem = "http://agenciamd2.com.br/img/logomd2.png";
//$imagem = "../uploads/";

$connection = new TwitterOAuth($consumerKey, $consumerSecret,$token, $verificador);

$media = $connection->upload('media/upload', array('media' => $imagem));
$parameters = array(
    'status' => $mensagem,
    'media_ids' => $media->media_id_string
);

$result = $connection->post('statuses/update', $parameters);

var_dump($result);