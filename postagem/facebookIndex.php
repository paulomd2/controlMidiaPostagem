<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script src="../js/jquery-2.1.3.js"></script>
    </head>
    <body>
        <script src="js/facebookLogin.js"></script>

    <fb:login-button scope="public_profile,email,manage_pages,publish_actions,publish_pages" onlogin="checkLoginState();">
    </fb:login-button>

    <a href="javascript:logout();"> Deslogar </a><br /><br />

    <div id="status">
    </div>
</body>
</html>
