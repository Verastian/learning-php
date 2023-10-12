<?php
// Incluir el archivo con las funciones y definiciones
include 'database_functions.php';

// Establecer una conexión a la base de datos
$mssql = MSSQLConnect();

// Nombre de la tabla que deseas leer
$tableName = 'MiTabla';

// Definir la consulta SQL para seleccionar todos los registros de la tabla
$sql = "SELECT * FROM $tableName";

// Ejecutar la consulta SQL para leer los datos de la tabla
$result = mssqlQ($mssql, $sql);

if ($result) {
    // Recorrer los resultados y mostrar los datos
    while ($row = mssqlF($result)) {
        echo "ID: " . $row['id'] . ", Nombre: " . $row['nombre'] . ", Edad: " . $row['edad'] . "<br>";
    }
} else {
    echo "Hubo un error al leer la tabla '$tableName'.";
}

// Cerrar la conexión a la base de datos
MSSQLDisconnect($mssql);
?>