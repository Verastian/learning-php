<?php
define('MSSQLDB_SERVER','192.168.155.119');
define('MSSQLDB_USER','sebastian');
define('MSSQLDB_PASSWORD','SVera2023!$');
define('MSSQLDB_DATABASE','SAGEC');

function MSSQLConnect()
{
    try {
        $mssql = sqlsrv_connect(
            MSSQLDB_SERVER,
            array(
                'Database'=>
                MSSQLDB_DATABASE,'UID'=>
                MSSQLDB_USER,'PWD'=>
                MSSQLDB_PASSWORD,
                'ReturnDatesAsStrings'=> 
                true,'CharacterSet' =>
                 "UTF-8"));
    } catch (Exception $e) {
        echo $e . "\n";
    }

    return $mssql;
}

function MSSQLDisconnect($mssql) {
    sqlsrv_close($mssql);
}

function mssqlQ($mssql,$query, $debug = false)
{
    try
    {
        if ($debug)
        {
            var_dump($query);
            error_log($query);
            echo "<br>";
        }
  
        $q=sqlsrv_query($mssql,$query);
        if ($q)
        {
            return $q;
        }
    } catch (Exception $e)
    {
    }
    error_log(date('Y-m-d H:i:s') . " ERROR IN: " . $query);
    return false;
}

function mssqlF($dataset)
{
    return sqlsrv_fetch_array( $dataset, SQLSRV_FETCH_ASSOC);
}


function getFieldsTypes($mssql,$table) {
    $tbl=explode('.',$table);
    $DATABASE=$tbl[0];
    $TABLENAME=$tbl[2];
    mssqlQ($mssql,"USE " . $DATABASE);
    $sql="SELECT COLUMN_NAME, DATA_TYPE 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE TABLE_NAME = '" . $TABLENAME . "'";

    $query=mssqlQ($mssql,$sql);
    $data=array();
    $type='string';
    while ($row = mssqlF( $query )) {
        if ($row['COLUMN_NAME'] == "md5") continue;
        if ($row['COLUMN_NAME'] == 'ssma\$rowid') continue;
        switch ( $row['DATA_TYPE'] ) {
            case 'bigint'   : $type='number'; break;
            case 'int'      : $type='number'; break;
            case 'numeric'  : $type='number'; break;
            case 'float'    : $type='number'; break;
            case 'datetime' : $type='datetime'; break;
            case 'date'     : $type='date'; break;
            case 'char'     : $type='string'; break;
            case 'varchar'  : $type='string'; break;
            case 'nvarchar' : $type='string'; break;
            case 'text'     : $type='string'; break;
        }
        $data[$row['COLUMN_NAME']] = $type;
    }
    return $data;
  
}


function quote($fields,$field,$value) {
    $value=str_replace("'","",$value);
    switch ($fields[$field]) {
        case 'number'   : $ret=$value; break;
        case 'string'   : $ret="'" . $value . "'"; break;
        case 'datetime' : $ret="'" . $value . "'";  break;
        default         : $ret="'" . $value . "'";  break;
    }
    return $ret;
}

?>
