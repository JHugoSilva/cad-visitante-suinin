    
   <?php
        
        $resultado=mysqli_query($conn, "SELECT * FROM setor ORDER BY 'id'");
        $linhas=mysqli_num_rows($resultado);
        
    ?>    
      <div class="container">
      <div class="page-header">
        <h1>Listar Setor</h1>
      </div>
      <div class="row">
        <div class="pull-right">
          <a href='administrativo.php?link=6'><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
          </div>
          </div>
          </br>
      

      <div class="row">
        <div class="col-md-12">
          <table class="table" id="tabela_procurar">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                  <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($linhas = mysqli_fetch_array($resultado)){
                  echo "<tr>";
                      echo "<td>".$linhas['id']."</td>";
                      echo "<td>".$linhas['nome']."</td>";
                      ?> 
                      <td> 
                      <a href ='administrativo.php?link=8&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-xs btn-primary'>Visualizar</button></a>

                      <a href ='administrativo.php?link=9&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-xs btn-warning'>Editar</button></a>

                      <a href ='processa/processa_apagar_setor.php?id=<?php echo $linhas['id'];?>'><button type='button' class='btn btn-xs btn-danger'>Apagar</button></a>

                      <?php
                  echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div> <!-- /container -->