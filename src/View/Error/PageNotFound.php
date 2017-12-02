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
    <?php include_once(HTML_DIR . 'Template/Login.php'); ?>
    <?php include_once(HTML_DIR . 'Template/Register.php'); ?>
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
                <?php include_once(HTML_DIR . 'Template/nav.php') ?>
        </div>
    </header>
    <div class="paralax">
        <div class="opacity">
        <h2>Error404 <span>Página no encontrada</span></h2>
        </div>
    </div>
    <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copy">
                        <span>SoftwareHUB - COPYRIGHT &#169 <?= date("Y"); ?> All Rights Reserved </span>
                        <h3>Contacto</h3>
                        <p>Correo electrónico: admin@SoftwareHUB.com</p>
                        <p>Teléfono: 2348-5784</p>
                    </div>
                    <div class="col-md-6 text-right social">
                        <p>Búscanos en: </p>
                        <a href="#" class="facebook"><span class="icon-facebook"></span></a>
                        <a href="#" class="twitter"><span class="icon-twitter"></span></a>
                        <a href="#" class="instagram"><span class="icon-instagram"></span></a>
                    </div>
                </div>  
            </div>
        </footer>   
        <?= $Html::script(['jquery.min', 'bootstrap.min', 'indexEfects', 'scripts', 'preload']); ?>
    </body>
</html>
