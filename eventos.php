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
                <h1>Eventos</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a>Gestión de datos</a></li>
                    <li class="active">Eventos</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3 md p-20">
    <div class="col-12  m-t-3">
        <h4 class="text-black">Listado</h4>
        <div class="table-responsive">
            <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo Evento</a>
            <table id="tbl_evento" class="table table-bordered table-hover" data-name="cool-table">
            <thead>
                <tr>
                <th>No.</th>
                <th>Evento epidemiológico</th>
                <th>Nivel de alerta</th>
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
              <input type="hidden" id="txtCodEvento" name="txtCodEvento">
              <h4 class="modal-title"><strong>Editar Evento</strong></h4>
          </div>
          <div class="modal-body">
              <!-- BEGIN FORM-->
              <form id="frmEditar" method="POST" class="form-horizontal">
                  <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Nombre Evento
                                <span class="required">
                                        *
                                </span>
                            </label>
                            <input type="text" name="txtNombreEvento" id="txtNombreEvento" class="form-control"  required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Genera alerta
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <select id="sAlerta" name="sAlerta" class="form-control">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="3">Sí</option>
                                <option value="1">No</option>
                            </select>
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
                <h4 class="modal-title"><strong>Nuevo Evento</strong></h4>
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
                            <input type="text" name="ntxtNombreEvento" id="ntxtNombreEvento" class="form-control" required="true" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="control-label ">Genera alerta
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <select id="nsAlerta" name="nsAlerta" class="form-control">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="3">Sí</option>
                                <option value="1">No</option>
                            </select>
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

        floadEvento();

    });


    function floadEvento(){
        $('#tbl_evento').dataTable({
            ajax : "<?php url('Lopersa/loadEventosTable'); ?>",
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
                { "orderable": false },//column 5
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
    function fmodalEditar(cod, nombre, nivelalerta, estado){
        $("#txtCodEvento").val(cod);
        $("#txtNombreEvento").val(nombre);
        $("#sAlerta").val(nivelalerta);
        $("#estado").val(estado);
        $("#mEditar").modal('show');
    }

    function fEditarItem(){
        var txtCodEvento = $("#txtCodEvento").val();
        var txtNombreEvento = $("#txtNombreEvento").val();
        var sAlerta = $("#sAlerta").val();
        var estado = $("#estado").val();

        if($.trim(txtNombreEvento) == ''){
            toastr.error('Por favor, ingrese nombre del Evento.');
            $("#txtNombreEvento").focus();

        }
        else if($.trim(sAlerta) == ''){
            toastr.error('Por favor, seleccione Genera de alerta.');
            $("#sAlerta").focus();
        }
        else if($.trim(estado) == ''){
            toastr.error('Por favor, seleccione estado de Evento.');
            $("#estado").focus();

        }else{

            $.ajax({
                url : "<?php url('Lopersa/editItemEvento'); ?>",
                type : "POST",
                data : {
                    'codevento' : txtCodEvento,
                    'nombreevento' : txtNombreEvento,
                    'nivelalerta' : sAlerta,
                    'estadoevento' : estado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();
                        
                        $("#mEditar").modal('hide');
                        $('#tbl_evento').DataTable().ajax.reload();

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
        var ntxtNombreEvento = $("#ntxtNombreEvento").val();
        var nsAlerta = $("#nsAlerta").val();
        var nestado = $("#nestado").val();

        if($.trim(ntxtNombreEvento) == ''){
            toastr.error('Por favor, ingrese Nombre de Evento.');
            $("#ntxtNombreEvento").focus();

        }
        else if($.trim(nsAlerta) == ''){
            toastr.error('Por favor, seleccione Genera de alerta.');
            $("#nsAlerta").focus();
        }
        else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado de Evento.');
            $("#nestado").focus();

        }else{

            $.ajax({
                url : "<?php url('Lopersa/insertItemEvento'); ?>",
                type : "POST",
                data : {
                    'nombreevento' : ntxtNombreEvento,
                    'nivelalerta' : nsAlerta,
                    'estadoevento' : nestado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        $("#mNuevo").modal('hide');
                        $('#tbl_evento').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }


    function buscar(){
        var nombre_rol = $("#bNombreEvento").val();
        
        var url = "<?php url('Lopersa/buscarPerfil'); ?>?nombre_perfil="+nombre_perfil;
        $('#tbl_evento').DataTable().ajax.url( url ).load();

    }

    $("#frmBusqueda").submit(function( event ) {
        event.preventDefault();
        buscar();
    })


</script>