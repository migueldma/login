<?php date_default_timezone_set('America/Santo_Domingo'); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Aplicaci&oacute;n de Apuestas</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>third_party/bootstrap_principal/stylesheets/styles.css">
</head>
<body>
    <header>
        <div class="row">
            <div class="col-md-12">
                <div class="header-content text-right">
                    <p><?php echo sprintf('%s %d de %s de %d - %s', $this->comunes_lib->getDaySpanish(date('l')), date('d'), $this->comunes_lib->getMonthSpanish(date('F')), date('Y'), date('H:iA'));?></p>
                    <p>Bienvenido de vuelta "<?php echo $this->session->userdata('usuario'); ?>" <a href="<?php echo base_url(); ?>index.php/principal/">Principal</a>&nbsp<a href="<?php echo base_url(); ?>index.php/usuario/ver_usuarios">Usuarios</a>&nbsp;<a href="<?php echo base_url(); ?>index.php/login/salir">Salir</a></p>
                </div>
            </div>
        </div>
    </header>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>