<!DOCTYPE html>
<html lang="pt-BR">
    <head>        
        <title>Baby Beauty</title>
        <?php // include_once 'include/head.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/jquery-2.1.3.js"></script>
        <script src="js/login.js"></script>
    </head>
    <body class="login">
        <div class="box-login">
            <img src="img/logo.png" alt="" />
            <form name="form1" >
                <input type="text" name="login" id="login" placeholder="LOGIN"/>
                <input type="password" name="senha" id="senha" placeholder="SENHA"/>
                <input type="button" id="btnLogin" value="ENTRAR" /><br />
                <span id="spanLogin" class="erro"></span>
            </form>
        </div>
    </body>
</html>