
   <?php

        $resultado=mysqli_query($conn, "SELECT * FROM visitante ORDER BY 'id'");
        $linhas=mysqli_num_rows($resultado);

    ?>
      <div class="container">
      <div class="page-header">
        <h1>Lista de Visitantes</h1>
      </div>


      <div class="row">
        <div class="pull-center">
          <a href='administrativo.php?link=3'><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
          </div>
          </div>
          </br>

        <div class="row">
        <div class="col-md-12">
          <table class="table table-condensed table-hover" id="tabela_procurar">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Empresa</th>
                <th>Telefone</th>
                <th>Cpf</th>
                <th>Rg</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($linhas = mysqli_fetch_array($resultado)){
                  echo "<tr>";
                      echo "<td>".$linhas['id']."</td>";
                      echo "<td>".$linhas['nome']."</td>";
                      echo "<td>".$linhas['empresa']."</td>";
                      echo "<td>".$linhas['telefone']."</td>";
                      echo "<td>".$linhas['cpf']."</td>";
                      echo "<td>".$linhas['rg']."</td>";
                      ?>
                      <td>
                      <a href ='administrativo.php?link=5&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-xs btn-primary'>Visualizar</button></a>

                      <a href ='administrativo.php?link=4&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-xs btn-warning'>Editar</button></a>

                      <a href ='processa/processa_apagar_visitante.php?id=<?php echo $linhas['id'];?>'><button type='button' class='btn btn-xs btn-danger'>Apagar</button></a>


                      <?php
                  echo "</tr>";
              }
              ?>


            </tbody>
          </table>
        </div>
      </div>

    </div> <!-- /container -->


