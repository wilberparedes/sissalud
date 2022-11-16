<?php
  include 'developer/var.php';
?>
<style>
    td > a, .table-responsive > a   {
        color: #fff !important  ;
    }
</style>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Sectores</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a>Gestión de datos</a></li>
                    <li class="active">Sectores</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3 md p-20">
    <div class="col-12  m-t-3">
        <h4 class="text-black">Listado</h4>
        <div class="table-responsive">
            <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo Sector</a>
            <table id="tbl_sector" class="table table-bordered table-hover" data-name="cool-table">
            <thead>
                <tr>
                <th>No.</th>
                <th>Nombre Sector</th>
                <th>Estado</th>
                <th>Acciones</th>
                </tr>
            </thead>
            </table>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="mEditar" tabindex="-1" role="dialog" aria-labelledby="mEditar" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <input type="hidden" id="txtCodSector" name="txtCodSector">
              <h4 class="modal-title"><strong>Editar Sector</strong></h4>
          </div>
          <div class="modal-body">
              <!-- BEGIN FORM-->
              <form id="frmEditar" method="POST" class="form-horizontal">
                  <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Nombre Sector
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="txtNombreSector" id="txtNombreSector" class="form-control"  required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Estado
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <select id="estado" name="estado" class="form-control">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="on">Habilitado</option>
                                <option value="off">Inhabilitado</option>
                            </select>
                        </div>
                  </div>
              </form>
              <!-- END FORM-->
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success" onclick="fEditarItem();">Guardar cambios</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="mNuevo" tabindex="-1" role="dialog" aria-labelledby="mNuevo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Nuevo Sector</strong></h4>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <form id="frmNuevo" method="POST" class="form-horizontal">
                    <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label">Nombre
                                <span class="required">
                                      *
                                </span>
                            </label>
                            <input type="text" name="ntxtNombreSector" id="ntxtNombreSector" class="form-control" required="true" />
                        </div>

                        <div class="form-group col-lg-12">
                          <label class="control-label">Estado
                            <span class="required">
                              *
                            </span>
                          </label>
                          <select id="nestado" name="nestado" class="form-control">
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="on">Habilitado</option>
                            <option value="off">Inhabilitado</option>
                          </select>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="fNuevoItem();">Guardar item</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODALS -->


<script>


    $(function(){
        $("#frmEditar").submit(function( event ) {
            event.preventDefault();
            fEditarItem();
        });
        $("#frmNuevo").submit(function( event ) {
            event.preventDefault();
            fNuevoItem();
        });

        floadSector();

    });


    function floadSector(){
        $('#tbl_sector').dataTable({
            ajax : "<?php url('Lopersa/loadSectoresTable'); ?>",
            "aoColumnDefs" : [{
                "aTargets" : [0]
            }],
            "oLanguage" : {
                "sLengthMenu" : "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "No hay Datos registrados en el sistema",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _MAX_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sLoadingRecords": "Cargando Datos...",
                "sSearch" : "",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
            },
            "searching": true,
            "aaSorting" : [[0, 'desc']],
            "aLengthMenu" : [
                [10, 15, 20, -1], 
                [10, 15, 20, "Todos"] // change per page values here
            ],
            "columns": [ //agregar configuraciones a cada una de las columnas de las tablas
                {},//column 1
                { "class": "text-center", "orderable": false },//column 2
                { "orderable": false },//column 3
                { "class": "text-center", "orderable": false }//column 6
                
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
            },
            "iDisplayLength" : 10,
            'autoWidth'   : false
        });
    }

    //functions update item
    function fmodalEditar(cod, nombre, estado){
        $("#txtCodSector").val(cod);
        $("#txtNombreSector").val(nombre);
        $("#estado").val(estado);
        $("#mEditar").modal('show');
    }

    function fEditarItem(){
        var txtCodSector = $("#txtCodSector").val();
        var txtNombreSector = $("#txtNombreSector").val();
        var estado = $("#estado").val();

        if($.trim(txtNombreSector) == ''){
            toastr.error('Por favor, ingrese nombre de Sector.');
            $("#txtNombreSector").focus();
        }
        else if($.trim(estado) == ''){
            toastr.error('Por favor, seleccione estado de Sector.');
            $("#estado").focus();

        }else{

            $.ajax({
                url : "<?php url('Lopersa/editItemSector'); ?>",
                type : "POST",
                data : {
                    'codsec' : txtCodSector,
                    'nombresec' : txtNombreSector,
                    'estadosec' : estado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();
                        
                        $("#mEditar").modal('hide');
                        $('#tbl_sector').DataTable().ajax.reload();

                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }
    }


    //functions new item
    function fmodalNuevo(){
        $("#mNuevo").modal('show');
    }

    function fNuevoItem(){
        var ntxtNombreSector = $("#ntxtNombreSector").val();
        var nestado = $("#nestado").val();

        if($.trim(ntxtNombreSector) == ''){
            toastr.error('Por favor, ingrese Nombre de Sector.');
            $("#ntxtNombreSector").focus();
        }
        else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado de Sector.');
            $("#nestado").focus();
        }else{

            $.ajax({
                url : "<?php url('Lopersa/insertItemSector'); ?>",
                type : "POST",
                data : {
                    'nombresec' : ntxtNombreSector,
                    'estadosec' : nestado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        $("#mNuevo").modal('hide');
                        $('#tbl_sector').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }
    }


</script>