<?php
@session_start();
include './twitter/twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = 'dXiUbVxc9dEMgfFdGDL2n29Gm';
$consumerSecret = 'd36QgeNPCFqYypBBBrIclx6qO8qK31uOv9YH1wzYnjHH1nEqrF';
$callback = 'http://agenciamd2.com.br/postagem/callbackTwitter.php';

$connection = new TwitterOAuth($consumerKey, $consumerSecret);
$request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => $callback));

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$teste = $connection->url("oauth/authorize", array("oauth_token" => $request_token['oauth_token']));
//    $teste = $connection->setOauthToken($request_token['oauth_token'], $request_token['oauth_token_secret']);
//    var_dump($teste);

header('Location: ' . $teste);
