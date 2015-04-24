function validaEmail(email) {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
}

function clienteString() {
    var cliente = '';
    $("input[name='cliente']").each(function (index, value) {
        if ($(this).prop("checked"))
        {
            cliente += $(this).val() + ',';
        }
    });

    return cliente;
}

function delUsuario(id) {
    if (confirm("Você tem certeza que deseja excluir esse Usuário?") === true) {
        $.post('control/usuarioControle.php', {opcao: 'delUsuario', idUsuario: id});
        $("#listaUsuarios").load("verUsuariosAjax.php");
    }
}

$(document).ready(function () {
    $("#btnCadUsuario").click(function () {
        var nome = $("#nome");
        var email = $("#email");
        var senha = $("#senha");
        var login = $("#login");
        var nivel = $("#nivel");
        var clientes = clienteString();

        $(".erro").html('');
        if (nome.val().trim() == '') {
            nome.focus();
            $("#spanNome").html('Você deve preencher o nome!');
        } else if (login.val().trim() == '') {
            login.focus();
            $("#spanLogin").html('Você deve preencher o login!');
        } else if (email.val().trim() == '') {
            email.focus();
            $("#spanEmail").html('Você deve preencher o email!');
        } else if (validaEmail(email.val().trim()) === false) {
            email.focus();
            $("#spanEmail").html('Você deve preencher um email válido!');
        } else if (senha.val().trim() == '') {
            senha.focus();
            $("#spanSenhha").html('Você deve preencher a senha!');
        } else if (nivel.val() == '') {
            nivel.focus();
            $("#spanNivel").html('Você deve selecionar um nível!');
        } else {
            $.post('control/usuarioControle.php', {opcao: 'cadUsuario', nome: nome.val(), email: email.val(), senha: senha.val(), login: login.val(), nivel: nivel.val(), clientes: clientes},
            function (r) {
                console.log(r);
            });
            window.location = 'admin.php';
        }
    });


    $("#btnAltUsuario").click(function () {
        var nome = $("#nome");
        var email = $("#email");
        var login = $("#login");
        var nivel = $("#nivel");
        var idUsuario = $("#idUsuario").val();
        var senha;
        var clientes = clienteString();

        if ($("#senha").val() == '') {
            senha = $("#senhaAntiga").val()
        } else {
            senha = $("#senha").val();
        }

        $(".erro").html('');
        if (nome.val().trim() == '') {
            nome.focus();
            $("#spanNome").html('Você deve preencher o nome!');
        } else if (login.val().trim() == '') {
            login.focus();
            $("#spanLogin").html('Você deve preencher o login!');
        } else if (email.val().trim() == '') {
            email.focus();
            $("#spanEmail").html('Você deve preencher o email!');
        } else if (validaEmail(email.val().trim()) === false) {
            email.focus();
            $("#spanEmail").html('Você deve preencher um email válido!');
        } else if (nivel.val() == '') {
            nivel.focus();
            $("#spanNivel").html('Você deve selecionar um nível!');
        } else {
            $.post('control/usuarioControle.php', {opcao: 'altUsuario', nome: nome.val(), email: email.val(), senha: senha, login: login.val(), nivel: nivel.val(), idUsuario: idUsuario, clientes: clientes});
        }
    });
});