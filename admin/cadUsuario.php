<script src="../js/jquery-2.1.3.js"></script>
<script src="js/usuarios.js"></script>
<article>
    <aside>
        <a href="verUsuarios.php" >Ver Usuários</a>        
    </aside>
    <form>

        <table>
            <tr>
                <td>Nome</td>
                <td>
                    <input type="text" name="nome" id="nome" /><br />
                    <span id="spanNome" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Login</td>
                <td>
                    <input type="text" name="login" id="login" /><br />
                    <span id="spanLogin" class="erro"></span>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" id="email" /><br />
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
                        <option value="1">Administrador</option>
                        <option value="2">Editor</option>
                        <option value="3">Cliente</option>
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

                    foreach ($clientes as $cliente) {
                        echo '<input type="checkbox" name="cliente" id="' . $cliente["idCliente"] . '" value="' . $cliente["idCliente"] . '" /> <label for="' . $cliente["idCliente"] . '"> ' . $cliente["nome"] . ' </label>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="button" value="Cadastrar" id="btnCadUsuario" />
                </td>
            </tr>
        </table>
    </form>
</article>
