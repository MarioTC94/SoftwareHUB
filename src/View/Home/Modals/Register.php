<div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Registrarse</h2>
      </div>
      <div class="modal-body">
            <div class="container-fluid row">
                <div class="col-md-12">
                    <form id ="FormRegister" method="POST" action="<?= $Url::toAction("Login", "Validate") ?>" class="form-horizontal" >
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="Nombre" class="form-control" id="txtNombre"  placeholder="Nombre.."/>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="Nombre Usuario" class="form-control" id="txtNombreUsuario"  placeholder="Nombre Usuario.."/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="Apellido" class="form-control" id="txtApellido"  placeholder="Apellido.."/>
                            </div>
                            <div class="col-sm-6">
                                <input type="date" name="FechaNac" class="form-control" id="txtFechaNac"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <select name="Rol" class="form-control" id="CBRol">
                             <option value="1">Cliente</option>  
                            </select>
                            </div>
                            <div class="col-sm-6">
                            <input type="email" name="email" class="form-control" id="txtEmail"  placeholder="Correo@Ejemplo.com"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="Contraseña" name="pass" class="form-control password" id="txtContraseña"  placeholder="Contraseña.."/>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="Confirmar Contraseña" class="form-control password" id="txtConfirmarContraseña"  placeholder="Confirmar Contraseña.."/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
      <div id="FooterRegister" class="modal-footer">
        <button class="btn btn-default" id="btnSalir">¡Salir!</button>
        <button type="submit" class="btn btn-primary" id="btnSubmit" form="FormRegister" >¡Registrarse!</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>