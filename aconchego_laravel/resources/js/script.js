function mostrar(id, rota) {
    var form = document.getElementById(id);
    form.action = rota;
    form.submit();
}

function atualizar(id, rota) {
    var form = document.getElementById(id);
    form.action = rota;
    form.submit();
}

function apagar(id, rota) {
  if (window.confirm('Deseja realmente apagar o registro?')) {
    var form = document.getElementById(id);
    form.action = rota;
    form.submit();
  }
}