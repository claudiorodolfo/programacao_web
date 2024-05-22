function buscarPorAluno() {
    $("#acao").val('buscar_por_aluno');
    $("#form").submit();
}

//function buscarTodos() {
//    $("#acao").val('buscar_todos');
//    $("#form").submit();
//}

function buscarAvaliacaoAluno(indiceArray) {
    $("#acao").val('buscar_avaliacao_aluno');
    $("#indiceArray").val(indiceArray); 
   //document.getElementById('indiceArray').value = indiceArray;
    $("#form").submit();
}