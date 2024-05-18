  <form id="mostrar" action="" method="get">
    @csrf
  </form>     
  <form id="atualizar" action="" method="get">
    @csrf
  </form>
  <form id="apagar" action="" method="post">
    @csrf @method('DELETE')
  </form> 