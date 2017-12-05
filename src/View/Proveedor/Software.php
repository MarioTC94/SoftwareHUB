<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>SoftwareHUB-Detalles</title>
   <link href="https://fonts.googleapis.com/css?family=Poppins|Raleway" rel="stylesheet">
   <?= $Html::linkIcon('Logo.ico'); ?>
      <?= $Html::css(['bootstrap.min', 'bootstrap-social', 'font-awesome.min', 'panelsSoftware', 'main', 'preload']); ?>
</head>

<body>
   <div class="content-body">
   <?php include_once(HTML_DIR . 'Template/CrearSoftware.php') ?>
   <header>
         <div class="row">
            <?php include_once(HTML_DIR . 'Template/navProveedor.php') ?>
         </div>
      </header>
      <div class="content container">
         <div class="container">
            <div class="row">

               <?php foreach ($model['Software'] as $soft) { ?>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="box">
                        <div class="box-icon">
                           <span class="fa fa-4x fa-code"></span>
                        </div>
                        <div class="info">
                           <h4 class="text-center"><?= $soft['NombreSoftware'] ?> con <?= $soft['CantIncidentes'] ?> incidentes </h4>
                           <p><?= $soft['DescripcionSoftware'] ?></p>
                        </div>
                     </div>
                  </div>
              <?php 
            } ?>
            </div>
         </div>
      </div>
   </div>
   <?php include_once(HTML_DIR . 'Template/footer.php'); ?>
   <?= $Html::script(['jquery.min', 'bootstrap.min', 'jquery.match', 'ajax', 'preload']); ?>
</body>

</html>