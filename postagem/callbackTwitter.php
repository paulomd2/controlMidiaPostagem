<?php
@session_start();
include './twitter/twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = 'dXiUbVxc9dEMgfFdGDL2n29Gm';
$consumerSecret = 'd36QgeNPCFqYypBBBrIclx6qO8qK31uOv9YH1wzYnjHH1nEqrF';
$verificador = $_GET['oauth_verifier'];
$token = $_GET['oauth_token'];
$callback = 'http://agenciamd2.com.br/postagem/callbackTwitter.php';
$mensagem = "Example tweet";
$imagem = "http://agenciamd2.com.br/img/logomd2.png";

$connection = new TwitterOAuth($consumerKey, $consumerSecret, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

$teste = $connection->oauth("oauth/request_token", array("oauth_callback" => $callback));
//header('Location: ' . $teste);

//$teste = $connection->oauth('oauth/access_token', array('oauth_verifier' => $verificador));

var_dump($teste);

/*
$media = $connection->upload('media/upload', array('media' => $imagem));
$parameters = array(
    'status' => $mensagem,
    'media_ids' => $media->media_id_string
);

$result = $connection->post('statuses/update', $parameters);

var_dump($result);
*/