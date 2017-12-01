<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h2 class="modal-title" id="myModalLabel">Inicia Sesión</h2>
  </div>
  <div class="modal-body">
        <div class="container-fluid row">
            <div class="col-md-12">
                <form method="POST" action="<?= $Url::toAction("Login", "Validate") ?>" class="form-horizontal" >
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" name="Correo Electrónico" class="form-control user" id="txtUsuario"  placeholder="Correo Electrónico.."/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="password" name="pass" class="form-control password" id="txtContraseña"  placeholder="Contraseña.."/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 contenedor-boton">
                            <button type="submit" class="btn btn-primary" id="btnSubmit" >Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  </div>
  <!--<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>-->
</div>
</div>
</div>