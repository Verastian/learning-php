<?php
// START Security
$sessionStarted=false;
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    $sessionStarted=true;
}
if (!isset($_SESSION['username'])) die();
if ($sessionStarted) {
    session_write_close();
}
// END Security


$hostid = 0;
if (isset($_POST['hostid'])) {
    $hostid = $_POST['hostid'];
}
?>
<!-- MODAL PRESENTA DATOS DE UNA SONDA -->
<form name="form" id="form" method="POST">

    <div class="modal fade" id="vista-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"><span name="title" id="title"></span></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- ENCABEZADO - BOTONES -->
                    <ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom" role="tablist" style="justify-content: center;">
                        <li class="nav-item">
                            <a style="width: 150px;text-align:center;" class="nav-link active" id="pills-sonda-tab" data-bs-toggle="pill" href="#pills-sonda" role="tab" aria-selected="true">
                                SONDA
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="width: 150px;text-align:center;" class="nav-link" id="pills-direccion-tab" data-bs-toggle="pill" href="#pills-direccion" role="tab" aria-selected="false">
                                DIRECCIÓN
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="width: 150px;text-align:center;" class="nav-link" id="pills-red-tab" data-bs-toggle="pill" href="#pills-red" role="tab" aria-selected="false">
                                RED
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="width: 150px;text-align:center;padding: 0.5rem 1.5rem;" class="nav-link" id="pills-cumplimiento-tab" data-bs-toggle="pill" href="#pills-cumplimiento" role="tab" aria-selected="false">
                                CUMPLIMIENTO
                            </a>
                        </li>
                    </ul>

                    <!-- DETALLE CUERPO DE CADA BOTON -->
                    <input type="hidden" id="hostid" name="hostid" value="<?php echo $hostid; ?>">
                    <div class="tab-content tab-content-custom-pill" id="pills-tabContent-custom">
                        <!-- DETALLE BOTON SONDA -->
                        <div class="tab-pane fade active show" id="pills-sonda" role="tabpanel" aria-labelledby="pills-sonda-tab">
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1">Sonda</div>
                                <div class="col-xs-10 col-xl-10"><input type="text" class="form-control spin" id="host" name="host" placeholder="Sonda" value=""></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1">Descripción</div>
                                <div class="col-xs-10 col-xl-10"><input type="text" class="form-control spin" id="hostname" name="hostname" placeholder="Descripcion Sonda" value=""></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1">CMTS</div>
                                <div class="col-xs-10 col-xl-10"><input type="text" class="form-control spin" id="terminal" name="terminal" placeholder="" value=""></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Estado</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="status" name="status" class="form-control spin mostrar-indicador">
                                        <option value="0">Habilitado</option>
                                        <option value="1">Deshabilitado</option>
                                    </select>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Plan</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="planid" name="planid" class="form-control spin mostrar-indicador">
                                        <option selected>Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Activo</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="active" name="active" class="form-control spin mostrar-indicador">
                                        <option value=yes>Activo</option>
                                        <option value="no">Inactivo</option>
                                    </select>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Modelo</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="Modelo" name="architecture" id="architecture"class="form-control spin mostrar-indicador">
                                        <option value='RaspberryPi4'>Raspberry Pi 4</option>
                                        <option value="ASUS">ASUS</option>
                                        <option value="Buffalo">Buffalo</option>
                                        <option value="Netgear3X00">Netgear 3X00</option>
                                        <option value="Archer C7 v4">Archer C7 v4</option>
                                        <option value="Archer C7 v5">Archer C7 v5</option>
                                        <option value="">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">MAC</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="dns" name="dns" placeholder="MAC" value=""></div>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">MAC CM</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="model" name="model" placeholder="MAC-CM" value=""></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Código</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="code" name="code" placeholder="Código" value=""></div>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">SMS</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="sms" name="sms" placeholder="SMS" value=""></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-direccion" role="tabpanel" aria-labelledby="pills-direccion-tab">
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1">Dirección</div>
                                <div class="col-xs-10 col-xl-10"><input type="text" class="form-control spin" id="site_address_a" name="site_address_a" placeholder="Direccion" value=""></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Región</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="id_region" name="id_region" class="form-control spin mostrar-indicador">
                                        <option selected>Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Comuna</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="id_comuna" name="id_comuna" class="form-control spin mostrar-indicador">
                                        <option selected>Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                            <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Latitud</div>
                            <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="location_lat" name="location_lat" placeholder="Latitud" value=""></div>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Longitud</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="location_lon" name="location_lon" placeholder="RBD" value=""></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">RBD</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="RBD" name="RBD" placeholder="RBD" value=""></div>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-red" role="tabpanel" aria-labelledby="pills-red-tab">
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">IP LAN</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin;" id="lan_ip" name="lan_ip" placeholder="IP-LAN" value=""></div>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Máscara LAN</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="lan_mask" name="lan_mask" placeholder="Máscara-LAN" value=""></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">WiFi</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="wifi_enabled" name="wifi_enabled" class="form-control spin mostrar-indicador">
                                        <option value="0">Activa</option>
                                        <option value="1">Inactiva</option>
                                    </select>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">WiFi Password</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="wifi_wpa2" name="wifi_wpa2" placeholder="WiFi-Password" value=""></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">Control Parental</div>
                                <div class="col-xs-3 col-xl-3">
                                    <select id="parental_enabled" name="parental_enabled" class="form-control spin mostrar-indicador">
                                        <option value="0">Activo</option>
                                        <option value="1">Inactivo</option>>
                                    </select>
                                </div>
                                <div class="col-xs-2 col-xl-2 mt-1"></div>
                                <div class="col-xs-2 col-xl-2 mt-1" style="padding-top: 2px;">SSID</div>
                                <div class="col-xs-3 col-xl-3">
                                    <div><input type="text" class="form-control spin" id="wifi_ssid" name="wifi_ssid" placeholder="SSID" value=""></div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="pills-cumplimiento" role="tabpanel" aria-labelledby="pills-cumplimiento-tab">
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-xs-2 col-xl-2 mt-2" style="font-weight: 700; padding-top: 17px; display: grid;">
                                            <span style="background: #ecf4ff; height: 30.8px; border-radius: 10px; padding: 5px 5px; margin-top:20px">
                                                Nacional
                                            </span>
                                        </div>

                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="nacional-delay" style="margin-top: 20px;">Delay</label>
                                            <input type="text" class="form-control spin" id="nac_delay" name="nac_delay" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="nacional-segundos-bajada" class="separa-label">Segundos Bajada</label>
                                            <input type="text" class="form-control spin" id="nac_time_b" name="nac_time_b" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="nacional-segundos-subida" class="separa-label">Segundos Subida</label>
                                            <input type="text" class="form-control spin" id="nac_time_s" name="nac_time_s" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="nacional-sesiones-bajada" class="separa-label">Sesiones Bajada</label>
                                            <input type="text" class="form-control spin" id="nac_sessions_b" name="nac_sessions_b" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="nacional-sesiones-subida" class="separa-label">Sesiones Subida</label>
                                            <input type="text" class="form-control spin" id="nac_sessions_s" name="nac_sessions_s" placeholder="" value="" style="text-align:right">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-2 col-xl-2 mt-2" style="font-weight: 700; display: grid;">
                                            <span style="background: #ecf4ff; height: 30.8px; border-radius: 10px; padding: 5px 5px; margin-top: -2px;">
                                                Local
                                            </span>
                                        </div>

                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="local-delay" class="esconder-label">Delay</label>
                                            <input type="text" class="form-control spin" id="loc_delay" name="loc_delay" placeholder="" value="" style="margin-block:2px; text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="local-segundos-bajada" class="esconder-label">Segundos Bajada</label>
                                            <input type="text" class="form-control spin" id="loc_time_b" name="loc_time_b" placeholder="" value="" style="margin-block:2px; text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="local-segundos-subida" class="esconder-label">Segundos Subida</label>
                                            <input type="text" class="form-control spin" id="loc_time_s" name="loc_time_s" placeholder="" value="" style="margin-block:2px; text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="local-Sesiones-Bajada" class="esconder-label">Sesiones Bajada</label>
                                            <input type="text" class="form-control spin" id="loc_sessions_b" name="loc_sessions_b" placeholder="" value="" style="margin-block:2px; text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="local-Sesiones-Subida" class="esconder-label">Sesiones Subida</label>
                                            <input type="text" class="form-control spin" id="loc_sessions_s" name="loc_sessions_s" placeholder="" value="" style="margin-block:2px; text-align:right">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-2 col-xl-2 mt-2" style="font-weight: 700; display: grid;">
                                            <span style="background: #ecf4ff; height: 30.8px; border-radius: 10px; padding: 5px 5px; margin-top: -3px;">
                                                Internacional
                                            </span>
                                        </div>

                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="internacional-delay" class="esconder-label">Delay</label>
                                            <input type="text" class="form-control spin" id="int_delay" name="int_delay" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="internacional-segundos-bajada" class="esconder-label">Segundos Bajada</label>
                                            <input type="text" class="form-control spin" id="int_time_b" name="int_time_b" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="internacional-segundos-subida" class="esconder-label">Segundos Subida</label>
                                            <input type="text" class="form-control spin" id="int_time_s" name="int_time_s" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="internacional-Sesiones-Bajada" class="esconder-label">Sesiones Bajada</label>
                                            <input type="text" class="form-control spin" id="int_sessions_b" name="int_sessions_b" placeholder="" value="" style="text-align:right">
                                        </div>
                                        <div class="col-xs-2 col-xl-2 mt-1">
                                            <label for="internacional-Sesiones-Subida" class="esconder-label">Sesiones Subida</label>
                                            <input type="text" class="form-control spin" id="int_sessions_s" name="int_sessions_s" placeholder="" value="" style="text-align:right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Grabar</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Eliminar</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    jQuery(document).ready(function() {
        var groupid=$('#groupid').val();
        var hostid=<?php echo $hostid; ?>;
        loadJSON('/neutralidad/api/api.php', {api: 'getSondaById',hostid: hostid,groupid: groupid}, function(data) {
            console.log(data);
            data['title'] = 'Sonda: ' + data['host'];
            loadJSON('/neutralidad/api/api.php', {api: 'getRegion'}, function(region) {
                $('#id_region').empty();
                    region.forEach(element => {
                        $('#id_region').append(new Option(element['region'], element['reg']));
                    });
                    loadJSON('/neutralidad/api/api.php', {api: 'getComunas', 'region': data['id_region']}, function(comunas) {
                    $('#id_comuna').empty();
                    comunas.forEach(element => {
                        $('#id_comuna').append(new Option(element['comuna'], element['com']));
                    });   
                    loadJSON('/neutralidad/api/api.php', {api: 'getPlans', groupid: data['groupid']}, function(plan) {
                        $('#planid').empty();
                        plan.forEach(element => {
                            $('#planid').append(new Option(element['plan'], element['planid']));
                        });
                        jsonToForm($('#form'),data,''); // Bind ald form       
                    });
                });
            });
        });

        $('#id_region').change(function() {
            var id_region = $('#id_region').val();
            loadJSON('/neutralidad/api/api.php', {api: 'getComunas', region: id_region}, function(comunas) {
                console.log(comunas);
                $('#id_comuna').empty();
                $('#id_comuna').append(new Option('', 0));
                comunas.forEach(element => {
                    $('#id_comuna').append(new Option(element['comuna'], element['com']));
                });  
            });
        })

    });
</script>