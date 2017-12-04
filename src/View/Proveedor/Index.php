<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>SoftwareHUB - Menú Principal</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins|Raleway" rel="stylesheet">
      <?= $Html::linkIcon('Logo.ico'); ?>
      <?= $Html::css(['bootstrap.min', 'bootstrap-social', 'font-awesome.min', 'main', 'preload']); ?>
   </head>
   <body>
            <?php include_once(HTML_DIR . 'Template/CrearSoftware.php') ?>
   <header>
         <div class="row">
            <?php include_once(HTML_DIR . 'Template/navProveedor.php') ?>
         </div>
      </header>
      <div class="content container">
            <div class="incident">
                  <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                              <!-- Inicio del Panel -->
                              <?php foreach ($model['Incidentes'] as $Incidente) { ?>
                                    <div class="panel panel-primary panel-collapsable panel-chart">
                                    <div class="panel-heading">
                                          <div class="btn-group text-right">
                                                <button class="btn btn-primary toggle-dropdown" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-cog"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                      <li><a href="<?= $Url::toAction('Proveedor', 'Detalles', $Incidente['PK_IDIncidente']); ?>">Detalle Incidente</a></li>
                                                </ul>
                                          </div>
                                          <h4 class="collapsed" data-toggle="collapse" data-target="#sg<?= $Incidente['PK_IDIncidente'] ?>" aria-expanded="false"><?= $Incidente['NombreIncidente'] ?><div class="states"><span class="label <?= $Incidente['LabelTipoIncidente'] . ' ">' . $Incidente['DescripcionTipoIncidente'] ?></span><span class="label  <?= $Incidente['LabelEstadoIncidente'] . ' ">' . $Incidente['DescripcionEstadoIncidente'] ?></span></div></h4>
                                          <div class="clearfix"></div>
                                    </div>
                                    <div id="sg<?= $Incidente['PK_IDIncidente'] ?>" class="panel-body collapse" aria-expanded="true"><p><?= $Incidente['DescripcionIncidente'] ?></p></div>
                              </div>
      
                              <?php 
                        } ?>
                              <!-- Fin del Panel -->
                   </div>
      </div>
 </div>
      </div>
   </body>
   <?= $Html::script(['jquery.min', 'bootstrap.min', 'ajax', 'preload']); ?>
   </html>