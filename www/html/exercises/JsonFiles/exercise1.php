<?php
echo "JSON Files";

$json_file = '../files/dataSondas.json';

if (!file_exists($json_file)) {
    die('El archivo no existe');
}
$json_file = file_get_contents($json_file);

$decoded_object = json_decode($json_file);



if ($decoded_object === null || !property_exists($decoded_object, 'data')) {
    echo 'Error al leer el archivo JSON';
} else {
    // echo "<pre>";
    // var_dump($data);
    // echo "<pre/>";
    $data = $decoded_object->data;
    $mapped = function ($item) {
        $row = array();

        $row['hostid'] = $item->hostid;
        $row['host'] = $item->host;
        $row['planid'] = $item->planid;
        $row['plan'] = $item->plan;
        $row['dns'] = $item->dns;
        $row['status'] = $item->status === 0 ? 'Habilitado' : 'Deshabilitado';
        $row['available'] = $item->available;
        $row['active'] = $item->active;
        $row['site_city'] = $item->site_city;
        $row['id_comuna'] = $item->id_comuna;
        return $row;
    };

    $mappedArray = array_map($mapped, $data);
    var_dump($mappedArray);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['api']) && $_POST['api'] === 'getSondasByGroupId') {
    $result = getSondasByGroupId(); // Llamar directamente al método
    var_dump($result);
    // Envía los datos como respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($result);
}
function getSondasByGroupId()
{
    // if (!isset($_REQUEST['groupid']))
    //     return array(null);
    // $data = $_REQUEST['groupid'];
    // return $data;
    $json_file = '../files/dataSondas.json';

    if (!file_exists($json_file)) {
        die('El archivo no existe');
    }
    $json_file = file_get_contents($json_file);

    $decoded_object = json_decode($json_file);



    if ($decoded_object === null || !property_exists($decoded_object, 'data')) {
        echo 'Error al leer el archivo JSON';
    } else {
        // echo "<pre>";
        // var_dump($data);
        // echo "<pre/>";
        $data = $decoded_object->data;
        $mapped = function ($item) {
            $row = array();

            $row['hostid'] = $item->hostid;
            $row['host'] = $item->host;
            $row['planid'] = $item->planid;
            $row['plan'] = $item->plan;
            $row['dns'] = $item->dns;
            $row['status'] = $item->status === 0 ? 'Habilitado' : 'Deshabilitado';
            $row['available'] = $item->available;
            $row['active'] = $item->active;
            $row['site_city'] = $item->site_city;
            $row['id_comuna'] = $item->id_comuna;
            return $row;
        };

        return array_map($mapped, $data);
    }

}
// var_dump($mappedArray);
require "views/JsonFilesView.php";
?>