<div class = "model fade" id= "RegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Crear Incidente</h2>
</div>
		<div class="modal-body">
            <div class="container-fluid row">
                <div class="col-md-12">
                    <form id="Create Incident" method="POST" class="form-horizontal" >
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="Nombre_Incidente" class="form-control" id="txtNombre"  placeholder="Nombre.."/>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="Descripcion_Incidente" class="form-control" id="txtDescripcion"  placeholder="Descripcion.."/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="Estado_Incidente" class="form-control" id="txtNombreUsuario"  placeholder="Nombre Usuario.."/>
                            </div>
                            <div class="col-sm-6">
                                <input type="date" name="FechaNacimiento" class="form-control" id="txtFechaNac"/>
                            </div>
                        </div>