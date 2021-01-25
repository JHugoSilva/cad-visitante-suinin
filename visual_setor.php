  <?php
    $id = $_GET['id'];

    // Executa a consulta
    $result=mysqli_query($conn,"SELECT * FROM setor WHERE id='$id' LIMIT 1");
    $resultado=mysqli_fetch_assoc($result);
 
?>
    <div class="container">
       
      
      <div class="page-header">
        <h1>Visualizar Setor</h1>
      </div>
      <div class="row">
        <div class="pull-right">
          <a href='administrativo.php?link=7&id=<?php echo $resultado['id']; ?>'> <button type='button' class='btn btn-sm btn-info'> Listar</button></a>

          <a href='administrativo.php?link=9&id=<?php echo $resultado['id']; ?>'> <button type='button' class='btn btn-sm btn-warning'> Editar</button></a>

          <a href='processa/processa_apagar_setor.php?id=<?php echo $resultado['id'];?>'> <button type='button' class='btn btn-sm btn-danger'> Apagar</button></a>
          </div>
        </div>

      <div class="row">

        <div class="col-md-12">
		      <div class="col-sm-3 col-md-3">
              <b>ID:</b>
          </div>
          <div class="col-sm-9 col-md-9">
            <?php echo $resultado['id']; ?>
          </div>
          </div>

          <div class="col-sm-3 col-md-3">
              <b>Nome:</b>
          </div>
          <div class="col-sm-9 col-md-9">
            <?php echo $resultado['nome']; ?>
          </div>
          </div>


        </div>
      </div>

    </div> <!-- /container -->