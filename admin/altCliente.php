<script src="../js/jquery-2.1.3.js"></script>
<script src="js/clientes.js"></script>
<article>
    <aside>
        <a href="verClientes.php" >Ver Clientes</a>        
    </aside>
    <?php
    require_once 'model/clienteDAO.php';
    $objCliente->setIdCliente($_GET['id']);
    $cliente = $objClienteDao->listaClientes($objCliente);
    ?>
    <form id="frmAltCliente" action="control/clienteControle.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="opcao" value="altCliente" />
        <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $cliente['idCliente']; ?>" />
        <input type="hidden" name="imagemAntiga" id="imagemAntiga" value="<?php echo $cliente['logo']; ?>" />
        <table>
            <tr>
                <td>Nome</td>
                <td>
                    <input type="text" name="nome" id="nome" value="<?php echo $cliente['nome']; ?>" /><br />
                    <span id="spanNome" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Cor Principal</td>
                <td>
                    <input type="text" name="cor1" id="cor1" value="<?php echo $cliente['cor1']; ?>" /><br />
                    <span id="spanCor1" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Cor Secundária</td>
                <td>
                    <input type="text" id="cor2" name="cor2" value="<?php echo $cliente['cor2']; ?>" /><br />
                    <span id="spanCor2" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Logo</td>
                <td>
                    <input type="file" name="foto" id="foto" /><br />
                    <span id="spanLogo" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="button" value="Alterar" id="btnAltCliente" />
                </td>
            </tr>
        </table>
    </form>
</article>
