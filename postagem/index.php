<?php

require_once '../model/postDAO.php';
require_once './instagramPost.php';
require_once './twitterPost.php';

$posts = $objPostDao->listaPostAgora();

foreach ($posts['instagram'] as $instagram) {
    $imagem = '../upload/' . $instagram["imagem"];
    instagramPost($instagram['loginInstagram'], $instagram['senhaInstagram'], $instagram['texto'], $imagem);
}

foreach ($posts['twitter'] as $twitter) {
    $imagem = '../upload/' . $twitter["imagem"];
    twitterPost($twitter['textoTwitter'], $imagem,$twitter['tokenTwitter'], $twitter['secretTwitter']);
}


foreach ($posts['facebook'] as $facebook) {
    $imagem = '../upload/' . $facebook["imagem"];
    facebookPost($facebook['loginFacebook'], $facebook['senhaFacebook'], $facebook['texto'], $imagem);
}