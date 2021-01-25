<style>
    #my_camera, #image_not_border{
     width: 160px;
     height: 120px;
     /*border: 1px solid black;*/
    }
    
    #margin_bottom_sis{
      margin-bottom:7px;
    }
</style>
  
<div class="container">
  <div class="page-header">
    <h1>Cadastrar Visitante</h1>
  </div>

  <div class="row">
   

        <form class="form-horizontal" method="POST" action="cadastrar_visitante.php">
            <div class="row">
   
            <div class="form-group">
            
              <label for="inputEmail3" class="col-sm-1 control-label">Nome</label>
              <div class="col-sm-5">
                <input type="text" class="form-control text-uppercase" id="nomeId" name="nome" placeholder="Nome Completo" required>
              </div>
            <label for="inputEmail3" class="col-sm-1 control-label">CPF</label>
            <div class="col-sm-5" id="margin_bottom_sis">
              <input type="text" class="form-control text-uppercase" id="cpfId" name="cpf" data-mask="99999999999" placeholder="CPF" required>
              <?php if(isset($_GET['error_cpf']) && $_GET['error_cpf']==1): ?>
              <div id="cpf_exist">* Cpf já cadastrado no sistema</div>
              <?php endif; ?>
            </div>
         
            <label for="inputEmail3" class="col-sm-1 control-label">Unidade</label>
            <div class="col-sm-5" id="margin_bottom_sis">
              <input type="text" class="form-control text-uppercase" id="empresaId" name="empresa" placeholder="Nome da Empresa ou Unidade">
            </div>
         
          <label for="inputEmail3" class="col-sm-1 control-label">Telefone</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="telefoneId" name="telefone" data-mask="(99)99999-9999" placeholder="Telefone">
            </div>
          </div>

          <div class="col-md-offset-1">
            
            <div class="col-sm-4">
              <input type="submit" value="Salvar" class="btn btn-lg btn-primary btn-block" >
            </div>
          </div>
        </form>
    </div>
  </div>

 <?php if(@$_GET['v']):?>
  <div class="col-sm-4"  style="display:none;">
  <div class="col-sm-4" id="photo">
              <input type="button" value="Foto" class="btn btn-lg btn-success btn-block" onClick="take_snapshot()">
              </div>
              <div class="col-sm-4" id="nova_img">
              <input type="button" value="Nova Imagem" class="btn btn-lg btn-success btn-block" onClick="reloadImg()">
              </div>
              <div class="col-sm-4" id="ativar_camera">
              <input type="button" value="Camera" class="btn btn-lg btn-success btn-block" onClick="configure()">
            </div>
                <div id="my_camera">
                  <img src="img/default.png" alt="" id="my_camera">
                </div>
                <div id="results" ></div>
            </div>
            </div>
            <?php endif;?>