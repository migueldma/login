<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>OD Login</title>
    
    <!-- CSS principal -->
    <link href="<?php echo base_url(); ?>css/login/login.css" rel="stylesheet">    
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>third_party/bootstrap/css/bootstrap.min.css" rel="stylesheet">    
  </head>
  <body>
    <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
            <div class="logincontenedor">              
              <?php echo form_open('login/index'); ?>
              <div class   ="form-group">
                <label for   ="inputUsuario">Usuario</label>
                <input type  ="user" class="form-control" name = "inputUsuario" id="inputUsuario" placeholder="Usuario">
              </div>
              <div class   ="form-group">
                <label for   ="inputPassword">Password</label>
                <input type  ="password" class="form-control" name = "inputPassword" id="inputPassword" placeholder="Password">
              </div>        
              <button type ="submit" class="btn btn-default">Entrar</button>
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
    <script src="<?php echo base_url(); ?>js/login/login.js"></script>
  </body>
</html>