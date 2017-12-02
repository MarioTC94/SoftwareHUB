<nav class="navbar navbar-default">
<div class="container contenedor-navbar">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
            <span class="sr-only">Alternar Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      </button>
      <a href="<?= $Url::toAction('Home', 'Index') ?>" class="navbar-brand">
               <?= $Html::img('Logo.png', 'icon'); ?><h1>Software<span>HUB</span></h1>
      </a>
   </div>
   <div class="collapse navbar-collapse" id="navbar1">
      <ul class="nav navbar-nav">
         <li class=""><a href="#">Ver Incidentes</a></li>
         <li class=""><a>Crear Producto Software</a></li>
         <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Servicios en línea <span class="caret"></span></a>
               <ul class="dropdown-menu">
                 <li><a id="btnLogin" href="">Mi Perfil</a></li>
                 <li><a id="btnLogout" href="<?= $Url::toAction('Cliente', 'LogOut'); ?>">Cerrar Sesión</a></li>
               </ul>
         </li>
    </ul>
 </div>
</div>
</nav>