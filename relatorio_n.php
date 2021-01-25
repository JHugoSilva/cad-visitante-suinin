   <?php

        $id = isset($_GET['id'])?$_GET['id']:"";
        $resultado=mysqli_query($conn, "SELECT visita.*, setor.nome AS setor, visitante.nome AS visitante  FROM visita LEFT OUTER JOIN setor ON (setor = setor.id) JOIN visitante ON (id_visitante = visitante.id) WHERE visitante.id = '$id'");
        $linhas=mysqli_num_rows($resultado);
        $nome = mysqli_fetch_array($resultado);
    ?>

      <div class="container">
      <div class="page-header">
        <h1>Relatorio de Visita 
        <?php echo $nome['visitante'];
        $nome = mysqli_data_seek($resultado, 0);
        ?>
        </h1>
      </div>

      <div>
<a href ='administrativo.php?link=12'><button type='button' class='btn btn-primary glyphicon glyphicon-backward'>VOLTAR</button></a>
    </div>
    </br>
    </br>
    </br>

         <div class="row">
        <div class="col-md-12">
          <table class="table table-condensed table-hover" id="tabela_procurar">
            <thead>
              <tr>
                <th>ID Visita</th>
                <th>Nome</th>
                <th>Objetivo</th>
                <th>Entrada</th>
                <th>Saida</th>
                <th>Empresa</th>
                <th>Setor</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($linhas = mysqli_fetch_array($resultado)){
                  echo "<tr>";
                      echo "<td>".$linhas['id_visita']."</td>";
                      echo "<td>".$linhas['visitante']."</td>";
                      echo "<td>".$linhas['objetivo']."</td>";
                     echo "<td>", date('d/m/Y H:i:s', strtotime($linhas['entrada'])), "</td>";
                     echo "<td>", date('d/m/Y H:i:s', strtotime($linhas['saida'])), "</td>";
                     echo "<td>".$linhas['empresa']."</td>";
                     echo "<td>".$linhas['setor']."</td>";
                     echo "</tr>";
                   }

                      ?>

            </tbody>
          </table>
        </div>
      </div>

    </div> <!-- /container -->