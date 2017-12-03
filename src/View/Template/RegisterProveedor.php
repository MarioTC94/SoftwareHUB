<div class="modal fade" id="RegisterModalProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Registrar Proveedor</h2>
      </div>
      <div class="modal-body">
            <div class="container-fluid row">
                <div class="col-md-12">
                    <form id="FormRegisterProveedor" method="POST" class="form-horizontal" >
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" name="NombreEmpresa" class="form-control" id="txtNombreEmpresa"  placeholder="Nombre Proveedor.."/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" name="Correo" class="form-control" id="txtCorreo"  placeholder="Correo del Proveedor.."/>
                                </div>         
                                     <div class="col-sm-6">
                                    <input type="password" name="Contrasena" class="form-control" id="txtContrasena"  placeholder="Contraseña del Proveedor.."/>
                                </div>
                            </div>                         
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" name="NombrePersonaContacto" class="form-control" id="txtNombrePersonaContacto" placeholder="Persona de Contacto.."/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="EmailPersonaContacto" class="form-control" id="txtEmailPersonaContacto"  placeholder="Email de la Persona de Contacto.."/>
                                    </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="URL" class="form-control" id="txtNombrePersonaContacto" placeholder="Página WEB del Proveedor.."/>
                                </div>                                             
                        </div>
                    </form>
                </div>
            </div>
      </div>
      <div id="FooterRegister" class="modal-footer row">
          <div class="col-md-8" id="ErrorProveedor"></div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary" id="btnSubmitRegister" form="FormRegisterProveedor" >¡Registrar Proveedor!</button>                 
          </div>
       
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>