<script src="../js/jquery-2.1.3.js"></script>
<script src="js/clientes.js"></script>
<article>
    <aside>
        <a href="cadCliente.php" >Cadastrar Cliente</a>        
    </aside>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Logo</td>
                <td>Cor 1</td>
                <td>Cor 2</td>
                <td>Alterar</td>
                <td>Excluir</td>
            </tr>
        <tbody id="listaClientes">
            <?php
                include_once 'verClientesAjax.php';
            ?>
        </tbody>

        </thead>
    </table>
</article>