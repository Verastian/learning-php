<?php
/**
 * Entrada y definicion del control de la URI
 */
/**
 * Este script se encarga del enrutamiento y control de solicitudes en una aplicación web básica.
 * La clase Control procesa la URL para determinar el controlador y el método a ser llamado.
 * La clase busca el controlador correspondiente en el directorio de controladores y carga el archivo.
 * Luego, crea una instancia del controlador y llama al método apropiado en función de la URL proporcionada.
 * El método separarURL() toma la URL proporcionada, la sanitiza y la divide en componentes para su procesamiento.
 * Si la URL es 'http://tudominio.com/login/cover', se carga el controlador 'Login' y se llama al método 'cover'.
 */
class Control
{
    // Establece valores predeterminados para el controlador, método y parámetros
    private $controller = "login";
    private $method = "cover";
    private $params = [1, 2, 3];

    // Constructor de la clase Control
    function __construct()
    {
        // Separa y procesa la URL
        $url = $this->separarURL();
        // Verifica si la URL no está vacía y si el archivo del controlador existe
        if ($url != "" && file_exists("../app/controllers/" . ($url[0]) . ".controller.php")) {
            $this->controller = ($url[0]); // convierte la primera letra en mayúscula
            unset($url[0]);
        }
        // Cargamos la clase controladora
        require_once("../app/controllers/" . ($this->controller) . ".controller.php"); // Asegúrate de ajustar la extensión del archivo si es necesario
        $this->controller = ucfirst($this->controller) . "Controller";
        // Creamos una instancia del controlador
        $this->controller = new $this->controller;

        // Verifica si el método existe en el controlador
        if (isset($url[1])) {
            $method = $url[1]; // Ajusta el método en consecuencia, por ejemplo, si los métodos se llaman indexAction o aboutAction
            if (method_exists($this->controller, $method)) {
                $this->method = $method;
                unset($url[1]);
            }
        }
        // Establece los parámetros para llamar al método del controlador
        $this->params = $url ? array_values($url) : [];
        // Llama al método del controlador con los parámetros establecidos
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Función para separar la URL y obtener sus componentes
     * Utiliza $_GET para obtener la URL proporcionada y la divide en segmentos
     * Realiza la limpieza y sanitización de la URL para evitar posibles problemas de seguridad
     * Retorna la URL procesada como un array para su posterior procesamiento
     */
    public function separarURL()
    {
        $url = "";
        if (isset($_GET['url'])) {
            // Elimina los caracteres finales '/' y '\'
            $url = rtrim($_GET['url'], "/");
            $url = rtrim($_GET['url'], "\\");
            // Sanitiza la URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Divide la URL en componentes utilizando '/'
            $url = explode("/", $url);
        }
        return $url; // Devuelve la URL procesada como un array
    }
}

//* Ejemplo de uso de: 
// ? call_user_func_array([$this->controller, $this->method], $this->params);
// class UserController {
//     public function create($name, $email, $password) {
//// Lógica para crear un nuevo usuario
//         echo "Se ha creado un nuevo usuario con nombre: $name, email: $email, y contraseña: $password";
//     }
// }

// //* Instancia de la clase UserController
// $userController = new UserController();

// //* Parámetros para el método create
// $params = array("John Doe", "johndoe@example.com", "secretpassword");

// //* Uso de call_user_func_array para llamar al método create del controlador con los parámetros dados
// call_user_func_array([$userController, 'create'], $params);


?>