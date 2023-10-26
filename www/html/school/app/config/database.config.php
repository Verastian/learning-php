<?php
/**
 * 
 */
class MySQLdb
{
    private $host = SERVER;
    private $user = USER;
    private $password = PASS;
    private $db = DB;
    private $port = "";
    private $conn;

    function __construct()
    {
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host
                . ';dbname=' . $this->db,
                $this->user,
                $this->password
            );
            // echo "Conectado";
        } catch (Exception $e) {
            die("No se pudo conectar: " . $e->getMessage());
        }
    }
    public function query($sql = '')
    {
        if (empty($sql))
            return false;
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Update, Insert y Delete
    public function queryNoSelect($sql, $data)
    {
        return $this->conn->prepare($sql)->execute($data);
    }

}

?>