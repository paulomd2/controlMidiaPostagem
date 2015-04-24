url = document.URL;
split = url.split('/');
pagina = split[split.length - 1];

function altCliente(id) {
    $.post('control/clienteControle.php', {opcao: 'altCliente', idCliente: id});
    if (pagina == 'clientes.php') {
        window.location = 'principal.php';
    } else {
        window.location.reload();
    }

    
}

$(document).ready(function(){
    $("#selClientes").change(function(){
        var id = $("#selClientes").val();
        
        altCliente(id);
    })
})