<?php
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
            $query = "SELECT * FROM users";
            $result = mysqlQ($this->mssql, $query);
            if ($result) {
                while ($row = mysqlF($result)) {
                    $user = new User($row['id'], $row['name'], $row['email'], $row['password']);
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
            $query = "SELECT * FROM users WHERE id = " . $id;
            $result = mysqlQ($this->mssql, $query);
            $row = mysqlF($result);
            if ($row) {
                return new User($row['id'], $row['name'], $row['email'], $row['password']);
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function createUser(User $user)
    {
        try {
            $name = $user->getName();
            $email = $user->getEmail();
            $password = $user->getPassword();
            //Encriptar el password MD5
            $passwordEncriptado = md5($password);
            $rolId = $user->getRolId();
            $query = "INSERT INTO users (name, email, password,rol_id) VALUES ('$name', '$email', '$password','$rolId')";
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
            // $password = $user->getPassword();
            $query = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {
            $query = "DELETE FROM users WHERE id=$id";
            return mysqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }
}