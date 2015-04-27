<?php
@session_start();
include '../libs/twitter/twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = 'dXiUbVxc9dEMgfFdGDL2n29Gm';
$consumerSecret = 'd36QgeNPCFqYypBBBrIclx6qO8qK31uOv9YH1wzYnjHH1nEqrF';
$callback = 'http://agenciamd2.com.br/postagem/admin/control/clienteControle.php?r=cadTwitter';

$connection = new TwitterOAuth($consumerKey, $consumerSecret);
$request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => $callback));

$_SESSION['idCliente'] = $_GET['id'];
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $connection->url("oauth/authorize", array("oauth_token" => $request_token['oauth_token']));

header('Location: ' . $url);
