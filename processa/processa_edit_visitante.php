<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id = $_POST["id"];
$nome = $_POST["nome"];
$empresa = $_POST["empresa"];
$telefone = $_POST["telefone"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$query=mysqli_query($conn,"UPDATE visitante set nome ='$nome' ,rg = '$rg', cpf = '$cpf', telefone ='$telefone', empresa ='$empresa' WHERE id='$id' ");
?>
<!DOCTYPE html>
<html lan="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="../css/bootstrap.min.css" rel="stylesheet">
    	<script src="../js/jquery.min.js"></script>
    	<script src="../js/bootstrap.min.js"></script>
	</head>

		<body>
			<?php
			if(mysqli_affected_rows($conn))
				{ ?>
			<!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Visitante Editado com Sucesso!</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Corrigir Cadastro</button>
              <a href="http://localhost/cadvis/administrativo.php?link=2"><button type="button" class="btn btn-success">Ok</button></a>
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
              <h4 class="modal-title" id="myModalLabel">Erro ao Editar o Visitante!</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <a href="http://localhost/cadvis/administrativo.php?link=2"><button type="button" class="btn btn-danger">Ok</button></a>
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
  
		</body>
</html>

