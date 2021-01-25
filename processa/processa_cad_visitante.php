<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$nome = $_POST["nome"];
$empresa = $_POST["empresa"];
$telefone = $_POST["telefone"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$query=mysqli_query($conn,"INSERT INTO visitante (nome, empresa, telefone, cpf, rg) VALUES ('$nome', 
'$empresa','$telefone', '$cpf', '$rg' )");


$last_id = mysqli_insert_id ($conn);

if(isset($_FILES['foto']))
{
   date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

   $ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
   $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   $dir = '../uploads/'; //Diretório para uploads

   move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
}
$sql =mysqli_query($conn, "INSERT INTO fotos (id_visitante,foto) values ('$last_id','$new_name')");
echo $sql;
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
    <script src="../js/script.js"></script>
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
              <h4 class="modal-title" id="myModalLabel">Usuário cadastrado com Sucesso!</h4>
            </div>
            <div class="modal-body">
              <?php echo $nome; ?>
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
              <h4 class="modal-title" id="myModalLabel">Erro ao cadastrar o usuário!</h4>
            </div>
            <div class="modal-body">                
              <?php echo $nome; ?>
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
  
  
    </div>
    </body>
</html> 