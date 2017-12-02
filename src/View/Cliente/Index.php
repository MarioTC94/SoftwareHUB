<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>SoftwareHUB - Menú Principal</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins|Raleway" rel="stylesheet">
      <?= $Html::linkIcon('Logo.ico'); ?>
      <?= $Html::css(['bootstrap.min', 'bootstrap-social', 'font-awesome.min', 'main']); ?>
   </head>
   <body>
   <header>
         <div class="row">
            <?php include_once('Template/navClientes.php') ?>
         </div>
      </header>
      <div class="content container">
            <div class="incident">
                  <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                              <!-- Inicio del Panel -->
                        <div class="panel panel-primary panel-collapsable panel-chart">
                                    <div class="panel-heading">
                                          <div class="btn-group">
                                                <button class="btn btn-primary toggle-dropdown" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"> <span class="glyphicon glyphicon-cog"></span>
                                          </button>
                                          <ul class="dropdown-menu dropdown-menu-right">
                                          <li><a href="#">Detalle Incidente</a>
                                          </li>
                                          <li><a href="#">Responder Incidente</a>
                                          </li>
                                          </ul>
                                          </div>
                                          <h4 data-toggle="collapse" data-target="#sg1" aria-expanded="true">Ultimos Incidentes Creados <span class="label label-danger">Critico</span> </h4>

                                          <div class="clearfix"></div>
                                          </div>
                                    <div id="sg1" class="panel-body collapse in" aria-expanded="true">Text text text text text text text text text text text. Text text text text text text text text text text text. Text text text text text text text text text text text.
                              <br>Text text text text text text text text text text text. Text text text text text text text text text text text.</div>
                        </div>
                        <!-- Fin del Panel -->
                   </div>
            <div class="col-lg-2"></div>
      </div>
 </div>
      </div>
   </body>
   <?= $Html::script(['jquery.min', 'bootstrap.min', 'scripts', 'preload']); ?>
   </html>