<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta lang="es"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title>SoftwareHUB - Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Raleway" rel="stylesheet">
    <?= $Html::linkIcon('Logo.ico'); ?>
	<?= $Html::css(['bootstrap.min', 'bootstrap-social', 'font-awesome.min', 'main', 'preload']); ?>
</head>
<body>
    <?php include_once(HTML_DIR . 'Template/Login.php'); ?>
    <?php include_once(HTML_DIR . 'Template/RegisterCliente.php'); ?>
    <?php include_once(HTML_DIR . 'Template/RegisterProveedor.php'); ?>
    <div class="preload">
        <div class="logo">
            <h2>Cargando.. <span>Espere</span></h2>
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
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <?= $Html::img("img1.jpeg"); ?>
    </div>
    <div class="item">
        <?= $Html::img("img2.jpg"); ?>
    </div>
    <div class="item">
        <?= $Html::img("img3.jpeg"); ?>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <?php include_once(HTML_DIR . 'Template/footer.php'); ?>
        <?= $Html::script(['jquery.min', 'bootstrap.min', 'indexEfects', 'ajax', 'preload']); ?>
    </body>
</html>
