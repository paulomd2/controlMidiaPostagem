<?php

include '../libs/twitter/twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

function twitterPost($texto, $imagem, $oauthToken, $oauthTokenSecret) {
    include_once './twitter/twitteroauth/autoload.php';

    $consumerKey = 'dXiUbVxc9dEMgfFdGDL2n29Gm';
    $consumerSecret = 'd36QgeNPCFqYypBBBrIclx6qO8qK31uOv9YH1wzYnjHH1nEqrF';

    $connection = new TwitterOAuth($consumerKey, $consumerSecret, $oauthToken, $oauthTokenSecret);

    $media = $connection->upload('media/upload', array('media' => $imagem));
    $parameters = array(
        'status' => $texto,
        'media_ids' => $media->media_id_string
    );

    $result = $connection->post('statuses/update', $parameters);
}
