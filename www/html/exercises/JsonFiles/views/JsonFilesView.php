<?php
$groupid = 24;
if (isset($_POST['groupid']))
    $groupid = $_POST['groupid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/vendors/js/select.dataTables.min.css">
    <title>Document</title>
</head>

<body>
    <table id="table-2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Host ID</th>
                <th>Host</th>
                <th>Plan ID</th>
                <th>Plan</th>
                <th>DNS</th>
                <th>Estado</th>
                <th>Disponible</th>
                <th>Activo</th>
                <th>Ciudad del Sitio</th>
                <th>ID de Comuna</th>
                <!-- Agrega más encabezados de columna si es necesario -->
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se cargarán aquí a través de la solicitud DataTables -->
        </tbody>
    </table>
    <h2>Ajax</h2>
    <table id="table-3" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Host ID</th>
                <th>Host</th>
                <th>Plan ID</th>
                <th>Plan</th>
                <th>DNS</th>
                <th>Estado</th>
                <th>Disponible</th>
                <th>Activo</th>
                <th>Ciudad del Sitio</th>
                <th>ID de Comuna</th>
                <!-- Agrega más encabezados de columna si es necesario -->
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se cargarán aquí a través de la solicitud DataTables -->
        </tbody>
    </table>
    <!-- <table id="table-2" border="1">
        <tr>
            <th>hostid</th>
            <th>host</th>
            <th>planid</th>
            <th>plan</th>
            <th>dns</th>
            <th>status</th>
            <th>available</th>
            <th>active</th>
            <th>site_city</th>
            <th>id_comuna</th>
        </tr> -->
    <?php
    // Iterar sobre los elementos de $mappedArray y mostrarlos en la tabla
    // foreach ($mappedArray as $row) {
    // echo "<tr>";
    // echo "<td>" . $row['hostid'] . "</td>";
    // echo "<td>" . $row['host'] . "</td>";
    // echo "<td>" . $row['planid'] . "</td>";
    // echo "<td>" . $row['plan'] . "</td>";
    // echo "<td>" . $row['dns'] . "</td>";
    // echo "<td>" . $row['status'] . "</td>";
    // echo "<td>" . $row['available'] . "</td>";
    // echo "<td>" . $row['active'] . "</td>";
    // echo "<td>" . $row['site_city'] . "</td>";
    // echo "<td>" . $row['id_comuna'] . "</td>";
    // echo "</tr>";
    // }
    ?>
    <!-- </table> -->

    <div class="row">
        <div class="col-md-12 mb-12">
            <div class="card" style="height: 60px;">
                <div class="card-body">
                    <h4 class="card-title">Sondas Neutralidad</h4>
                    <!-- <div class="row"> -->
                    <!-- <div class="col-1; esconder-iconos" style="text-align: right;width: 100%;">
                            <button id="agregar" type="button" class="btn btn-inverse-primary btn-rounded btn-icon"
                                style="margin-top: -85px;" data-bs-toggle="tooltip" data-placement="right" title=""
                                data-bs-original-title="Agregar"><i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div> -->
                    <!-- <div class="col-1; esconder-iconos" style="text-align: right;width: 100%;">
                            <button id="pdf" type="button" class="btn btn-inverse-primary btn-rounded btn-icon"
                                style="margin-top: -129px; margin-right: 60px;" data-bs-toggle="tooltip"
                                data-placement="right" title="" data-bs-original-title="Exportar PDF"><i
                                    class="mdi mdi-file-pdf"></i>
                            </button>
                        </div> -->
                    <!-- <div class="col-1; esconder-iconos" style="text-align: right;width: 100%;">
                            <button id="excel" type="button" class="btn btn-inverse-primary btn-rounded btn-icon"
                                style="margin-top: -173px; margin-right: 118px;" data-bs-toggle="tooltip"
                                data-placement="right" title="" data-bs-original-title="Exportar Excel"><i
                                    class="mdi mdi-file-excel"></i>
                            </button>
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- <div class="card">
        <div class="card-body">
            <div class="row" style="justify-content: center;">
                <div class="col-md-4">
                    <div class="card bg-facebook d-flex align-items-center" style="height: 45px; border-radius: 15px;">
                        <div class="card-body" style="padding-top: 16px;">
                            <div class="d-flex flex-row align-items-center">
                                <div>
                                    <h6 class="text-white" id="grouptxt"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <br>

    <div class="card" style="display:block;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table" title="Sondas" dao="getSondasByGroupId" orientation="landscape">
                    <thead style="text-align:center">
                        <tr>
                            <th tableDbId="host" wPdf="600px">Sonda</th>
                            <th tableDbId="dns">MAC</th>
                            <th tableDbId="status-enabled" class="filter-select">Estado</th>
                            <th tableDbId="status-processing" class="filter-select">Midiendo</th>
                            <th tableDbId="status-available" class="filter-select">Sincronizado</th>
                            <th tableDbId="ip">IP</th>
                            <th tableDbId="site_city" class="filter-select">Ciudad</th>
                            <th tableDbId="terminal">CMTS</th>
                            <th tableDbId="code">Código</th>
                            <th tableDbId="site_address_a">Dirección</th>
                            <th tableDbId="architecture" class="filter-select">Dispositivo</th>
                            <th tableDbId="pubip">IP Pública</th>
                            <th tableDbId="model">MAC CM</th>
                            <th tableDbId="plan" class="filter-select">Plan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="pager" colspan="14">
                                <span class="first page-boton"><i class="fa fa-fast-backward"
                                        aria-hidden="true"></i></span>
                                <span class="prev page-boton"><i class="fa fa-backward" aria-hidden="true"></i></span>
                                <span class="pagedisplay"
                                    style="padding-left:10px;padding-right:10px;text-align:right;"></span>
                                <!-- this can be any element, including an input -->
                                <span class="next page-boton"><i class="fa fa-forward" aria-hidden="true"></i></span>
                                <span class="last page-boton"><i class="fa fa-fast-forward"
                                        aria-hidden="true"></i></span>
                                <span style="margin-left:15px;">Mostrando</span>
                                <select class="pagesize" style="margin-left:5px;">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="10000">Todos</option>
                                </select>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <!-- <script type='text/javascript' src="/assets/js/jquery.tablesorter.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.tablesorter.widgets.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.tablesorter.pager.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
    jQuery(document).ready(function() {
        var groupid = $('#groupid').val();
        var groupname = $('#groupid option:selected').text();
        $('#grouptxt').text(groupname);

        console.log(groupid);

        $.getJSON("../files/dataSondasFinal.json", function(data) {
            data.forEach(element => {


                $("#table tbody").append('<tr> \
                    <td hostid="' + element['hostid'] + '" host="' + element['host'] +
                    '" class="modal-neutralidad" style="color:#005187; cursor:pointer; padding: 10px 10px;">' +
                    element['host'] + '</td> \
                    <td hostid="' + element['hostid'] + '" host="' + element['host'] +
                    '" class="modal-neutralidad" style="color:#005187; cursor:pointer; padding: 10px 10px;">' +
                    element['dns'] + '</td> \
                    <td><label class="badge text-' + element['status-enabled-badge'].replace('badge', 'bg') + '">' +
                    element[
                        'status-enabled'] + '</label></td> \
                    <td><label class="badge text-' + element['status-processing-badge'].replace('badge', 'bg') + '">' +
                    element[
                        'status-processing'] + '</label></td> \
                    <td><label class="badge ' + element['status-available-badge'].replace('badge', 'bg') + '">' +
                    element[
                        'status-available'] + '</label></td> \
                    <td style="padding: 10px 10px;">' + element['ip'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['site_city'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['terminal'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['code'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['site_address_a'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['architecture'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['pubip'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['model'] + '</td> \
                    <td style="padding: 10px 10px;">' + element['plan'] + '</td> \
                </tr>');
                //}
            });
            // $('.modal-neutralidad').click(function () {
            //     var hostid = $(this).attr('hostid');
            //     var host = $(this).attr('host');
            //     console.log($(this).attr('host'));
            //     loadModal('#contenido-modal', '#vista-modal', '../sondas-modal.php', {
            //         hostid: hostid
            //     });
            // });


            // function loadModal(contenidoModalSelector, vistaModalSelector, url, data) {
            //     // Realizar una solicitud AJAX para obtener el contenido del modal
            //     $.ajax({
            //         type: 'GET',
            //         url: url,
            //         data: data,
            //         success: function (response) {
            //             // Colocar el contenido obtenido en el modal
            //             $(contenidoModalSelector).html(response);

            //             // Mostrar el modal
            //             $(vistaModalSelector).show();
            //         },
            //         error: function (error) {
            //             // Manejar el error de la solicitud AJAX
            //             console.error('Error al cargar el modal: ', error);
            //         }
            //     });
            // }

        }).fail(function() {
            console.log("An error has occurred.");
        });

        $('#table-3').DataTable({
            // processing: true,
            // serverSide: true,
            // ajax: "./../files/dataSondas.json"
            ajax: {
                url: "../files/dataSondas.json", // Ruta al script PHP que contiene la lógica para getSondasByGroupId()
                type: "GET",
                data: function(d) {
                    return $.extend({}, d, {
                        api: 'getSondasByGroupId', // Agrega el parámetro 'api' con el valor correspondiente
                        // groupid: valor_de_groupid // El valor de groupid que deseas enviar al servidor
                    });
                },
                "dataSrc": function(json) {
                    console.log('JSON: ', json);
                    return json.data; // Devuelve los datos recibidos tal como están
                }
            },
            columns: [{
                    data: "hostid"
                },
                {
                    data: "host"
                },
                {
                    data: "planid"
                },
                {
                    data: "plan"
                },
                {
                    data: "dns"
                },
                {
                    data: "status"
                },
                {
                    data: "available"
                },
                {
                    data: "active"
                },
                {
                    data: "site_city"
                },
                {
                    data: "id_comuna"
                }
            ]
        });


        $('#table-2').DataTable({
            data: <?php echo json_encode($mappedArray); ?>,
            columns: [{
                    data: 'hostid'
                },
                {
                    data: 'host'
                },
                {
                    data: 'planid'
                },
                {
                    data: 'plan'
                },
                {
                    data: 'dns'
                },
                {
                    data: 'status'
                },
                {
                    data: 'available'
                },
                {
                    data: 'active'
                },
                {
                    data: 'site_city'
                },
                {
                    data: 'id_comuna'
                }
            ]
        });


        // loadJSON('../files/dataSondasFinal.json', {
        //     api: 'getSondasByGroupId',
        //     groupid: groupid
        // }, function(json) {
        //     var i = 0;
        //     json.forEach(element => {
        //         console.log(element);

        //         $("#table tbody").append('<tr> \
        //         <td hostid="' + element['hostid'] + '" host="' + element['host'] +
        //             '" class="modal-neutralidad" style="color:#005187; cursor:pointer; padding: 10px 10px;">' +
        //             element['host'] + '</td> \
        //         <td hostid="' + element['hostid'] + '" host="' + element['host'] +
        //             '" class="modal-neutralidad" style="color:#005187; cursor:pointer; padding: 10px 10px;">' +
        //             element['dns'] + '</td> \
        //         <td><label class="badge ' + element['status-enabled-badge'] + '">' + element['status-enabled'] + '</label></td> \
        //         <td><label class="badge ' + element['status-processing-badge'] + '">' + element['status-processing'] + '</label></td> \
        //         <td><label class="badge ' + element['status-available-badge'] + '">' + element['status-available'] + '</label></td> \
        //         <td style="padding: 10px 10px;">' + element['ip'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['site_city'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['terminal'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['code'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['site_address_a'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['architecture'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['pubip'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['model'] + '</td> \
        //         <td style="padding: 10px 10px;">' + element['plan'] + '</td> \
        //     </tr>');
        //         //}
        //     });


        //     tableSorter2('table');
        //     tableSorter2ColumnFilterClear();
        //     tableSorter2ColumnFilter('IP', 6, true);
        //     tableSorter2ColumnFilter('Ciudad', 7, false);
        //     tableSorter2ColumnFilter('CMTS', 8, false);
        //     tableSorter2ColumnFilter('Código', 9, false);
        //     tableSorter2ColumnFilter('Dirección', 10, false);
        //     tableSorter2ColumnFilter('Dispositivo', 11, true);
        //     tableSorter2ColumnFilter('IP Pública', 12, true);
        //     tableSorter2ColumnFilter('MAC CM', 13, false);
        //     tableSorter2ColumnFilter('Plan', 14, true);

        //     $('.modal-neutralidad').click(function() {
        //         var hostid = $(this).attr('hostid');
        //         var host = $(this).attr('host');
        //         loadModal('#contenido-modal', '#vista-modal',
        //             '/neutralidad/sondas/sondas-modal.php', {
        //                 hostid: hostid
        //             });
        //     });

        //     //$('#tabla-sondas').css('display', '');
        //     $('#wait').css('display', 'none');
        //     $('#tabla-sondas').fadeIn("slow", function() {
        //         // Animation complete
        //     });
        //     if ($('#filters').css('margin-right') == '299px') {
        //         $('.tablesorter-filter-row').css('display', '');
        //     }

        // });

    });
    </script>
</body>

</html>