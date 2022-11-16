<?php
  include 'developer/var.php';
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3 md p-20">

    <div class="row">
        <div class="col-sm-12 mb-4">
            <div class="card-group">
                <div class="card col-md-6 no-padding ">
                    <select style="display:none;" name="tipo" id="tipo">
                        <option value="todos" selected>todos</option>
                        <option value="abiertos">todos</option>
                        <option value="cerrados">todos</option>
                        <option value="eventos">eventos</option>
                        <option value="mayor">amyor</option>
                    </select>
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="countTotal"></span>
                        </div>

                        <small class="text-muted text-uppercase font-weight-bold">Casos totales</small> <br>
                        <small class="text-muted"><a style="cursor: pointer;" onclick="fSearch('todos');" >Ver detalles</a></small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-folder-open"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="countAbiertos"></span>
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Casos Abiertos</small> <br>
                        <small class="text-muted"><a style="cursor: pointer;" onclick="fSearch('abiertos');" >Ver detalles</a></small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-folder"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="countCerrados"></span>
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Casos cerrados</small> <br>
                        <small class="text-muted"><a style="cursor: pointer;" onclick="fSearch('cerrados');" >Ver detalles</a></small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-warning"></i>
                        </div>
                        <div class="h4 mb-0">
                            <span class="countEventosPri"></span>
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Eventos 345, 346, 348</small> <br>
                        <small class="text-muted"><a style="cursor: pointer;" onclick="fSearch('eventos');" >Ver detalles</a></small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
                <div class="card col-md-6 no-padding ">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <div class="h4 mb-0 "><span class="countPruebaMayor"></span></div>
                        <small class="text-muted text-uppercase font-weight-bold">Pruebas mayor a 15 días</small><br>
                        <small class="text-muted"><a style="cursor: pointer;" onclick="fSearch('mayor');" >Ver detalles</a></small>
                        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> 


<div class="content mt-3 md p-20 listCasos" style="display:none;">
    <div class="col-12  m-t-3">
        <h4 class="text-black typereport" style="display: block;overflow: hidden;margin-bottom: 15px;position: relative;height: 33px;"> </h4>
        <div class="table-responsive">
            <div style="width: 100%; display:block">
                <a  onclick="hidedetalles();" style="float:right;color: white;"  class="btn btn-info"><i class="ti-eye"></i>&nbsp; Ocultar detalles</a>
                <a onclick="generateExcel();" target="_blank" style="float:right;color:#fff" class="btn btn-success"><i class="ti-download"></i>&nbsp; Exportar a Excel</a>
            </div>
            <table id="tbl_casos" class="table table-bordered table-hover" data-name="cool-table">
            <thead>
                <tr>
                <th>No.</th>
                <th>No. de identificación</th>
                <th>Nombre completo</th>
                <th>Dirección</th>
                <th>Evento epidemiológico</th>
                <th>Morbilidad</th>
                <th>Estado</th>
                <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            </table>
        </div>
    </div>
</div>



<script>


$(function(){
    loadReports();
    floadCasos();
});


function loadReports(){
    $.ajax({
        url: "<?php url('Lopersa/loadReports'); ?>",
        type : "POST",
        dataType: "JSON",
        success: function(data){
            
            $(".countTotal").text(data.casostotales);
            $(".countAbiertos").text(data.abiertos);
            $(".countCerrados").text(data.cerrados);
            $(".countEventosPri").text(data.tableCasosPri);
            $(".countPruebaMayor").text(data.mayor15);

        }, complete: function(){
        }
    });
}

function floadCasos(){
    $('.desactivarC').fadeIn(500);
    $('#tbl_casos').dataTable({
        ajax : {
            "url":  "<?php url('Lopersa/loadCasosReportes'); ?>",
            "data":function (d){
                d.tipo = $("#tipo").val();
            }
        },
        "aoColumnDefs" : [{
            "aTargets" : [0]
        }],
        "oLanguage" : {
            "sLengthMenu" : "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No hay Casos registrado bajo este criterio",
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
        "searching": false,
        "aaSorting" : [[0, 'desc']],
        "aLengthMenu" : [
            [10, 15, 20, -1], 
            [10, 15, 20, "Todos"] // change per page values here
        ],
        "columns": [ //agregar configuraciones a cada una de las columnas de las tablas
            {},//column 1
            { "orderable": false },//column 3
            { "orderable": false },//column 3
            { "class": "text-center", "orderable": false },//column 2
            { "orderable": false },//column 3
            { "orderable": false },//column 4
            { "orderable": false },//column 5
            // { "class": "text-center", "orderable": false }//column 6
            
        ],
        initComplete: function(oSettings, json) {
            $('[data-rel="tooltip"]').tooltip(); 
            $('.desactivarC').fadeOut(500);
        },
        "iDisplayLength" : 10,
        'autoWidth'   : false
    });

}

function fSearch(data){
    if(data == 'todos'){
        $(".typereport").text('Listado general')
    }else if(data == 'abiertos'){
        $(".typereport").text('Listado casos Abiertos')
    }else if(data == 'cerrados'){
        $(".typereport").text('Listado casos Cerrados')
    }else if(data == 'eventos'){
        $(".typereport").text('Listado casos de Eventos 345, 346, 347')
    }else if(data == 'mayor'){
        $(".typereport").text('Listado casos con Pruebas mayor a 15 días')
    }
    $('.desactivarC').fadeIn(500);
    $("#tipo").val(data);
    $('#tbl_casos').DataTable().ajax.reload(function(){
        $('.desactivarC').fadeOut(500);
        $(".listCasos").show();

    });

}

function hidedetalles(){
    $(".listCasos").hide();
}

function generateExcel(){
    $('.desactivarC').fadeIn(500);
    $.ajax({
        url : "<?php url('DownloadToExcel'); ?>",
        type : "GET",
        data: {
            tipo : $("#tipo").val()
        },
        dataType : "JSON",
        success : function (json){
            // console.log(json);
            window.location = json.link;
            // console.log(json.link);
        }, complete: function(){
            $('.desactivarC').fadeOut(500);
        }
    });

}

</script>

