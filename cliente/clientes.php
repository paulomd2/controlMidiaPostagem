<?php
@session_start();

if ($_SESSION["codigoAR"] == '' || !($_SESSION["nivel"] != '2' || $_SESSION["nivel"] != '3')) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>        
        <title>Baby Beauty</title>
        <?php include_once '../include/head.php'; ?>
        <script src="js/clientes.js"></script>
    </head>
    <body>
        <?php
//        include_once 'include/header.php';
        ?>
        <div class="main">
            <article>
                <?php
                require_once 'model/ClientesDao.php';
                $objUsuarioCliente->setIdUsuario($_SESSION['codigoAR']);
                $clientes = $objClienteDao->listaClientes($objUsuarioCliente);

                foreach ($clientes as $cliente) {
                    echo '<div style="float:left">
                            <a href="javascript:altCliente(' . $cliente["idCliente"] . ')">
                                <img src="../upload/' . $cliente["logo"] . '" width="100" /> <br />
                                <span>' . $cliente["nome"] . '</span>
                            </a>
                          </div>';
                }
                ?>
            </article>
        </div>
    </body>
</html>