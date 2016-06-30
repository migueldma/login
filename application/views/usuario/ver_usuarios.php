<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Lista de Usuarios</title>
    
    <!-- CSS principal -->
    <link href="<?php echo base_url(); ?>css/usuario/ver_usuarios.css" rel="stylesheet">    
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>third_party/bootstrap/css/bootstrap.min.css" rel="stylesheet">    
  </head>
  <body>
    <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
            <div>
              <h1 class="h1Usuario">Lista de Usuarios</h1>
            </div>
            <div class="listaUsuariosContenedor">
              <div class="listaBotones">
                <button type="button" class="btn btn-default" id="crearUsuario">Crear Usuario</button>
              </div>
              <div class="table-responsive">
                <?php 
                  $template = array(
                          'table_open' => '<table class= "table table-bordered tableListaUsuarios">'
                  );

                  $this->table->set_template($template);
                  $this->table->set_heading('Usuario', 'Tipo', 'Estado','');
                  foreach ($usuarios as $usuario) {
                    $tipo = 'Adminstrador Global';
                    if($usuario['administradorBancas'] == 1){
                      $tipo ='Administrador de Bancas';
                    }
                    else if($usuario['administradorPuntoVentas'] == 1){
                      $tipo = 'Administradorde Punto de Ventas';
                    }
                    else if($usuario['puntodeventa'] == 1){
                      $tipo = 'Punto de Venta'; 
                    }

                    $link = "<a href='".base_url()."index.php/usuario/manejo_usuario/".$usuario['idUsuario']."'>".$usuario['usuario']."</a>";
                    $this->table->add_row($link, $tipo, $usuario['status'],'<button name="botonEliminar" idUsuario="'.$usuario['idUsuario'].'" type="button" class="btn btn-danger">Eliminar</button>');                    
                  }                  

                  echo $this->table->generate();
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
    <script>
        var base_url = "<?php echo base_url(); ?>";    
      
    </script>
    <script src="<?php echo base_url(); ?>js/usuario/ver_usuarios.js"></script>
  </body>
</html>