    <?php
@session_start();

if ($_SESSION["codigoAR"] == '' || $_SESSION["nivel"] != 1) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>        
        <title>Baby Beauty</title>
        <?php include_once '../include/head.php'; ?>
        <!--<script src="js/admin.js"></script>-->
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        ?>
        <div class="main">
            <?php
            require_once 'menuAdmin.php';
            ?>
            <?php include_once 'verUsuarios.php'; ?>
        </div>
    </body>
</html>