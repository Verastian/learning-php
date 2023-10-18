<?php
// require_once '../config/database.config.php';
// require_once('config/database.config.php');
$servicePath = "config/database.config.php";
if (file_exists($servicePath)) {
    require_once($servicePath);
} else {
    echo "El archivo de servicio no se encontró en la ubicación especificada.";
    // Realiza otras acciones necesarias si el archivo no se encuentra
}
class UserRepository
{
    private $mssql;

    public function __construct()
    {
        $this->mssql = MYSQLConnect();
    }

    public function getAllUsers()
    {
        $users = array();
        try {
            $query = "SELECT * FROM Users";
            $result = mysqlQ($this->mssql, $query);
            if ($result) {
                while ($row = mysqlF($result)) {
                    $user = new User($row['ID'], $row['Name'], $row['Email'], $row['Password']);
                    $users[] = $user;
                }
            }
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
        return $users;
    }

    public function getUserById($id)
    {
        try {
            $query = "SELECT * FROM Users WHERE id = " . $id;
            $result = mysqlQ($this->mssql, $query);
            $row = mysqlF($result);
            if ($row) {
                return new User($row['ID'], $row['Name'], $row['Email'], $row['Password']);
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function insertUser(User $user)
    {
        try {
            $name = $user->getName();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $query = "INSERT INTO Users (name, email, password) VALUES ('$name', '$email', '$password')";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function updateUser(User $user)
    {
        try {
            $id = $user->getId();
            $name = $user->getName();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $query = "UPDATE Users SET name='$name', email='$email', password='$password' WHERE id=$id";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {
            $query = "DELETE FROM Users WHERE id=$id";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }
}