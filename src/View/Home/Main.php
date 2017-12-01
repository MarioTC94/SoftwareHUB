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
            <?php include_once('Template/navmain.php') ?>
         </div>
      </header>
      <div class="row">
            <div class="col-md-6">
                  <label class="text-left"></label>
            </div>
            <div class="col-md-6">
                  <select name="" id=""></select>
            </div>
      </div>
   </body>
   <?= $Html::script(['jquery.min', 'bootstrap.min', 'scripts']); ?>
   </html>