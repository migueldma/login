<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $titulo; ?></title>
    
    <!-- CSS principal -->
    <link href="<?php echo base_url(); ?>css/usuario/usuario.css" rel="stylesheet">    
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>third_party/bootstrap/css/bootstrap.min.css" rel="stylesheet">    
  </head>
  <body>
    <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
            <div>
              <h1 class="h1Usuario"><?php echo $titulo; ?></h1>
            </div>
            <div class="logincontenedor">              
              <?php  echo form_open('usuario/manejo_usuario'); ?>
              <input type="hidden" name="idUsuario" value="<?php if(isset($idUsuario)) echo $idUsuario;?>">
              <div class   ="form-group">
                <label for   ="inputUsuario">Usuario</label>
                <input type  ="user" class="form-control" name = "inputUsuario" id="inputUsuario" placeholder="Usuario" value="<?php echo isset($datosUsuario['usuario'])?$datosUsuario['usuario']:''; ?>"   >
              </div>
              <div class   ="form-group">
                <label for   ="inputPassword">Password</label>
                <input type  ="password" class="form-control" name = "inputPassword" id="inputPassword" placeholder="Password" <?php if(isset($idUsuario)) echo $idUsuario != ''?' disabled':'';  ?>>
              </div>   
              <div class   ="form-group">                
                <input type  ="password" class="form-control" name = "inputConfirmacionPassword" id="inputConfirmacionPassword" placeholder="Confirme el Password" <?php if(isset($idUsuario)) echo $idUsuario != ''?' disabled':'';  ?>>
              </div>
              <div class   ="form-group">
                <label for   ="selectTipoUsuario">Tipo</label>
                <select name="selectTipoUsuario" id="selectTipoUsuario">
                  <option <?php if(isset($datosUsuario)) echo $datosUsuario['administradorGlobal']      ==1?  'selected="selected"':''; ?> value="0">Administrador Global</option>
                  <option <?php if(isset($datosUsuario)) echo $datosUsuario['administradorBancas']      ==1?  'selected="selected"':''; ?> value="1">Administrador de Banca</option>
                  <option <?php if(isset($datosUsuario)) echo $datosUsuario['administradorPuntoVentas'] ==1?  'selected="selected"':''; ?> value="2">Administrador de Punto de Ventas</option>
                  <option <?php if(isset($datosUsuario)) echo $datosUsuario['puntodeventa']             ==1?  'selected="selected"':''; ?> value="3">Punto de Ventas</option>
                </select>
              </div>   
              <div class   ="form-group">
                <label for   ="selectStatus">Estado</label>
                <select name="selectStatus" id="selectStatus">
                  <option <?php if(isset($datosUsuario)) echo $datosUsuario['status']      =='online'?  'selected="selected"':''; ?> value="online">Online</option>
                  <option <?php if(isset($datosUsuario)) echo $datosUsuario['status']      =='offline'?  'selected="selected"':''; ?> value="offline">Offline</option>
                  <option <?php if(isset($datosUsuario)) echo $datosUsuario['status']      =='bloqueado'?  'selected="selected"':''; ?> value="bloqueado">Bloqueado</option>                  
                </select>
              </div>     
              <button type ="submit" class="btn btn-default">Guardar</button>
            <?php echo form_close(); ?>
            <div class="contenedorError">
                <?php if( trim( validation_errors() ) != '' || isset($error) ){
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().(isset($error)?$error:'').'</div>';
                      }; 
                ?>
                
              </div>
          </div>
        </div>
      </div>      
    </div> 
    
    <!-- Jquery -->
    <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>    

    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>third_party/bootstrap/js/bootstrap.min.js"></script>
    <!-- JS principal -->
    <script src="<?php echo base_url(); ?>js/usuario/usuario.js"></script>
  </body>
</html>