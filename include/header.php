<?php
@session_start();

require_once 'model/usuarioDAO.php';
$objUsuario->setIdUsuario($_SESSION['codigoAR']);
$retorno = $objUsuarioDao->listaUsuarios($objUsuario);
?>

<div class="bgheader">
    <header>
        <div class="logo">
            <a href="principal.php"><img src="../img/logo.png" alt=""/></a>
        </div>
        <div class="barra-topo">
            <?php
            if ($retorno['nivel'] != 1 ) {
                if($retorno['nivel'] == 2 ){
                ?>
            
                <div>
                    <select id="selClientes" name="selClientes">
                        <?php
                            @include_once 'model/clientesDAO.php';
                            $objUsuarioCliente->setIdUsuario($_SESSION['codigoAR']);
                            $clientes = $objClienteDao->listaClientes($objUsuarioCliente);

                            foreach ($clientes as $cliente) {

                                if ($_SESSION['cliente'] == $cliente['idCliente']) {
                                    $checked = 'selected';
                                } else {
                                    $checked = '';
                                }

                                echo '<option id="' . $cliente["idCliente"] . '" ' . $checked . '>' . $cliente["nome"] . '</option>';
                            }
                        ?>
                    </select>

                </div>
            <?php
                }
            ?>
                <div class="add-post">
                    <a href="adicionar.php" class="cor-apoio"><i class="icon icon-plus"></i> <span>Adicionar Post</span></a>
                </div>
            <?php } ?>
            <div class="hi-user">
                <span>Bem vindo (a) <strong><?php echo $retorno['nome'] ?></strong></span>
            </div>
            <div class="sair">
                <a href="../sair.php" class="cor-principal"><i class="icon icon-exit"></i> <span>Sair</span></a>
            </div>
        </div>
    </header>
</div>