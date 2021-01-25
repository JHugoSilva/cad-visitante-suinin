<?php
  session_start();
  require_once("seguranca.php");
  require_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SISTEMA CONTROLE DE VISITAS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.min.css" rel= "stylesheet" media= "screen" >

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <!-- <link href="navbar.css" rel="stylesheet"> -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php
        require_once("menu_admin.php");


        $pag[1] = "bem_vindo.php";
        $pag[2] = "procurar.php";
        $pag[3] = "cad_visitante.php";
        $pag[4] = "edit_visitante.php";
        $pag[5] = "visual_visitante.php";
        $pag[6] = "cad_setor.php";
        $pag[7] = "listar_setor.php";
        $pag[8] = "visual_setor.php";
        $pag[9] = "edit_setor.php";
        $pag[10] = "psicologa.php";
        $pag[11] = "cad_visita.php";
        $pag[12] = "relatorio_nome.php";
        $pag[13] = "relatorio_n.php";
        $pag[14] = "relatorio_dia.php";
        $pag[15] = "relatorio_d.php";
        $pag[16] = "finalizar_visitante.php";


     if(isset($_GET['link'])){
      $link = $_GET['link'];

         if(file_exists($pag[$link])){
           include $pag[$link];
            }else{
              include('bem-vindo.php');
             }
           }else{
            include('bem-vindo.php');
         }


    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src= "js/jasny-bootstrap.min.js" > </script>
    <script src= "js/jquery.consultar-cep.min.js"></script>
    <script>

      $('#cep').consultarCep({

        evento:        'blur',
        focarAposPara: '#numero',
        mensagem: '<i class="fa fa-spin fa-spinner"></i>',
        classMensagem: 'label label-default',
        campos: {
          logradouro:  '#endereco',
          bairro:      '#bairro',
          localidade:  '#cidade',
          uf:          '#uf'
        }
      });

    </script>

    <script src= "js/jasny-bootstrap.min.js" > </script>


<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
          $(document).ready(function(){
          $('#tabela_procurar').DataTable({
          "pagingType": "full_numbers",
                    "language": {
                        "url": "js/br.txt"
                    }
               });
           });

     </script>


    <script src="js/webcam.min.js"></script>
  <!-- /container -->
  <script language="JavaScript">
  
  
  $("#btn-salvar").on("click",function(event) {
    event.preventDefault();
    var nomeId = $("#nomeId").val();
    var cpfId = $("#cpfId").val();
    var empresaId = $("#empresaId").val();
    var telefoneId = $("#telefoneId").val();

    if(nomeId==''){
      $("#nomeId").css("border", "1px solid #DC3545");
      return false;
    } else {
      $("#nomeId").css("border", "1px solid #28A745");
    }

    if(cpfId==''){
      $("#cpfId").css("border", "1px solid #DC3545");
      return false;
    } else {
      $("#cpfId").css("border", "1px solid #28A745");
    }

    if(telefoneId==''){
      $("#telefoneId").css("border", "1px solid #DC3545");
      return false;
    } else {
      $("#telefoneId").css("border", "1px solid #28A745");
    }
  
    if(nomeId!=='' || cpfId==''){
      $("#btn-salvar").attr("disabled", "disabled");
      $.ajax({
        url: "cadastrar_visitante.php",
				type: "POST",
				data: {
					nomeId: nomeId,
					cpfId: cpfId,
					empresaId: empresaId,
					telefoneId: telefoneId				
				},
				success: function(dataResult){
         
          if(dataResult==false){
            $("#cpfId").css("border", "1px solid #DC3545");
            $("#cpf_exist").css("color", "#DC3545");
            $("#cpf_exist").css("display","block");
            $("#btn-salvar").removeAttr("disabled");
            return false;
          } else if(dataResult!=0) {
              $("#nomeId").attr("disabled", "disabled");
              $("#cpfId").attr("disabled", "disabled");
              $("#empresaId").attr("disabled", "disabled");
              $("#telefoneId").attr("disabled", "disabled");
              var nomeId = $("#nomeId").val('');
              var cpfId = $("#cpfId").val('');
              var empresaId = $("#empresaId").val('');
              var telefoneId = $("#telefoneId").val('');
              $("#nomeId").removeAttr("disabled");
              $("#cpfId").removeAttr("disabled");
              $("#empresaId").removeAttr("disabled");
              $("#telefoneId").removeAttr("disabled");
              $("#btn-salvar").removeAttr("disabled");
              $("#nomeId").css("border", "");
              $("#cpfId").css("border", "");
              $("#empresaId").css("border", "");
              $("#telefoneId").css("border", "");
              $("#cpf_exist").css("display","none");
              
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Visitante Cadastrado com sucesso!',
                  showConfirmButton: false,
                  timer: 1500
                });
                
              setTimeout(() => {
              
                  window.location = "http://localhost/registro-de-visitas-hugoDev/administrativo.php?link=16&id_visitante=dataResult"
              }, 1800);
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
		        alert("Erro!");
	      }
      });
    }

    
  });


      $("#photo").hide();
      $("#nova_img").hide();
     // Configure a few settings and attach camera
     function configure(){
      Webcam.set({
       width: 160,
       height: 120,
       image_format: 'jpeg',
       jpeg_quality: 80
      });
      Webcam.attach('#my_camera');
      $("#nova_img").hide();
      $("#ativar_camera").hide();
      $("#photo").show();
     }
    
     function take_snapshot() {
      // take snapshot and get image data
      Webcam.snap( function(data_uri) {
        $("#nova_img").show();
        $("#my_camera").hide();
        $("#photo").hide();
      // display results in page
      document.getElementById('results').innerHTML = 
       '<img id="imageprev" src="'+data_uri+'"/>';
       saveSnap();
      } );
    
      Webcam.reset();
     }
    
    function saveSnap(){
     
     // Get base64 value from <img id='imageprev'> source
     var base64image = document.getElementById("imageprev").src;
    
     Webcam.upload( base64image, 'upload.php', function(code, text) {
      console.log('Save successfully');
      //console.log(text);
     });
    
    }
    function reloadImg(){
      $("#nova_img").show();
      $("#my_camera").show();
      $("#photo").hide();
      $("#imageprev").hide();
      configure()
    }

    </script>
  </body>
</html>
