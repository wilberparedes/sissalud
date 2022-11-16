<?php
  include 'developer/var.php';
?>



<style>
    td > a, .table-responsive > a   {
        color: #fff !important  ;
    }
    #addDirection{
        text-decoration: underline;
        cursor: pointer;
    }
    .card-header{
        background-color: #2196f3 !important;
        color: white !important;
    }
    .multiselectSintomas > button, .multiselect > button{
        background: #fff !important;
        color: #495057 !important;
        border: 1px solid #ced4da !important;
        border-radius: .25rem !important;
    }
    .btn-outline-light{
        color: #fff;
        background-color: transparent;
        background-image: none;
        border-color: #fff;
    }
    .pac-container{
        z-index: 999999999;
    }
</style>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Nuevo Caso</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a>Fichas</a></li>
                    <li class="active">Caso</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<form id="frmNuevoCaso" role="form">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3" style="margin-bottom: 0 !important;">DATOS CASO</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- EVENTOS EPIDEMIOLOGICOS  -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Evento epidemiológico:</label>
                                <select id="sEventosEpide" name="sEventosEpide" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                        <!-- Morbilidad -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Morbilidad:</label>
                                <select id="sMorbilidad" name="sMorbilidad" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                        <!-- ESTADO DE CASO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Estado:</label>
                                <select id="sEstadoCaso" name="sEstadoCaso" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="abierto">Abierto</option>
                                    <option value="cerrado">Cerrado</option>
                                </select>
                            </fieldset>
                        </div>
                        
                        <!-- SE REALIZA PRUEBA -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Se realiza prueba:</label>
                                <select id="sRealizaPrueba" name="sRealizaPrueba" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="si">Sí</option>
                                    <option value="no">No</option>
                                </select>
                            </fieldset>
                        </div>
                        
                        <!-- FECHA PRUEBA -->
                        <div class="col-lg-4 col-md-6 divfechaprueba" style="display:none;"> 
                            <fieldset class="form-group">
                                <label>Fecha de prueba:</label>
                                <input class="form-control" id="sFechaPrueba" name="sFechaPrueba" type="date">
                            </fieldset>
                        </div>

                        <!-- RESULTADO DE PRUEBA PSR -->
                        <div class="col-lg-4 col-md-6 divresultadopruebapcr" style="display:none;">
                            <fieldset class="form-group">
                                <label>Resultado prueba PCR:</label>
                                <select id="sResultadoPruebaPCR" name="sResultadoPruebaPCR" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                    <option value="Probable">Probable</option>
                                </select>
                            </fieldset>
                        </div>


                        <!-- RESULTADO DE PRUEBA SEROLOGICA -->
                        <div class="col-lg-4 col-md-6 divresultadipruebaserologica" style="display:none;">
                            <fieldset class="form-group">
                                <label>Resultado prueba serológica:</label>
                                <select id="sResultadoPruebSerologica" name="sResultadoPruebSerologica" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                    <option value="Probable">Probable</option>
                                </select>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3" style="margin-bottom: 0 !important;">DATOS HOGAR</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- SECTOR -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Sector:</label>
                                <select id="sSector" name="sSector" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                        <!-- BARRIO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Barrio:</label>
                                <select id="sBarrio" name="sBarrio" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                        <!-- DIRECCIÓN -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Dirección de residencia:</label><br>
                                <!-- <input class="form-control" id="txtDireccion" name="txtDireccion" type="text"> -->
                                <a onClick="addDirection()" id="addDirection">Agregar dirección</a>
                                <input type="hidden" id="lat" name="lat">
                                <input type="hidden" id="lng" name="lng">
                            </fieldset>
                        </div>

                        <!-- ESTRATO ECONOMICO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Estrato socioeconómico:</label>
                                <select id="sEstrato" name="sEstrato" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Estrato uno</option>
                                    <option value="2">Estrato dos</option>
                                    <option value="3">Estrato tres</option>
                                    <option value="4">Estrato cuatro</option>
                                    <option value="5">Estrato cinco</option>
                                    <option value="6">Estrato seis</option>
                                    <option value="7">No aplica</option>
                                </select>
                            </fieldset>
                        </div>

                        <!-- NUCLEO FAMILIAR -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Nucleo familiar:</label>
                                <select id="sNucleoFamiliar" name="sNucleoFamiliar" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3 o más</option>
                                </select>
                            </fieldset>
                        </div>

                        <!-- SERVICIOS PUBLICOS -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Servicios públicos:</label>
                                <select multiple name="sServiciosPublicos[]" class="form-control multiselect" title="Seleccione..."> 
                                    <option value="AG">Agua</option>
                                    <option value="LU">Luz</option>
                                    <option value="GA">Gas</option>
                                    <option value="TE">Teléfono</option>
                                    <option value="TV">Televisión</option>
                                    <option value="IN">Internet</option>
                                    <option value="AL">Alcantarillado</option>
                                </select>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DATOS PERSONA -->
    <div class="row">
        <div class="col-12" id="divpersonas">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3" style="float: left;display: block;margin-top: 7px;margin-bottom: 0px !important;">DATOS PERSONA</strong>
                    <!-- <button type="button" class="btn btn-outline-light"  id="btnaddperson" onClick="addPerson()" style="float:right;"><i class="fa fa-plus"></i>  Agregar persona</button> -->
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- TIPO DOCUMENTO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Tipo documento:</label>
                                <select id="sTipoDocumento" name="sTipoDocumento" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="E">Cédula de ciudadania</option>
                                    <option value="C">Cédula de extranjería</option>
                                    <option value="N">NIT</option>
                                    <option value="I">NUIP</option>
                                    <option value="P">Pasaporte</option>
                                    <option value="R">Registro civil</option>
                                    <option value="T">Tarjeta de identidad</option>
                                    <option value="X">No definido</option>
                                </select>
                                
                            </fieldset>
                        </div>

                        <!-- DOCUMENTO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                            <label>Documento:</label>
                            <input type="number" id="txtDocumento" name="txtDocumento" class="form-control">
                            </fieldset>
                        </div>
                        
                        <!-- NOMBRES -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Nombres:</label>
                                <input class="form-control" id="txtNombres" name="txtNombres" type="text">
                            </fieldset>
                        </div>

                        <!-- APELLIDOS -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Apellidos:</label>
                                <input class="form-control" id="txtApellidos" name="txtApellidos" type="text">
                            </fieldset>
                        </div>

                        <!-- TELÉFONO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Teléfono:</label>
                                <input type="number" id="txtTelefono" name="txtTelefono" class="form-control">
                            </fieldset>
                        </div>


                        <!-- SEXO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Sexo:</label>
                                <select id="sSexo" name="sSexo" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                </select>
                            </fieldset>
                        </div>

                        <!-- OCUPACION -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Ocupación:</label>
                                <select id="sOcupacion" name="sOcupacion" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="desempleado">DESEMPLEADO</option>
                                    <option value="empleado">EMPLEADO</option>
                                    <option value="independiente">INDEPENDIENTE</option>
                                    <option value="emprendedor">EMPRENDEDOR</option>
                                </select>
                            </fieldset>
                        </div>
                        


                        <!-- FECHA NACIMIENTO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <input class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" type="date">
                            </fieldset>
                        </div>
                        
                        <!-- EDAD -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Edad:</label>
                                <input class="form-control" id="txtEdad" name="txtEdad" type="text" readonly>
                            </fieldset>
                        </div>

                        <!-- LUGAR DE NACIMIENTO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Lugar de nacimiento:</label>
                                <select id="sLugarNacimiento" name="sLugarNacimiento" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                        <!-- NACIONALIDAD -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Nacionalidad:</label>
                                <select id="sNacionalidad" name="sNacionalidad" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="CO">Colombiano</option>
                                    <option value="EX">Extranjero</option>
                                </select>
                            </fieldset>
                        </div>

                        <!-- PAIS ORIGEN -->
                        <div class="col-lg-4 col-md-6 divpaisorigen" style="display:none;">
                            <fieldset class="form-group">
                                <label>País origen:</label>
                                <input class="form-control" id="txtPaisOrigen" name="txtPaisOrigen" type="text">
                            </fieldset>
                        </div>

                        <!-- PERMISO ESPECIAL DE PERMANENCIA -->
                        <div class="col-lg-4 col-md-6 divpermisoespecialpermanencia" style="display:none;">
                            <fieldset class="form-group">
                                <label>Permiso especial de permanencia:</label>
                                <select id="sPEP" name="sPEP" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </fieldset>
                        </div>


                        <!-- FECHA INGRESO AL PAIS -->
                        <div class="col-lg-4 col-md-6 divfechaingresopais" style="display:none;">
                            <fieldset class="form-group">
                                <label>Fecha de ingreso al país:</label>
                                <input class="form-control" id="txtFechaIngresoPais" name="txtFechaIngresoPais" type="date">
                            </fieldset>
                        </div>


                        <!-- CERTIFICADO MIGRACION -->
                        <div class="col-lg-4 col-md-6 divcertificadomigracion" style="display:none;">
                            <fieldset class="form-group">
                                <label>Certificado de migración:</label>
                                <select id="sCertificadoMigracion" name="sCertificadoMigracion" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </fieldset>
                        </div>

                        <!-- TIPO DE POBLACIÓN -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Tipo de población:</label>
                                <select id="sTipoPoblacion" name="sTipoPoblacion" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                        <!-- SINTOMAS -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Sintomas:</label>
                                <select name="sSintomas[]" multiple class="form-control multiselectSintomas" title="Seleccione...">
                                </select>
                            </fieldset>
                        </div>

                        <!-- EPS -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>EPS:</label>
                                <select id="sEps" name="sEps" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                        <!-- REGIMEN -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Regimen:</label>
                                <select id="sRegimen" name="sRegimen" class="form-control">
                                </select>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OBSERVACIONES -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3" style="margin-bottom: 0 !important;">OBSERVACIONES</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Observaciones -->
                        <div class="col-lg-12 col-md-12">
                            <fieldset class="form-group">
                                <label>Ingrese detalles:</label>
                                <textarea name="txaObservaciones" id="txaObservaciones" cols="30" rows="5" class="form-control" style="width: 100%;display: block;text-align: justify;"></textarea>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 m-t-3" style="background: #fff;border: 1px solid rgba(0,0,0,.125);">
        <div class="">
            <div class="card-body text-center" style="padding: 6px;">
            <button type="button" onclick="fNuevoCenso();" id="btnGuardar" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>

</form>




<!-- MODAL -->

<div class="modal fade" id="mNuevo" tabindex="-1" role="dialog" aria-labelledby="mNuevo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Nueva dirección</strong></h4>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <form id="frmNuevo" method="POST" class="form-horizontal">
                    <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label">Ingrese detalles:
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="txtDireccion" id="txtDireccion" class="form-control"  required="true" />
                        </div>

                        <div class="col-lg-12">
                            <div id="map" style="height: 300px;"></div>
                        </div>
                        
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btnsavedirection" disabled onclick="saveDirection();">Guardar dirección</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODALS -->


<script>

    var placeSearch, autocomplete;

    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    $(function(){  
        $('.desactivarC').fadeIn(500);

        $('.multiselect').selectpicker();

        $.ajax({
            url: "<?php url('Lopersa/sLoadSintomas'); ?>",
            type : "POST",
            dataType: "JSON",
            success: function(data){
                var op = '';
                $.each(data, function(k,v){
                    op += '<option value="'+v.cod+'">'+v.nombre+'</option>';
                });
                $('.multiselectSintomas').html(op);
            }, complete: function(){
                $('.multiselectSintomas').selectpicker();
            }
        });

        $("#sNacionalidad").on("change", function () {
            if($(this).val() == 'EX'){
                $(".divpaisorigen").show();
                $(".divpermisoespecialpermanencia").show();
                $(".divfechaingresopais").show();
                $(".divcertificadomigracion").show();
            }else{
                $(".divpaisorigen").hide();
                $(".divpermisoespecialpermanencia").hide();
                $(".divfechaingresopais").hide();
                $(".divcertificadomigracion").hide();
            }
        });

        
        $("#sRealizaPrueba").on("change", function () {
            if($(this).val() == 'si'){
                $(".divfechaprueba").show();
                $(".divresultadipruebaserologica").show();
                $(".divresultadopruebapcr").show();
            }else{
                $(".divfechaprueba").hide();
                $(".divresultadipruebaserologica").hide();
                $(".divresultadopruebapcr").hide();
            }
        });

        combobox('sEventosEpide',"<?php url('Lopersa/loadEventosEpide'); ?>",'Seleccione...');
        combobox('sMorbilidad',"<?php url('Lopersa/loadMorbilidades'); ?>",'Ninguna');

        
        combobox('sLugarNacimiento',"<?php url('Lopersa/loadLugarNacimiento'); ?>",'seleccione...');
        
        combobox('sEps',"<?php url('Lopersa/loadEps'); ?>",'Seleccione...');
        combobox('sSector',"<?php url('Lopersa/loadSectores'); ?>",'Seleccione...');
        
        $("#sSector").on("change", function(){
            combobox('sBarrio',"<?php url('Lopersa/loadBarrios'); ?>?codsector="+$(this).val(), 'Seleccione...');
        });

        combobox('sRegimen',"<?php url('Lopersa/loadRegimenes'); ?>",'Seleccione...');
        combobox('sTipoPoblacion',"<?php url('Lopersa/loadTipoPoblacion'); ?>",'Seleccione...');
        
        //---------------
        geolocate();
        // ---------------------------
        $( "#txtFechaNacimiento" ).change(function() {
            console.log($(this).val());
            $("#txtEdad").val(calcular_edad($(this).val()));
        });
    });
    var map;
    var markers = [];
    var geocoder;

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: position.coords.latitude, lng: position.coords.longitude},
                    zoom: 16,
                    mapTypeId: 'roadmap',
                    zoomControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false
                });
                geocoder = new google.maps.Geocoder;
                initAutocomplete();
                map.addListener('center_changed', function() {
                    markers.forEach(function(marker) {
                        marker.setPosition(map.getCenter());
                    });
                });

                map.addListener('dragend', function() {
                    console.log("dragend");
                    geocoder.geocode({'location': map.getCenter()}, function(results, status) {
                        if (status === 'OK') {
                            if (results[0]) {
                                $(".btnsavedirection").attr('disabled', false);
                                $("#lat").val(map.getCenter().lat());
                                $("#lng").val(map.getCenter().lng());
                                $("#txtDireccion").val(results[0].formatted_address.toUpperCase());
                            } else {
                                alert('No results found');
                            }
                        } else {
                            console.log('Geocoder failed due to: ' + status);
                        }
                    });
                });
                $('.desactivarC').fadeOut(500);
            });
            
        }
    }

    function initAutocomplete() {

        var input = document.getElementById('txtDireccion');
        var searchBox = new google.maps.places.SearchBox(input);

        map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    alert("Returned place contains no geometry");
                    return;
                }
                markers.push(new google.maps.Marker({
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                $(".btnsavedirection").attr('disabled',false);
                $("#lat").val(place.geometry.location.lat());
                $("#lng").val(place.geometry.location.lng());
                map.setCenter(place.geometry.location);

            });
            map.fitBounds(bounds);
            map.setZoom(18);

        });
    }
    
    function addDirection(){
        if( $("#lat").val() == '' && $("#lng").val() == '' && $("#txtDireccion").val() == '')
            $(".btnsavedirection").attr('disabled',true);
        $("#mNuevo").modal('show');
    }

    function saveDirection(){
        $("#addDirection").text($("#txtDireccion").val().toUpperCase());
        $("#mNuevo").modal('hide');
    }

    var vError = 0;
    function sendCenco(){
        $('.desactivarC').fadeIn(500);
        var options = {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
        };

        navigator.geolocation.getCurrentPosition( success, error, options );

        function success(position) {
            var coordenadas = position.coords;
            console.log('Latitud : ' + coordenadas.latitude);
            console.log('Longitud: ' + coordenadas.longitude);
            // $("#lat").val(coordenadas.latitude);
            // $("#lng").val(coordenadas.longitude);
            
        };

        function error(error) {
            console.warn('ERROR(' + error.code + '): ' + error.message);
            vError++;
            if(vError > 4){
                toast.error("no se pudo obtener Ubicacioón gps")
            }
            sendCenco();
        };
    }

    function fNuevoCenso(){
        $(".form-control").removeClass("is-invalid");
        var regexname = /^[0-9]*$/;
        var sEstadoCaso = $("#sEstadoCaso").val();

        var sTipoDocumento = $.trim($("#sTipoDocumento").val());
        var txtDocumento = $.trim($("#txtDocumento").val());
        var txtNombres = $.trim($("#txtNombres").val());
        var txtApellidos = $.trim($("#txtApellidos").val());
        var txtTelefono = $.trim($("#txtTelefono").val());
        var sSexo = $.trim($("#sSexo").val());
        var sOcupacion = $.trim($("#sOcupacion").val());
        
        
        var txtFechaNacimiento = $.trim($("#txtFechaNacimiento").val());
        var sLugarNacimiento = $.trim($("#sLugarNacimiento").val());
        
        var sNacionalidad = $.trim($("#sNacionalidad").val());

        var txtPaisOrigen = $.trim($("#txtPaisOrigen").val());
        var divpaisorigen = $('.divpaisorigen').css('display');

        var sPEP = $.trim($("#sPEP").val());
        var divpermisoespecialpermanencia = $('.divpermisoespecialpermanencia').css('display');

        var txtFechaIngresoPais = $.trim($("#txtFechaIngresoPais").val());
        var divfechaingresopais = $('.divfechaingresopais').css('display');
        
        var sCertificadoMigracion = $.trim($("#sCertificadoMigracion").val());
        var divcertificadomigracion = $('.divcertificadomigracion').css('display');
           
        var sTipoPoblacion = $.trim($("#sTipoPoblacion").val());
        var sSector = $.trim($("#sSector").val());
        var sBarrio = $.trim($("#sBarrio").val());
        var txtDireccion = $.trim($("#txtDireccion").val());
        var sEstrato = $.trim($("#sEstrato").val());
        var sNucleoFamiliar = $.trim($("#sNucleoFamiliar").val());
        var sServiciosPublicos = $('.multiselect').selectpicker('val');
        var sEventosEpide = $.trim($("#sEventosEpide").val());
        var sMorbilidad = $.trim($("#sMorbilidad").val());
        var sEps = $.trim($("#sEps").val());
        var sRegimen = $.trim($("#sRegimen").val());

        var sSintomas = $('.multiselectSintomas').selectpicker('val');
        var txaObservaciones = $.trim($("#txaObservaciones").val());

        // new data
        var sRealizaPrueba = $.trim($("#sRealizaPrueba").val());
        var divfechaprueba = $('.divfechaprueba').css('display');
        var sFechaPrueba = $.trim($("#sFechaPrueba").val());
        var divresultadipruebaserologica = $('.divresultadipruebaserologica').css('display');
        var sResultadoPruebSerologica = $.trim($("#sResultadoPruebSerologica").val());

        var sPruebaPCR = $.trim($("#sPruebaPCR").val());
        var divresultadopruebapcr = $('.divresultadopruebapcr').css('display');
        var sResultadoPruebaPCR = $.trim($("#sResultadoPruebaPCR").val());
        
        if(sEventosEpide == ''){
            toastr.error('Por favor, seleccione Eventos Epidemiológico.');
            $("#sEventosEpide").focus();
            $("#sEventosEpide").addClass("is-invalid");
        }
        else if(sEstadoCaso == ''){
            toastr.error('Por favor, seleccione Estado del Caso.');
            $("#sEstadoCaso").focus();
            $("#sEstadoCaso").addClass("is-invalid");
        }



        else if(sRealizaPrueba == ''){
            toastr.error('Por favor, seleccione si realiza prueba.');
            $("#sRealizaPrueba").focus();
            $("#sRealizaPrueba").addClass("is-invalid");
        }
        else if(divfechaprueba == 'block' && sFechaPrueba == ''){
            toastr.error('Por favor, seleccione Fecha de Prueba.');
            $("#sFechaPrueba").focus();
            $("#sFechaPrueba").addClass("is-invalid");
        }
        else if(divresultadopruebapcr == 'block' && sResultadoPruebaPCR == ''){
            toastr.error("Por favor, seleccione Resultado de Prueba PCR" );
            $("#sResultadoPruebaPCR").focus();
            $("#sResultadoPruebaPCR").addClass("is-invalid");
        }
        else if(divresultadipruebaserologica == 'block' && sResultadoPruebSerologica == ''){
            toastr.error('Por favor, seleccione Resultado de Prueba.');
            $("#sResultadoPruebSerologica").focus();
            $("#sResultadoPruebSerologica").addClass("is-invalid");
        }
    

        else if(sSector == ''){
            toastr.error('Por favor, seleccione Sector.');
            $("#sSector").focus();
            $("#sSector").addClass("is-invalid");
        }
        else if(sBarrio == ''){
            toastr.error('Por favor, seleccione Barrio.');
            $("#sBarrio").focus();
            $("#sBarrio").addClass("is-invalid");
        }
        else if($("#addDireccion").text() == 'Agregar dirección'){
            toastr.error('Por favor, agrege dirección.');
        }
        else if($("#lat").val() == '' || $("#lng").val() == ''){
            toastr.error('Por favor, agrege la dirección.');
        }
        else if(sEstrato == ''){
            toastr.error('Por favor, seleccione Estrato económico.');
            $("#sEstrato").focus();
            $("#sEstrato").addClass("is-invalid");
        }
        else if(sNucleoFamiliar == ''){
            toastr.error('Por favor, seleccione Nucleo Familiar.');
            $("#sNucleoFamiliar").focus();
            $("#sNucleoFamiliar").addClass("is-invalid");
        }
        else if(sServiciosPublicos.length == 0){
            toastr.error('Por favor, seleccione Servicios Públicos.');
            $(".multiselect").focus();
            $(".multiselect").addClass("is-invalid");
        }
        else if(sTipoDocumento == ''){
            toastr.error('Por favor, seleccione Tipo documento.');
            $("#sTipoDocumento").focus();
            $("#sTipoDocumento").addClass("is-invalid");
        }
        else if(txtDocumento == ''){
            toastr.error('Por favor, ingrese Documento.');
            $("#txtDocumento").focus();
            $("#txtDocumento").addClass("is-invalid");
        }
        else if(!regexname.test(txtDocumento)){
            toastr.error("Ingrese solo números en Documento");
            $("#txtDocumento").focus();
            $("#txtDocumento").addClass("is-invalid");
        }
        else if(txtNombres == ''){
            toastr.error('Por favor, ingrese Nombres.');
            $("#txtNombres").focus();
            $("#txtNombres").addClass("is-invalid");
        }
        else if(txtApellidos == ''){
            toastr.error('Por favor, ingrese Apellidos.');
            $("#txtApellidos").focus();
            $("#txtApellidos").addClass("is-invalid");
        }
        else if(txtTelefono == ''){
            toastr.error('Por favor, ingrese Teléfono.');
            $("#txtTelefono").focus();
            $("#txtTelefono").addClass("is-invalid");
        }
        else if(!regexname.test(txtTelefono)){
            toastr.error("Ingrese solo números en Teléfono");
            $("#txtTelefono").focus();
            $("#txtTelefono").addClass("is-invalid");
        }
        else if(sSexo == ''){
            toastr.error('Por favor, seleccione Sexo.');
            $("#sSexo").focus();
            $("#sSexo").addClass("is-invalid");
        }
        else if(sOcupacion == ''){
            toastr.error('Por favor, seleccione Ocupación.');
            $("#sOcupacion").focus();
            $("#sOcupacion").addClass("is-invalid");
        }
        
        else if(txtFechaNacimiento == ''){
            toastr.error('Por favor, seleccione Fecha de Nacimiento.');
            $("#txtFechaNacimiento").focus();
            $("#txtFechaNacimiento").addClass("is-invalid");
        }
        else if(sLugarNacimiento == ''){
            toastr.error('Por favor, seleccione Lugar de Nacimiento.');
            $("#sLugarNacimiento").focus();
            $("#sLugarNacimiento").addClass("is-invalid");
        }
        
        else if(sNacionalidad == ''){
            toastr.error('Por favor, seleccione Nacionalidad.');
            $("#sNacionalidad").focus();
            $("#sNacionalidad").addClass("is-invalid");
        }
        else if(divpaisorigen == 'block' && txtPaisOrigen == ''){
            toastr.error("Por favor, ingrese País de Origen");
            $("#txtPaisOrigen").focus();
            $("#txtPaisOrigen").addClass("is-invalid");
        }
        else if(divpermisoespecialpermanencia == 'block' && sPEP == ''){
            toastr.error("Por favor, ingrese si tiene Permiso Especial de Permanencia");
            $("#sPEP").focus();
            $("#sPEP").addClass("is-invalid");
        }
        else if(divfechaingresopais == 'block' && txtFechaIngresoPais == ''){
            toastr.error("Por favor, seleccione Fecha de Ingreso al País");
            $("#txtFechaIngresoPais").focus();
            $("#txtFechaIngresoPais").addClass("is-invalid");
        }
        else if(divcertificadomigracion == 'block' && sCertificadoMigracion == ''){
            toastr.error("Por favor, seleccione si tiene Certificado de Migración");
            $("#sCertificadoMigracion").focus();
            $("#sCertificadoMigracion").addClass("is-invalid");
        }
        else if(sTipoPoblacion == ''){
            toastr.error('Por favor, seleccione Tipo de Población.');
            $("#sTipoPoblacion").focus();
            $("#sTipoPoblacion").addClass("is-invalid");
        }
        else if(sSintomas.length == 0){
            toastr.error('Por favor, seleccione Sintomas.');
            $(".multiselectSintomas").focus();
            $(".multiselectSintomas").addClass("is-invalid");
        }
        else if(sEps == ''){
            toastr.error('Por favor, seleccione Eps.');
            $("#sEps").focus();
            $("#sEps").addClass("is-invalid");
        }
        else if(sRegimen == ''){
            toastr.error('Por favor, seleccione Regimen.');
            $("#sRegimen").focus();
            $("#sRegimen").addClass("is-invalid");
        }
        else if(txaObservaciones == ''){
            toastr.error('Por favor, ingrese Observaciones.');
            $("#txaObservaciones").focus();
            $("#txaObservaciones").addClass("is-invalid");
        }
        else{
            $('.desactivarC').fadeIn(500);
            var datosCenso = $("#frmNuevoCaso").serialize();
            $.ajax({
                url : "<?php url('Lopersa/nuevoCaso'); ?>",
                type : "POST",
                data : datosCenso+"&direc="+$("#addDirection").text().toUpperCase(),
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        $('.multiselect').selectpicker('val', []);
                        $('.multiselectSintomas').selectpicker('val', []);
                        $("#addDirection").text('Agregar dirección');
                        $("#txtDireccion").val('');
                        $(".divresultadipruebaserologica").hide();
                        $(".divfechaprueba").hide();
                        $(".divresultadopruebapcr").hide();
                        $("#frmNuevoCaso")[0].reset();
                        markers.forEach(function(marker) {
                            marker.setMap(null);
                        });
                        markers = [];
                        toastr.success("Caso registrado con éxito!");
                        // window.location.reload();
                    }else{
                        toastr.error(json.message);
                    }
                }, complete: function(){
                    $('.desactivarC').fadeOut(500);
                }
            });
        }

    }

    
    
</script>

