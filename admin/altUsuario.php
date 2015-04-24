<script src="../js/jquery-2.1.3.js"></script>
<script src="js/usuarios.js"></script>
<article>
    <aside>
        <a href="verUsuarios.php" >Ver Usuários</a>        
    </aside>
    <?php
    require_once 'model/usuarioDAO.php';
    $objUsuario->setIdUsuario($_GET['id']);
    $usuario = $objUsuarioDao->listaUsuarios($objUsuario);
    ?>
    <form>
        <table>
            <input type="hidden" value="<?php echo $usuario['idUsuario']; ?>" name="idUsuario" id="idUsuario" />
            <input type="hidden" value="<?php echo $usuario['senha']; ?>" name="senhaAntiga" id="senhaAntiga" />
            <tr>
                <td>Nome</td>
                <td>
                    <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>" /><br />
                    <span id="spanNome" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Login</td>
                <td>
                    <input type="text" name="login" id="login" value="<?php echo $usuario['login']; ?>" /><br />
                    <span id="spanLogin" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" id="email" value="<?php echo $usuario['email']; ?>" /><br />
                    <span id="spanEmail" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Senha</td>
                <td>
                    <input type="password" id="senha" name="senha" /><br />
                    <span id="spanSenha" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Nível</td>
                <td>
                    <select name="nivel" id="nivel">
                        <option value="">Selecione um nível...</option>
                        <option value="1" <?php if ($usuario['nivel'] == '1') {
        echo 'selected';
    } ?>>Administrador</option>
                        <option value="2" <?php if ($usuario['nivel'] == '2') {
        echo 'selected';
    } ?>>Editor</option>
                        <option value="3" <?php if ($usuario['nivel'] == '3') {
        echo 'selected';
    } ?>>Cliente</option>
                    </select><br />
                    <span id="spanNivel" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Clientes:</td>
                <td>
                    <?php
                    require_once 'model/clienteDAO.php';
                    $clientes = $objClienteDao->listaClientes();
                    $usuarioCliente = explode(',', $usuario['cliente']);

                    foreach ($clientes as $cliente) {
                        if(in_array($cliente['idCliente'], $usuarioCliente)) {
                            $checked = 'checked';
                        } else {
                            $checked = '';
                        }
                        echo '<input type="checkbox" name="cliente" id="' . $cliente["idCliente"] . '" value="' . $cliente["idCliente"] . '" ' . $checked . ' /> <label for="' . $cliente["idCliente"] . '"> ' . $cliente["nome"] . ' </label>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="button" value="Alterar" id="btnAltUsuario" />
                </td>
            </tr>
        </table>
    </form>

</article>
