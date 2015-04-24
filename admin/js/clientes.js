function delCliente(id) {
    if (confirm("Você deseja remover esse Cliente?") === true) {
        $.post('control/clienteControle.php',{opcao:'delCliente',idCliente:id});
        $("#listaClientes").load("verClientesAjax.php");
    }
}

$(document).ready(function () {
    $("#btnCadCliente").click(function () {
        var nome = $("#nome");
        var logo = $("#foto");
        var cor1 = $("#cor1");
        var cor2 = $("#cor2");

        $(".erro").html('');
        if (nome.val() == '') {
            nome.focus();
            $("#spanNome").html('Você deve preencher o nome');
        } else if (cor1.val() == '') {
            cor1.focus();
            $("#spanCor1").html('Você deve preencher a Cor Principal');
        } else if (cor1.val().length != 7) {
            cor1.focus();
            $("#spanCor1").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else if (cor1.val().indexOf('#') != '0') {
            cor1.focus();
            $("#spanCor1").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else if (cor2.val() == '') {
            cor2.focus();
            $("#spanCor3").html('Você deve preencher a Cor Secundária');
        } else if (cor2.val().length != 7) {
            cor2.focus();
            $("#spanCor2").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else if (cor2.val().indexOf('#') != '0') {
            cor2.focus();
            $("#spanCor2").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else if (logo.val() == '') {
            logo.focus();
            $("#spanLogo").html('Você deve selecionar uma imagem!');
        } else {
            $("#frmCadCliente").submit();
        }
    });

    $("#btnAltCliente").click(function () {
        var nome = $("#nome");
        var cor1 = $("#cor1");
        var cor2 = $("#cor2");

        $(".erro").html('');
        if (nome.val() == '') {
            nome.focus();
            $("#spanNome").html('Você deve preencher o nome');
        } else if (cor1.val() == '') {
            cor1.focus();
            $("#spanCor1").html('Você deve preencher a Cor Principal');
        } else if (cor1.val().length != 7) {
            cor1.focus();
            $("#spanCor1").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else if (cor1.val().indexOf('#') != '0') {
            cor1.focus();
            $("#spanCor1").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else if (cor2.val() == '') {
            cor2.focus();
            $("#spanCor3").html('Você deve preencher a Cor Secundária');
        } else if (cor2.val().length != 7) {
            cor2.focus();
            $("#spanCor2").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else if (cor2.val().indexOf('#') != '0') {
            cor2.focus();
            $("#spanCor2").html('A cor deve seguir o padrão de seis dígitos seguido de #');
        } else {
            $("#frmAltCliente").submit();
        }
    });
});