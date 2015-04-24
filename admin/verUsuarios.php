<script src="../js/jquery-2.1.3.js"></script>
<script src="js/usuarios.js"></script>
<article>
    <aside>
        <a href="cadUsuario.php" >Cadastrar Usuário</a>        
    </aside>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Login</td>
                <td>Email</td>
                <td>Nível</td>
                <td>Alterar</td>
                <td>Excluir</td>
            </tr>
        <tbody id="listaUsuarios">
            <?php
                include_once 'verUsuariosAjax.php';
            ?>
        </tbody>

        </thead>
    </table>
</article>