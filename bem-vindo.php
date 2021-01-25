    
   <?php
        date_default_timezone_set('America/Recife');
        $resultado=mysqli_query($conn, "SELECT * FROM visita INNER JOIN visitantes ON visita.id_visitante = id where visita_em_andamento = 1 ORDER BY id_visita");
        $linhas=mysqli_num_rows($resultado);


    ?>    
    
      <div class="container">
      <div class="page-header">
        <h1>Visitas em Andamento</h1>
      </div>
          <div class="row">
          <div class="pull-left">
          <a href='administrativo.php?link=11'><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
          </div>
          </div>
          <br>
          <br>
        <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-hover">
            <thead>
              <tr>                
                <th>Nome</th>
                <th>Empresa</th>
                <th>Objetivo</th>
                <th>Entrada</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($linhas = mysqli_fetch_array($resultado)){
                  echo "<tr>";                      
                      echo "<td>".$linhas['nome']."</td>";
                      echo "<td>".$linhas['empresa']."</td>";
                      echo "<td>".$linhas['objetivo']."</td>";
                      echo "<td>", date('d/m/Y H:i:s', strtotime($linhas['entrada'])), "</td>";
                      ?> 
                      <td> 
                      <a href ='processa/processa_finalizar_visita.php?id_visita=<?php echo $linhas['id_visita'];?>&nome=<?php echo $linhas['nome'];?>'><button type='button' class='btn btn-xs btn-primary' title="Finalizar">Finalizar</button></a>

                      <a href ='administrativo.php?link=4&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-xs btn-warning' title="Editar">Editar</button></a>

                      <?php
                  echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div> <!-- /container -->



