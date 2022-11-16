<?php
  include 'developer/var.php';
?>
<style>
    td > a, .table-responsive > a   {
        color: #fff !important  ;
    }
    .card-header{
        background-color: #2196f3 !important;
        color: white !important;
    }
</style>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Censo</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a>Fichas</a></li>
                    <li class="active">Censo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<form id="frmNuevoCenso" role="form">
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">DATOS PERSONALES</strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- TIPO DOCUMENTO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <input type="hidden" id="lat" name="lat">
                                <input type="hidden" id="lng" name="lng">
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
                        
                        <!-- FECHA NACIMIENTO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <input class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" type="date">
                            </fieldset>
                        </div>

                        <!-- LUGAR DE NACIMIENTO -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Lugar de nacimiento:</label>
                                <input class="form-control" id="txtLugarNacimiento" name="txtLugarNacimiento" type="text">
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

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">DATOS HOGAR</strong>
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
                                <label>Dirección de residencia:</label>
                                <input class="form-control" id="txtDireccion" name="txtDireccion" type="text">
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
                                <select multiple name="sServiciosPublicos[]" class="form-control multiselect" title="seleccione..."> 
                                    <option value="AG">Agua</option>
                                    <option value="LU">Luz</option>
                                    <option value="GA">Gas</option>
                                    <option value="TE">Teléfono</option>
                                    <option value="TV">Televisión</option>
                                    <option value="IN">Internet</option>
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
                    <strong class="card-title mb-3">DATOS EPIDEMIOLÓGICOS</strong>
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

                        <!-- CANTIDAD DE EVENTOS -->
                        <div class="col-lg-4 col-md-6">
                            <fieldset class="form-group">
                                <label>Cantidad de eventos:</label>
                                <input type="number" id="txtCantidadEventos" name="txtCantidadEventos" class="form-control">
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

                        <div class="col-12 m-t-3" style="position: fixed;bottom: 0;width: 100%;left: 0;right: 0;box-shadow: 20px 25px 10px 23px;background: #fff;">
                            <div class="">
                                <div class="card-body text-center" style="padding: 6px;">
                                <button type="button" onclick="fNuevoCenso();" id="btnGuardar" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>




<!-- MODAL -->

<!-- FIN MODALS -->


<script>


    $(function(){

        $('.multiselect').selectpicker();

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

        combobox('sEventosEpide',"<?php url('Lopersa/loadEventosEpide'); ?>",'Seleccione...');
        combobox('sEps',"<?php url('Lopersa/loadEps'); ?>",'Seleccione...');
        combobox('sSector',"<?php url('Lopersa/loadSectores'); ?>",'Seleccione...');
        
        $("#sSector").on("change", function(){
            combobox('sBarrio',"<?php url('Lopersa/loadBarrios'); ?>?codsector="+$(this).val(), 'Seleccione...');
        });

        combobox('sRegimen',"<?php url('Lopersa/loadRegimenes'); ?>",'Seleccione...');
        combobox('sTipoPoblacion',"<?php url('Lopersa/loadTipoPoblacion'); ?>",'Seleccione...');
        
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
        }
        function error(error) {
            console.warn('ERROR(' + error.code + '): ' + error.message);
        };
        //---------------
    });

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
            $("#lat").val(coordenadas.latitude);
            $("#lng").val(coordenadas.longitude);
            var datosCenso = $("#frmNuevoCenso").serialize();
            
            $.ajax({
                url : "<?php url('Lopersa/nuevoCenso'); ?>",
                type : "POST",
                data : datosCenso,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        $('.multiselect').selectpicker('val', []);
                        $("#frmNuevoCenso")[0].reset();
                        toastr.success("Censo registrado con éxito!");
                        // window.location.reload();
                    }else{
                        toastr.error(json.message);
                    }
                }, complete: function(){
                    $('.desactivarC').fadeOut(500);
                }
            });
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

        var sTipoDocumento = $.trim($("#sTipoDocumento").val());
        var txtDocumento = $.trim($("#txtDocumento").val());
        var txtNombres = $.trim($("#txtNombres").val());
        var txtApellidos = $.trim($("#txtApellidos").val());
        var txtTelefono = $.trim($("#txtTelefono").val());
        var txtFechaNacimiento = $.trim($("#txtFechaNacimiento").val());
        var txtLugarNacimiento = $.trim($("#txtLugarNacimiento").val());
        
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
        var txtCantidadEventos = $.trim($("#txtCantidadEventos").val());
        var sEps = $.trim($("#sEps").val());
        var sRegimen = $.trim($("#sRegimen").val());
        
        
        if(sTipoDocumento == ''){
            toastr.error('Por favor, seleccione Tipo documento.');
            $("#sTipoDocumento").focus();
            $("#sTipoDocumento").addClass("is-invalid");

        }else if(txtDocumento == ''){
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
        else if(txtFechaNacimiento == ''){
            toastr.error('Por favor, seleccione Fecha de Nacimiento.');
            $("#txtFechaNacimiento").focus();
            $("#txtFechaNacimiento").addClass("is-invalid");
        }
        else if(txtLugarNacimiento == ''){
            toastr.error('Por favor, ingrese Lugar de Nacimiento.');
            $("#txtLugarNacimiento").focus();
            $("#txtLugarNacimiento").addClass("is-invalid");
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
        else if(txtDireccion == ''){
            toastr.error('Por favor, ingrese Dirección.');
            $("#txtDireccion").focus();
            $("#txtDireccion").addClass("is-invalid");
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
            $("#sServiciosPublicos").focus();
            $("#sServiciosPublicos").addClass("is-invalid");
        }
        else if(sEventosEpide == ''){
            toastr.error('Por favor, seleccione Eventos Epidemiológico.');
            $("#sEventosEpide").focus();
            $("#sEventosEpide").addClass("is-invalid");
        }
        else if(txtCantidadEventos == ''){
            toastr.error('Por favor, ingrese Cantidad de Eventos.');
            $("#txtCantidadEventos").focus();
            $("#txtCantidadEventos").addClass("is-invalid");
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
        else{
            sendCenco();
        }

    }

</script>
