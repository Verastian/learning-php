<?php
require_once(dirname(__FILE__) . "/env.config.php");

define('MYSQLDB_SERVER', SERVER);
define('MYSQLDB_USER', USER);
define('MYSQLDB_PASSWORD', PASS);
define('MYSQLDB_DATABASE', DB);

function MYSQLConnect()
{
    $mysql = null;
    try {
        $mysql = new PDO('mysql:host=' . MYSQLDB_SERVER . ';dbname=' . MYSQLDB_DATABASE, MYSQLDB_USER, MYSQLDB_PASSWORD);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        // Puedes realizar un manejo de errores más robusto aquí según tus necesidades
    }
    return $mysql;
}

function MYSQLDisconnect($mysql)
{
    $mysql = null;
}

function mysqlQ($mysql, $query, $debug = false)
{
    $query = str_replace('.dbo.', '.', $query);
    try {
        if ($debug) {
            var_dump($query);
            error_log($query);
            echo "<br>";
        }

        $dataset = $mysql->query($query);
        if ($dataset) {
            return $dataset;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        error_log(date('Y-m-d H:i:s') . " ERROR IN: " . $query);
    }
    return false;
}

function mysqlF($dataset)
{
    return $dataset->fetch(PDO::FETCH_ASSOC);
}
?>