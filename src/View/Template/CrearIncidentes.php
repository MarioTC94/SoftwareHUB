<div class="modal fade" id="CreateIncident" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="myModalLabel">Crear Incidente</h2>
        </div>
		<div class="modal-body">
            <div class="container-fluid row">
                <div class="col-md-12">
                    <form id="CreateIncident" method="POST" class="form-horizontal" >
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="NombreIncidente" class="form-control" id="txtNombre"  placeholder="Nombre Incidente.."/>
                            </div>
                            <div class="col-sm-6">
                                <select name="TipoIncidente" class="form-control" id="CBTipoIncidente">
                                        <?php 
                                        foreach ($model['TipoIncidente'] as $value) {
                                            echo '<option value="' . $value['PK_IDTipoIncidente'] . '">' . $value['DescripcionTipoIncidente'] . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="DescripcionIncidente" class="form-control" id="txtDescripcionIncidente" placeholder="Descripcion del Incidente"/>
                            </div>
                            <div class="col-sm-6">
                                <select name="Software" class="form-control" id="CBSoftware">
                                    <?php 
                                    foreach ($model['Software'] as $value) {
                                        echo '<option value="' . $value['PK_IDSoftware'] . '">' . $value['NombreSoftware'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class = "form-group row">
                            <div class = "col-sm-6">
                                <input type="text" name="Estado " class="form-control" id="txtEstado" placeholder="Estado del Incidente"/>
                            </div>
                            <div class ="col-sm-6">
                                <input type="text" name="Software" class="form-control" id="txtSoftware" placeholder="Software"/>
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
      </div>
                    <div id="FooterRegister" class="modal-footer row">
                        <div class="col-md-8"  style="margin: 0"  id="ErrorIncidente"></div>
                        <div class="col-md-4 text-center">
                            <input type="submit" class="btn btn-primary" style="margin: 10px 0" id="btnGuardarIncidente" form="CreateIncident" value="Guardar"/>
                        </div>
                </div>
        </div>
    </div>
</div>