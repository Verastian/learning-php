<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border="1">
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
        </tr>
        <?php
        // Iterar sobre los elementos de $mappedArray y mostrarlos en la tabla
        foreach ($mappedArray as $row) {
            echo "<tr>";
            echo "<td>" . $row['hostid'] . "</td>";
            echo "<td>" . $row['host'] . "</td>";
            echo "<td>" . $row['planid'] . "</td>";
            echo "<td>" . $row['plan'] . "</td>";
            echo "<td>" . $row['dns'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['available'] . "</td>";
            echo "<td>" . $row['active'] . "</td>";
            echo "<td>" . $row['site_city'] . "</td>";
            echo "<td>" . $row['id_comuna'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>