<?php
echo "JSON Files";

$json_file = '../files/dataSondas.json';

if (!file_exists($json_file)) {
    die('El archivo no existe');
}
$json_file = file_get_contents($json_file);

$data = json_decode($json_file, true);



if ($data === null) {
    echo 'Error al leer el archivo JSON';
} else {
    // echo "<pre>";
    // var_dump($data);
    // echo "<pre/>";
    $mapped = function ($data) {
        $row = array();

        $row['hostid'] = $data['hostid'];
        $row['host'] = $data['host'];
        $row['planid'] = $data['planid'];
        $row['plan'] = $data['plan'];
        $row['dns'] = $data['dns'];
        $row['status'] = $data['status'] === 0 ? 'Habilitado' : 'Deshabilitado';
        $row['available'] = $data['available'];
        $row['active'] = $data['active'];
        $row['site_city'] = $data['site_city'];
        $row['id_comuna'] = $data['id_comuna'];
        return $row;
    };

    $mappedArray = array_map($mapped, $data);

}
// var_dump($mappedArray);
require "views/JsonFilesView.php";
?>