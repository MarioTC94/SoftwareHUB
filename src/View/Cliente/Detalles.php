<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>SoftwareHUB-Detalles</title>
   <link href="https://fonts.googleapis.com/css?family=Poppins|Raleway" rel="stylesheet">
   <?= $Html::linkIcon('Logo.ico'); ?>
      <?= $Html::css(['bootstrap.min', 'bootstrap-social', 'font-awesome.min', 'detail', 'main', 'preload']); ?>
</head>

<body>
    <div class="content-body">
    <?php include_once(HTML_DIR . 'Template/CrearIncidentes.php') ?>
   <header>
      <div class="row">
         <?php include_once(HTML_DIR . 'Template/navClientes.php') ?>
      </div>
   </header>
   <div class="content container">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header"><?= $model['Incidente']['NombreIncidente'] ?></h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-8">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-3">
                              <i class="fa fa-cutlery fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                           </div>
                        </div>
                     </div>
                        <div class="panel-footer">
                           <div class="clearfix"></div>
                           <div class="text-primary">Software: <?= $model['Incidente']['NombreSoftware'] ?></div>
                        </div>

                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="panel panel-green">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-3">
                              <i class="fa fa-tasks fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                           </div>
                        </div>
                     </div>
                     
                        <div class="panel-footer">
                           <div class="clearfix"></div>
                           <div class="text-green">Tipo: <?= $model['Incidente']['DescripcionTipoIncidente'] ?></div>
                        </div>

                  </div>
               </div>
               <div class="col-lg-4 col-md-12">
                  <div class="panel panel-yellow">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-3">
                              <i class="fa fa-shopping-cart fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                           </div>
                        </div>
                     </div>
                     
                        <div class="panel-footer">
                           <div class="clearfix"></div>
                           <div class="text-yellow">Estado: <?= $model['Incidente']['DescripcionEstadoIncidente'] ?></div>
                        </div>

                  </div>
               </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                           Descripción del Incidente
                        </div>
                        <div class="panel-body">
                            <p><?= $model['Incidente']['DescripcionIncidente'] ?></p>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-md-4">
         <div class="chat-panel panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Comentarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id=panelcomentario>
                         <!--  <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img class="img-circle" alt="User Avatar" src="http://placehold.it/50/55C1E7/fff">
                                    </span>

                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img class="img-circle" alt="User Avatar" src="http://placehold.it/50/FA6F57/fff">
                                    </span>

                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago
                                            </small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img class="img-circle" alt="User Avatar" src="http://placehold.it/50/55C1E7/fff">
                                    </span>

                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img class="img-circle" alt="User Avatar" src="http://placehold.it/50/FA6F57/fff">
                                    </span>

                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago
                                            </small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>-->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <form id="FormChat">
                                    <input type="hidden" name="IDIncidente" value="<?= $model['Incidente']['PK_IDIncidente'] ?>">
                                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here...">
                                </form>
                                    <span class="input-group-btn">
                                        <button type="submit" form="#FormChat" class="btn btn-primary btn-sm" id="btn-chat">
                                            Send
                                        </button>
                                    </span>
                            </div>
                        </div>
                    </div>
         </div>
      </div>
   </div>
    </div>
    <?php include_once(HTML_DIR . 'Template/footer.php'); ?>
   <?= $Html::script(['jquery.min', 'bootstrap.min', 'ajax', 'preload']); ?>
</body>
</html>