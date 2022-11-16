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
                <h1>Barrios</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Gestionar datos</a></li>
                    <li class="active">Barrios</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3 md p-20">
    <div class="col-12  m-t-3">
        <h4 class="text-black">Listado</h4>
        <div class="table-responsive">
            <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo Barrio</a>
            <table id="tbl_barrio" class="table table-bordered table-hover" data-name="cool-table">
                <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nombre Barrio</th>
                    <th>Sector</th>
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
                <input type="hidden" id="txtCodBarrio" name="txtCodBarrio">
                <h4 class="modal-title"><strong>Editar Barrio</strong></h4>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <form id="frmEditar" method="POST" class="form-horizontal">
                    <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Nombre
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="txtNombreBarrio" id="txtNombreBarrio" class="form-control"  required="true" />
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label class="control-label">Sector
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <select id="sSector" name="sSector" class="form-control">
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
                <h4 class="modal-title"><strong>Nuevo Barrio</strong></h4>
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
                            <input type="text" name="ntxtNombreBarrio" id="ntxtNombreBarrio" class="form-control" required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label">Sector
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <select id="nsSector" name="nsSector" class="form-control">
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
        // combobox('bRol','developer/Lopersa/loadRol','Todos');
        combobox('sSector',"<?php url('Lopersa/sloadSectores'); ?>",'Seleccione...');
        combobox('nsSector',"<?php url('Lopersa/sloadSectores'); ?>",'Seleccione...');
        
        floadBarrios();

        //---------------
    });

    function floadBarrios(){
        $('#tbl_barrio').dataTable({
            ajax : "<?php url('Lopersa/loadBarriosTable'); ?>",
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
    function fmodalEditar(cod, nombre, codsector, estado){
        $("#txtCodBarrio").val(cod);
        $("#txtNombreBarrio").val(nombre);
        $("#sSector").val(codsector);
        $("#estado").val(estado);
        $("#mEditar").modal('show');
    }

    function fEditarItem(){
            var txtCodBarrio = $("#txtCodBarrio").val();
            var txtNombreBarrio = $("#txtNombreBarrio").val();
            var sSector = $("#sSector").val();
            var estado = $("#estado").val();

            if($.trim(txtNombreBarrio) == ''){
                toastr.error('Por favor, ingrese nombre de Barrio.');
                $("#txtNombreBarrio").focus();
            }
            else if($.trim(sSector) == ''){
                toastr.error('Por favor, seleccione Sector.');
                $("#sSector").focus();
            }
            else if($.trim(estado) == ''){
                toastr.error('Por favor, seleccione estado de Barrio.');
                $("#estado").focus();
            }else{

                $.ajax({
                    url : "<?php url('Lopersa/editItemBarrio'); ?>",
                    type : "POST",
                    data : {
                        'codbarrio':txtCodBarrio,
                        'nombreba' : txtNombreBarrio,
                        'codsec' : sSector,
                        'estadoba' : estado
                    },
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            toastr.success("Item Actualizado exitosamente");
                            $("#frmEditar")[0].reset();
                            
                            $("#mEditar").modal('hide');
                            $('#tbl_barrio').DataTable().ajax.reload();
                        
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
        var ntxtNombreBarrio = $("#ntxtNombreBarrio").val();
        var nsSector = $("#nsSector").val();
        var nestado = $("#nestado").val();

        if($.trim(ntxtNombreBarrio) == ''){
            toastr.error('Por favor, ingrese Nombre de Barrio.');
            $("#ntxtNombreBarrio").focus();

        }else if($.trim(nsSector) == ''){
            toastr.error('Por favor, seleccione Sector.');
            $("#nsSector").focus();
        }
        else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado de Barrio.');
            $("#nestado").focus();
        }else{

            $.ajax({
                url : "<?php url('Lopersa/insertItemBarrio'); ?>",
                type : "POST",
                data : {
                    'nombreba' : ntxtNombreBarrio,
                    'codsec': nsSector,             
                    'estadoba' : nestado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        $("#mNuevo").modal('hide');
                        $('#tbl_barrio').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }


</script>