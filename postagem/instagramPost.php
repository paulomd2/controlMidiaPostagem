<?php

function instagramPost($username, $password, $caption, $filename) {
    require_once 'model/instagramDAO.php';


// Set the username and password of the account that you wish to post a photo to
//    $username = 'serginhudiet';
//    $password = 'SERGINHU8923';
// Set the path to the file that you wish to post.
// This must be jpeg format and it must be a perfect square
//    $filename = 'pictures/teste3.jpg';
// Set the caption for the photo
//    $caption = "Proibindo o casamento, e ordenando a abstinência dos alimentos que Deus criou para os fiéis, e para os que conhecem a verdade, a fim de usarem deles com ações de graças";
    /*
      $caption = '1Tm 4.3-4';
      Porque toda a criatura de Deus é boa, e não há nada que rejeitar, sendo recebido com ações de graças.";
     */

// Define the user agent
    $agent = GenerateUserAgent();

// Define the GuID
    $guid = GenerateGuid();

// Set the devide ID
    $device_id = "android-" . $guid;

    /* LOG IN */
// You must be logged in to the account that you wish to post a photo too
// Set all of the parameters in the string, and then sign it with their API key using SHA-256
    $data = '{"device_id":"' . $device_id . '","guid":"' . $guid . '","username":"' . $username . '","password":"' . $password . '","Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"}';
    $sig = GenerateSignature($data);
    $data = 'signed_body=' . $sig . '.' . urlencode($data) . '&ig_sig_key_version=4';
    $login = SendRequest('accounts/login/', true, $data, $agent, false);

    if (strpos($login[1], "Sorry, an error occurred while processing this request.")) {
        echo "Request failed, there's a chance that this proxy/ip is blocked";
    } else {
        if (empty($login[1])) {
            echo "Empty response received from the server while trying to login";
        } else {
            // Decode the array that is returned
            $obj = @json_decode($login[1], true);

            if (empty($obj)) {
                echo "Could not decode the response: " . $body;
            } else {
                // Post the picture
                $data = GetPostData($filename);

                $post = SendRequest('media/upload/', true, $data, $agent, true);

                if (empty($post[1])) {
                    echo "Empty response received from the server while trying to post the image";
                } else {
                    // Decode the response 
                    $obj = @json_decode($post[1], true);

                    if (empty($obj)) {
                        echo "Could not decode the response";
                    } else {
                        var_dump($obj);

                        var_dump($post);

                        $status = $obj['status'];

                        if ($status == 'ok') {
                            // Remove and line breaks from the caption
                            $caption = preg_replace("/\r|\n/", "", $caption);

                            $media_id = $obj['media_id'];
                            $device_id = "android-" . $guid;
                            $data = '{"device_id":"' . $device_id . '","guid":"' . $guid . '","media_id":"' . $media_id . '","caption":"' . trim($caption) . '","device_timestamp":"' . time() . '","source_type":"5","filter_type":"0","extra":"{}","Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"}';
                            $sig = GenerateSignature($data);
                            $new_data = 'signed_body=' . $sig . '.' . urlencode($data) . '&ig_sig_key_version=4';

                            // Now, configure the photo
                            $conf = SendRequest('media/configure/', true, $new_data, $agent, true);

                            if (empty($conf[1])) {
                                echo "Empty response received from the server while trying to configure the image";
                            } else {
                                if (strpos($conf[1], "login_required")) {
                                    echo "You are not logged in. There's a chance that the account is banned";
                                } else {
                                    $obj = @json_decode($conf[1], true);
                                    $status = $obj['status'];

                                    if ($status != 'fail') {
                                        echo "Success";
                                    } else {
                                        echo 'Fail';
                                    }
                                }
                            }
                        } else {
                            echo $status;
                            echo "<br />Status isn't okay";
                        }
                    }
                }
            }
        }
    }
}
