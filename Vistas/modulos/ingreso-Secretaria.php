<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Clinica Médica</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar como secretaria</p>

    <form method="post">
     
    <div class="form-group has-feedback">
    
        <input type="text" class="form-control" name = "usuario-Ing" placeholder="Usuarios">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
     
    </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name = "clave-Ing" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    
    <?php 
        $ingreso = new SecretariasC();
        $ingreso -> IngresarSecretariaC();


    ?>

    </form>
  </div>
  <!-- /.login-box-body -->
</div>