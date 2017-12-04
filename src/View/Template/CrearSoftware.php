<div class="modal fade" id="CreateSoftware" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content" id="ModalHideCreareSoftware">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="myModalLabel">Crear Software</h2>
         </div>
                     <div class="modal-body">
                           <div class="container-fluid row">
                              <div class="col-md-12">
                                 <form id="CreateSoftwareForm" method="POST" class="form-horizontal" >
                                       <div class="form-group row">
                                          <div class="col-sm-6">
                                             <input type="text" name="NombreSoftware" class="form-control" id="txtNombreSoftware"  placeholder="Nombre Software.."/>
                                          </div>
                                          <div class="col-sm-6">
                                             <select name="TipoSoftware" class="form-control" id="CBTipoSoftware">
                                                      <?php 
                                                        foreach ($model['TipoSoftware'] as $value) {
                                                            echo '<option value="' . $value['PK_IDTipoSoftware'] . '">' . $value['DescripcionTipoSoftware'] . '</option>';
                                                        } ?>
                                             </select>
                                          </div>
                                          </div>
                                          <div class="form-group row">
                                          <div class="col-sm-12">
                                             <input type="text" name="DescripcionSoftware" class="form-control" id="txtDescripcionSoftware"  placeholder="Descripción del Software.."/>
                                          </div>
                                       </div>              
                                 </form>
                              </div>
                           </div>
                     </div>
                   <div id="FooterRegister" class="modal-footer row">
                        <div class="col-md-9" style="margin: 0" id="ErrorSoftware"></div>
                        <div class="col-md-3 text-center">
                            <input type="submit" class="btn btn-primary" style="margin: 10px 0" id="btnGuardarSoftware" form="CreateSoftwareForm" value="Guardar"/>               
                        </div>
                </div>
        </div>
    </div>
</div>