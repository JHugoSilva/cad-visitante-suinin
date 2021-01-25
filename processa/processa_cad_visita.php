<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id_visitante = $_POST["id"];
$nome = $_POST["nome"];
$empresa = $_POST["empresa"];
$objetivo = $_POST["objetivo"];
$setor = $_POST["setor"];

$query=mysqli_query($conn,"INSERT INTO visita (id_visitante, entrada, empresa, objetivo, setor, visita_em_andamento) VALUES ('$id_visitante', NOW(), '$empresa','$objetivo', '$setor', TRUE )");
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </head>
    </head>

    <body>
      <div class="container theme-showcase" role="main">
      <?php
			if(mysqli_affected_rows($conn))
				{ ?>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Visita cadastrada com Sucesso!</h4>
            </div>
            <div class="modal-body">
              <?php echo $nome; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Corrigir Visita</button>
              <a href="http://localhost/cadvis/administrativo.php?link=1"><button type="button" class="btn btn-success">Ok</button></a>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function () {
          $('#myModal').modal('show');
        });
      </script>
    <?php }else{ ?>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Erro ao cadastrar a visita!</h4>
            </div>
            <div class="modal-body">
              <?php
               echo $nome; ?>
            </div>
            <div class="modal-footer">
              <a href="http://localhost/cadvis/administrativo.php?link=1"><button type="button" class="btn btn-danger">Ok</button></a>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function () {
          $('#myModal').modal('show');
        });
      </script>
    <?php } ?>
  
  
    </div>
    </body>
</html> 