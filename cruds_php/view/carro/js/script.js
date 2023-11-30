/*
function apagar(id) {
    var confirm = window.confirm("Deseja realmente apagar o registro?");

    if (confirm) {
        $("#acao").val('apagar');
        $("#id").val(id);
        $("#form").submit();
    }
}
*/

function buscar(id) {
    $("#acao").val('buscar_detalhe');
    $("#id").val(id);
    $("#form").submit();
}

/*
function editar(id) {
    $("#acao").val('buscar_edicao');
    $("#id").val(id);
    $("#form").submit();
}
*/

function buscarTodos() {
    $("#acao").val('buscar_todos');
    $("#form").submit();
}