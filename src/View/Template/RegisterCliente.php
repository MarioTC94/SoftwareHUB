<div class="modal fade" id="RegisterModalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Registrar Cliente</h2>
      </div>
      <div class="modal-body">
            <div class="container-fluid row">
                <div class="col-md-12">
                    <form id="FormRegisterCliente" method="POST" class="form-horizontal" >
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="Nombre" class="form-control" id="txtNombre"  placeholder="Nombre.."/>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-6">                 
                                <input type="text" name="Apellido" class="form-control" id="txtApellido"  placeholder="Apellido.."/>
                            </div>
                            <div class="col-sm-6">
                                <input type="date" name="FechaNacimiento" class="form-control" id="txtFechaNac"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <input type="text" name="NombreUsuario" class="form-control" id="txtNombreUsuario"  placeholder="Nombre Usuario.."/>
                                </div>
                            <div class="col-sm-6">
                            <input type="email" name="Correo" class="form-control" id="txtEmail"  placeholder="Correo@Ejemplo.com"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="password" name="Contrasena" class="form-control password" id="txtContraseña"  placeholder="Contraseña.."/>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="ConfirmarContraseña" class="form-control password" id="txtConfirmarContraseña"  placeholder="Confirmar Contraseña.."/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
      <div id="FooterRegister" class="modal-footer row">
          <div class="col-md-8" id="ErrorCliente"></div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary" id="btnSubmitRegister" form="FormRegisterCliente" >¡Registrar Cliente!</button>                 
          </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>