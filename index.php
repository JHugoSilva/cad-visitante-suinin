<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Login CadVis">
    <meta name="author" content="">
    
    <link rel="icon" href="img/small_suinin_logo.png" type="image/x-icon" />

    <title>Área de Login - CadVis</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php
    unset ( $_SESSION['usuarioId'],
            $_SESSION['usuarioNome'],
            $_SESSION['usuarioNiveisAcessoId']);

  ?>

  </br>
  </br>
  </br>
<div class="container-fluid">
  <div class="row">
<div class=" col-md-12 text-center">
    <img height="200" width="200"  src="img/SUININ_Logo.png" alt="Responsive image">
  </div>
</div>

    <div class="wrapper">


      <form class="form-signin" method="POST" action="valida_login.php">
        
        <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="int" name="cpf" class="form-control" placeholder="Digitar o CPF" required autofocus>
</div>
        
        <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" name="senha" class="form-control" placeholder="Digita a senha" required autofocus>
        </div>
        
        
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembre-me
          </label>
        </div>

        <button class="btn btn-primary btn-block" type="submit">ENTRAR</button>
      </form>
      <?php

        echo "<center><br><strong>2020 © Subcoordenadoria de Informação e Informática - SUININ/SESAP</center><br></strong>";
       ?>
      <p class="text-center text-danger">
      <?php if(isset($_SESSION['loginErro'])){
        echo $_SESSION['loginErro'];
        unset($_SESSION['loginErro']);
      }?>
    </p>
    <p class="text-center text-success">
      <?php 
      if(isset($_SESSION['logindeslogado'])){
        echo $_SESSION['logindeslogado'];
        unset($_SESSION['logindeslogado']);
      }
      ?>
    </p>

  
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
