<?php
date_default_timezone_set('America/Recife');
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id_visita = $_GET["id_visita"];
$nome = $_GET["nome"];
$query=mysqli_query($conn,"UPDATE visita set saida = NOW(), visita_em_andamento = 0  WHERE id_visita='$id_visita'");

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
    
    if(mysqli_affected_rows($conn) > 0){ ?>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Visita Finalizada com Sucesso!</h4>
            </div>
            <div class="modal-body">
              <?php echo "A visita de $nome foi finalizada!"; ?>
            </div>
            <div class="modal-footer">
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
              <h4 class="modal-title" id="myModalLabel">Erro ao cadastrar o usuário!</h4>
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