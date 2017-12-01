<nav class="navbar navbar-default">
   <div class="container contenedor-navbar">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
               <span class="sr-only">Alternar Menu</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
         </button>
         <a href="<?= $this->Url->toAction('Home', 'Index') ?>" class="navbar-brand">
               <?= $this->Html->img('Logo.png', 'icon'); ?><h1>Software<span>HUB</span></h1>
         </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar1">
         <ul class="nav navbar-nav">
            <li class=""><a href="<?php $this->Url->toAction('Home', 'Index') ?>">Inicio</a></li>
            <li class=""><a href="#" data-toggle="modal" data-target="#LoginModal">Ingresar</a></li>
            <li class=""><a href="#" data-toggle="modal" data-target="#RegisterModal">Registrarse</a></li>   
         </ul>
      </div>
   </div>
</nav>