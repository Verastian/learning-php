<?php

class RouteView
{
  private $controllers = [];

  //* Constructor que busca los archivos de controladores en un directorio y los guarda en el array $controllers
  public function __construct()
  {
    // dirname(__DIR__) se utiliza para obtener la ruta del directorio padre del directorio actual. 
    $files = glob(dirname(__DIR__) . "/controllers/*/*controller.php");
    // Itera sobre los archivos de controladores encontrados
    foreach ($files as $file) {
      require($file);
      preg_match("/((\w+)\.controller)\.php$/", $file, $matches);
      $indice = strtolower($matches[2]);
      // Guarda el nombre del controlador en el array de controladores
      $this->controllers[$indice] = $matches[1];
    }
  }

  //* Función para renderizar la sección y el método especificados
  public function render($seccion, $method = 'index')
  {
    $ctrl = ucfirst($seccion); // uppercase first letter
    $class = $ctrl . 'Controller'; // output -> "NameController"
    // Verifica si la clase del controlador existe
    if (
      !isset($this->controllers[$seccion]) ||
      !class_exists($class)
    ) {
      die('La clase ' . $ctrl . 'Controller no existe');
    }
    // Crea una instancia del controlador y verifica si el método especificado existe
    $controller = new $class();
    if (!method_exists($controller, $method)) {
      die('No existe el método ' . $ctrl . 'Controller::' . $method . '( )');
    }
    // Llama al método especificado en el controlador y devuelve el resultado
    return $controller->$method();
  }
}

//* "/((\w+)\.controller)\.php$/"
// expresión regular para el patrón de busqueda "nombre.controller.php"

// (\w+) : coincide con una o más letras, dígitos o guiones bajos, 
// lo que permite nombres en minúsculas.

// \.controller : busca el texto literal ".controller".

// \.php$ : indica que la cadena debe terminar con ".php".


//* preg_match(): 
// en PHP se utiliza para realizar una búsqueda 
// de patrones utilizando expresiones regulares.

//? preg_match($patron, $cadena, $coincidencias);

// Donde:

// $patron : es la expresión regular que se va a buscar.
// $cadena : es la cadena en la que se realizará la búsqueda.
// $coincidencias : es un parámetro opcional en el que se almacenarán 
// las coincidencias encontradas.


//* glob() 
// se utiliza para buscar coincidencias de nombres de archivos 
// o directorios utilizando patrones de búsqueda comodines en un 
// directorio específico. 
// Esta función devuelve un array de nombres de archivos y directorios 
// que coinciden con el patrón de búsqueda proporcionado.
// por ejemplo, para obtener una lista de archivos con una extensión particular,
//  o archivos que siguen un cierto patrón de nombres. 
// También se puede utilizar para buscar archivos y directorios 
// dentro de un directorio específico en el sistema de archivos.

//? glob($patron, $bandera);

// Donde:

// $patron : es el patrón de búsqueda utilizado para encontrar 
// archivos o directorios. Puede incluir comodines como * y ?.
// $bandera : es un parámetro opcional que se utiliza para especificar 
// banderas adicionales que controlan el comportamiento de la búsqueda.