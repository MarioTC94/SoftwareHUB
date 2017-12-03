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
      <?php include_once(HTML_DIR . 'Template/CrearIncidentes.php') ?>
   <header>
         <div class="row">
            <?php include_once(HTML_DIR . 'Template/navClientes.php') ?>
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
                                    <div class="btn-group text-right">
                                          <button class="btn btn-primary toggle-dropdown" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-cog"></span></button>
                                          <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#">Detalle Incidente</a></li>
                                                <li><a href="#">Responder Incidente</a></li>
                                          </ul>
                                    </div>
                                    <h4 class="collapsed" data-toggle="collapse" data-target="#sg1" aria-expanded="false">Ultimos Incidentes Creados<div class="states"><span class="label label-danger">Critico</span><span class="label label-success">En Proceso</span></div></h4>
                                    <div class="clearfix"></div>
                              </div>
                              <div id="sg1" class="panel-body collapse" aria-expanded="true"><p>Javascript does not have multiline strings in the way you are writing them, you can't just open a string on one line, go down a few lines and then close it. (there are some ways of doing multi-line strings in JS, but they are kind of backwards).</p></div>
                        </div>
                        <!-- Fin del Panel -->
                   </div>
            <div class="col-lg-2"></div>
      </div>
 </div>
      </div>
   </body>
   <?= $Html::script(['jquery.min', 'bootstrap.min', 'ajax', 'preload']); ?>
   </html>