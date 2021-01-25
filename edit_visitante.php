<?php
    $id = $_GET['id'];
    // Executa a consulta
    $result=mysqli_query($conn,"SELECT * FROM visitante WHERE id='$id' LIMIT 1");
    $resultado=mysqli_fetch_assoc($result);

?>
      <div class="container">

      <div class="page-header">
        <h1>Editar Visitante</h1>

      </div>
      <div class="row espaco">
        <div class="pull-right">
          <a href='administrativo.php?link=2&id=<?php echo $resultado['id']; ?>'> <button type='button' class='btn btn-sm btn-info'> Listar</button></a>

          <a href='processa/processa_apagar_paciente.php?id=<?php echo $resultado['id'];?>'> <button type='button' class='btn btn-sm btn-danger'> Apagar</button></a>
          </div>
          </div>
          </br>
      <div class="row">
        <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="processa/processa_edit_visitante.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value ="<?php echo $resultado['nome']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Empresa</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="empresa" placeholder="Empresa" value ="<?php echo $resultado['empresa']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="telefone" data-mask="(99)99999-9999" placeholder="Telefone" value ="<?php echo $resultado['telefone']; ?>">
    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
      <div class="col-sm-3">
      <input type="text" class="form-control text-uppercase"  name="cpf" data-mask="99999999999" placeholder="CPF" value ="<?php echo $resultado['cpf']; ?>">
      </div>
    <label for="inputEmail3" class="col-sm-2 control-label">RG</label>
    <div class="col-sm-4">
      <input type="text" class="form-control text-uppercase"  name="rg" data-mask="999999999" placeholder="RG" value ="<?php echo $resultado['rg']; ?>">
      </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $resultado['id'];?>">

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </div>
</form>
        </div>
      </div>
    </div> <!-- /container -->
<link rel="stylesheet" href="css/style.css">
