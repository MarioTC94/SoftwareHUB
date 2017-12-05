<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta lang="es"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title>SoftwareHUB - Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Raleway" rel="stylesheet">
    <?= $Html::linkIcon('Logo.ico'); ?>
	<?= $Html::css(['bootstrap.min', 'main', 'preload']); ?>
</head>
<body>

   <div class="content-body">
   <?php
    if (isset($_SESSION['UsuarioLogueado'])) {
        if ($_SESSION['UsuarioLogueado']['Rol'] == 'Cliente') {
            include_once(HTML_DIR . 'Template/CrearIncidentes.php');
        } else {
            include_once(HTML_DIR . 'Template/CrearSoftware.php');
        }
    } else {
        include_once(HTML_DIR . 'Template/Login.php');
        include_once(HTML_DIR . 'Template/RegisterCliente.php');
        include_once(HTML_DIR . 'Template/RegisterProveedor.php');
    }
    ?>
    <div class="preload">
        <div class="logo">
            <h2>Cargando... <span>Espere</span></h2>
        </div>
        <div class="loader-frame">
            <div class="loader1" id="loader1"></div>
            <div class="loader2" id="loader2"></div>    
        </div>
    </div>
    <header>
        <div class="row">
                    <?php
                    if (isset($_SESSION['UsuarioLogueado'])) {
                        if ($_SESSION['UsuarioLogueado']['Rol'] == 'Cliente') {
                            include_once(HTML_DIR . 'Template/navClientes.php');
                        } else {
                            include_once(HTML_DIR . 'Template/navProveedor.php');
                        }
                    } else {
                        include_once(HTML_DIR . 'Template/nav.php');
                    }
                    ?>
        </div>
    </header>
    <div class="paralax">
        <div class="opacity">
        <h2>Error404 <span>Página no encontrada</span></h2>
        </div>
    </div>
   </div>
   <?php include_once(HTML_DIR . 'Template/Login.php'); ?>
        <?= $Html::script(['jquery.min', 'bootstrap.min', 'indexEfects', 'scripts', 'preload']); ?>
    </body>
</html>
