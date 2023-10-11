<?php
//* variables
$edad = 25;
$nombre = "Juan";
$precio = 19.99;
$activo = true;

echo "IMPRIMIR ------------------------------------- <br><br>";

print $nombre ."<br>";


echo "<br>";
echo "<br>";
// * Concatenar variables
echo "CONCATENAR STRING CON VARIABLES ------------------------------------- <br><br>";
echo "Usando el operador de concatenación (.) <br>";
echo "nombre:" . $nombre . "<br>";

echo "Usando la interpolación de llaves: <br>";
echo "nombre: {$nombre} <br>";

echo "Usando comillas dobles (\"\"): <br>";
echo "precio:, $precio <br>";

echo "<br>";
//* Operadores de concatenación en detalle
// Operador de Concatenación (.):
echo "Operadores de concatenación en detalle (.) y (.=) <br>";
echo "(.) => ";
$apellido = "Pérez";
$nombreCompleto = $nombre . " " . $apellido;
echo $nombreCompleto . "<br>";

echo "(.=) => ";
$mensaje = "Hola, ";
$mensaje .= "Juan.";
echo $mensaje;


echo "<br>";
echo "<br>";
//* Variables de Constante
echo "CONSTANTES  ------------------------------------- <br><br>";


define("PI", 3.14159265359);
// {} en PHP se utiliza principalmente para variables, y no es compatible con constantes definidas con define().
$texto = "El valor de PI es {PI}. <br>";
echo $texto;

$texto = "El valor de PI es " . PI . ". <br>";
echo $texto;

echo "Usando printf (si la constante contiene un valor formateado): <br>";
define("SALUDO", "Hola, %s. <br>");
printf(SALUDO, $nombre);

echo "Usando sprintf (si deseas almacenar el resultado en una variable): <br>";
define("SALUDO2", "Hola, %s. <br>");
$mensaje = sprintf(SALUDO2, $nombre);
echo $mensaje;


//* Variables de Variables
echo "Variables de Variables: <br>";
$nombre = "Juan";
$apellido = "Pérez";
$variableDinamica = "nombre";
echo "{$$variableDinamica} <br>"; // muestra "Juan"

// * Conocer el tipo de variables
// Obtén el tipo de la variable $precio usando gettype()
$tipo = gettype($precio);

// Concatena el valor de $tipo en un texto
$texto = "El tipo de \$precio es: " . $tipo;

// Imprime el texto
echo $texto;



//* variables Super Globales
// $_GET: Almacena datos enviados a través de la URL (consulta).
// $id = $_GET['id'];
// $_POST: Almacena datos enviados a través de formularios HTML (cuerpo de la solicitud HTTP).
// $nombre = $_POST['nombre'];
// $_SESSION: Almacena datos de sesión del usuario.
// session_start();
// $_SESSION['usuario'] = "Juan";

echo "<br>";
echo "<br>";
echo "ARREGLOS:  ------------------------------------- <br><br>";
//* Arreglos Indexado
$colores = array("rojo", "verde", "azul");
// o
$colores2 = ["amarillo", "blanco", "negro"];

$frutas = array("manzana","platano","naranja","piña");
// ó
$frutas2 = ["pera","durazno","uva","frutilla"];

// *arreglo asociativo
// Un arreglo asociativo es aquel en el que los elementos se acceden mediante claves (nombres en lugar de índices numéricos).
$personas = array("nombre" => "Juan", "edad" => 30, "ciudad" => "Madrid");
// ó
$personas2 = ["nombre" => "Maria", "edad" => 25, "ciudad" => "Zaragoza"];

//*  arreglo multidimensional:
$alumnos = array(
    array("nombre" => "Juan", "edad" => 20),
    array("nombre" => "María", "edad" => 22)
);
// ó
$alumnos2 = [
    ["nombre" => "Juan", "edad" => 20],
    ["nombre" => "María", "edad" => 22]
];

$alumnos3=array(
    array('Juan',20),
    array('Maria',22),
    array('Pedro',19,array('matematica',5.7),array('historia',6.2)),
);

// * LENGHT 
echo "Largo de los arreglos: <br>";
echo "El largo del arreglo \$colores es:" . count($colores) . "<br><br>";

// *arreglo vacío
$miArreglo = array();
// ó
$miArreglo = [];

//* arreglo con range()
$numeros = range(1, 10);
// Esto crea un arreglo con los números del 1 al 10.

// * Imprimir
echo "Imprimir arreglos: <br>";
// *Foreach
echo "FOREACH: ";

$concatenacion = "";

foreach ($frutas as $fruta) {
    $concatenacion .= $fruta . ", ";
};
echo "{$concatenacion} <br> ";

$sortArray ='';
$revertSortArray ='';

echo "<br>";

// *Sort
echo "Orden ascendente <br>";
sort($frutas);

foreach ($frutas as $fruta) {
    $sortArray .= $fruta . ",";
};
echo $sortArray;

echo "<br><br>";

// *RevertSort
echo "Orden Descendente <br>";
rsort($frutas);

foreach ($frutas as $fruta) {
    $revertSortArray .= $fruta . ",";
};
echo($revertSortArray);

//* usort()
echo "<br><br>";
echo "ORDENAR ARREGLO CON MÉTODO DE COMPARACION PERSONALIZADA: usort()  ------------------------------------- <br><br>";
class Persona {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}

// Arreglo de objetos Persona
$personas = [
    new Persona("Juan", 30),
    new Persona("María", 22),
    new Persona("Pedro", 19),
];

print_r($personas);
echo "<br>";
// Función de comparación personalizada
function compararPorEdad($a, $b) {
    if ($a->edad == $b->edad) {
        return 0;
    }
    return ($a->edad < $b->edad) ? -1 : 1;
}

// Ordenar el arreglo de personas por edad
usort($personas, 'compararPorEdad');

// Mostrar el arreglo ordenado
foreach ($personas as $persona) {
    echo "Nombre: {$persona->nombre}, Edad: {$persona->edad}<br>";
}


// * Mostrar Clave Valor
echo "<br><br>";
echo "MOSTRAR KEY - VALUE:  ------------------------------------- <br><br>";
foreach ($personas2 as $key => $value) {
    echo $key .":". $value . "<br>";
};


// * acceso a Arreglos multidimensionales
echo "<br> <br> ";
echo "ACCEDIENDO A VALORES DE ARREGLOS MULTIDIMENSIONALES : ------------------------------- <br><br>";
// alumnos
// Acceder al nombre de Juan
echo $alumnos[0]["nombre"] . " "; // Muestra "Juan"
// Acceder a la edad de María
echo $alumnos[1]["edad"] . "<br>"; // Muestra 22

// alumnos2
// Acceder al nombre de Juan
echo $alumnos2[0]["nombre"] . " "; // Muestra "Juan"
// Acceder a la edad de María
echo $alumnos2[1]["edad"] . "<br>"; //

// alumnos3
echo "{$alumnos3[0][0]} ";
echo "{$alumnos3[0][1]} <br>";
echo "{$alumnos3[1][0]} ";
echo "{$alumnos3[1][1]} <br>";
echo "{$alumnos3[2][0]} ";
echo "{$alumnos3[2][1]} - ";
// Acceder a la nota de matemática de Pedro
echo "{$alumnos3[2][2][0]}: "; // 
echo "{$alumnos3[2][2][1]}, "; // 5.7

// Acceder a la nota de historia de Pedro
echo "{$alumnos3[2][3][0]}: "; // 
echo "{$alumnos3[2][3][1]} <br>"; // 6.2

// *CONDICIONALES
echo "<br><br>";
echo "CONDICIONALES:  ------------------------------------- <br><br>";

echo "SHORTHAND IF:";
$sinPrecio=null;
echo "existe precio en la variable \$precio ?: " . (isset($precio) ? "Si" : "No") . "<br>";
echo "existe precio en la variable \$sinPrecio ?: " . (isset($sinPrecio) ? "Si" : "No") . "<br>";

//* FUNCIONES ESPECIALES
echo "<br><br>";
echo "FUNCION VAR DUMP ------------------------------------- <br><br>";

echo "<pre>";
var_dump($nombre);
var_dump($edad);
var_dump($precio);
var_dump($activo);
var_dump($colores);
var_dump($alumnos);
echo "</pre>";

echo "<br><br>";
echo "FUNCION PRINT_R ------------------------------------- <br><br>";


print_r($nombre);
echo "<br>";
print_r($edad);
echo "<br>";
print_r($precio);
echo "<br>";
print_r($activo);
echo "<br>";
print_r($colores);
echo "<br>";
print_r($alumnos);

$coercion ='12';
echo "<br><br>";
echo "Valor de coercion para 12 o '12' <br>";
echo " Con Var_dump " . var_dump($coercion) . "<br>";
echo " Con Print_r " . print_r($coercion) . "<br>";

echo "<br><br>";
echo "FUNCIONES PARA MANIPULAR CADENAS ------------------------------------- <br><br>";

//* strlen()
echo "LONGITUD : strlen()------------------------------------- <br><br>";
$cadena = "Hola, mundo";
$longitud = strlen($cadena);
echo "La longitud de la cadena es: $longitud";

//* str_replace()
echo "<br><br>";
echo "REEMPLAZAR TEXTO: str_replace() ------------------------------------- <br><br>";
$texto = "El rápido zorro marrón";
echo " \"$texto\" <br>";
$nuevoTexto = str_replace("zorro", "perro", $texto);
echo $nuevoTexto;

//* substr()
echo "<br><br>";
echo "OBTENER SUBCADENA: substr() ------------------------------------- <br><br>";
$cadena = "ABCDEFG";
echo "$cadena <br>";
$subcadena = substr($cadena, 1, 3);
echo $subcadena;

//* strtolower()
echo "<br><br>";
echo "MINUSCULA: strtolower() ------------------------------------- <br><br>";
$texto = "Hola, Mundo";
echo "$texto <br>";
$textoMin = strtolower($texto);
echo $textoMin;

//* strtoupper()
echo "<br><br>";
echo "MAYUSCULA: strtoupper() ------------------------------------- <br><br>";
$texto = "hola, mundo";
echo "$texto <br>";
$textoMay = strtoupper($texto);
echo $textoMay;

//* trim()
echo "<br><br>";
echo "ELIMINAR ESPACIOS: trim() ------------------------------------- <br><br>";
$cadena = "   ¡Hola!   ";
echo "espacio".$cadena."espacio <br>";
$cadenaLimpia = trim($cadena);
echo "sin espacio".$cadenaLimpia ."sin espacio";

//* explode()
echo "<br><br>";
echo "DIV CADENA EN UN ARREGLO: explode() ------------------------------------- <br><br>";
$frase = "manzana,plátano,naranja";
echo "$frase <br>";
$frutas = explode(",", $frase);
print_r($frutas);

// * ARRAY METHODS----------------

//* implode() o join()
echo "<br><br>";
echo "UNIR VALORES DE UNA ARREGLO EN UNA CADENA: implode() o join() ------------------------------------- <br><br>";
$frutas = ["manzana", "plátano", "naranja"];
print_r($frutas);
echo "<br>";
$frase = implode(", ", $frutas);
echo $frase;

//* count()
echo "<br><br><br>";
echo "ARRAY METHODS ------------------------------------- <br><br>";
echo "LARGO DE UN ARREGLO: count() ------------------------------------- <br><br>";
$frutas = ["manzana", "plátano", "naranja"];
print_r($frutas);
echo "<br>";
$cantidad = count($frutas);
echo "Hay $cantidad frutas en el arreglo.";$frase = implode(", ", $frutas);

//* array_push()
echo "<br><br>";
echo "AGREGAR ELEMENTOS AL FINAL DE UN ARREGLO: array_push() ------------------------------------- <br><br>";
$colores = ["rojo", "verde"];
print_r($colores);
echo "<br>";
array_push($colores, "azul", "amarillo");
print_r($colores);

//* array_pop()
echo "<br><br>";
echo "ELIMINAR Y OBTENER EL ULTIMO ELEMENTO DE UN ARREGLO: array_pop() ------------------------------------- <br><br>";
$nombres = ["Juan", "María", "Pedro"];
print_r($nombres);
echo "<br>";
$ultimoNombre = array_pop($nombres);
echo "El último nombre eliminado fue: $ultimoNombre";
echo "<br>";
print_r($nombres);

//* array_shift()
echo "<br><br>";
echo "ELIMINAR Y OBTENER EL PRIMER ELEMENTO DE UN ARREGLO: array_shift()  ------------------------------------- <br><br>";
$nombres = ["Juan", "María", "Pedro","José"];
print_r($nombres);
echo "<br>";
$primerNombre = array_shift($nombres);
echo "El primer nombre eliminado fue: $primerNombre";
echo "<br>";
print_r($nombres);

//* array_merge()
echo "<br><br>";
echo "FUNCIONAR DOS ARREGLOS EN UNO: array_merge()  ------------------------------------- <br><br>";
$arreglo1 = ["a", "b"];
$arreglo2 = ["c", "d"];
echo "arreglo 1:";
print_r($arreglo1);
echo "<br>";
echo "arreglo 2:";
print_r($arreglo2);
echo "<br>";
$resultado = array_merge($arreglo1, $arreglo2);
print_r($resultado);

//* array_reverse()
echo "<br><br>";
echo "REVERTIR ORDEN: array_reverse()   ------------------------------------- <br><br>";
$numeros = [1, 2, 3, 4, 5];
print_r($numeros);
echo "<br>";
$numerosInvertidos = array_reverse($numeros);
print_r($numerosInvertidos);

//* array_filter()
echo "<br><br><br>";
echo "FILTRADO :array_filter()   ------------------------------------- <br><br>";
$numeros = [1, 2, 3, 4, 5];
print_r($numeros);
echo "<br>";
echo "filtrar los numeros pares:<br>";

$pares = array_filter($numeros, function ($numero) {
    return $numero % 2 == 0;
});
print_r($pares);

//* in_array()
echo "<br><br>";
echo "BUSAQUEDA :in_array()   ------------------------------------- <br><br>";
$frutas = ["manzana", "plátano", "naranja"];
print_r($frutas);
echo "<br>";
echo "buscar si existe 'platano': <br>";
if (in_array("plátano", $frutas)) {
    echo "Sí, plátano está en el arreglo.";
} else {
    echo "No, plátano no está en el arreglo.";
}

//* array_search()
echo "<br><br>";
echo "BUSAQUEDA Y RETORNO DEL INDICE :array_search()   ------------------------------------- <br><br>";
$colores = ["rojo", "verde", "azul"];
print_r($colores);
echo "<br>";
echo "buscar el indice de 'verde': <br>";
$indice = array_search("verde", $colores);
echo "El color verde está en el índice $indice.";

//* array_map()
echo "<br><br>";
echo "MAPEO DE ARREGLOS :array_map()   ------------------------------------- <br><br>";
$numeros = [1, 2, 3, 4, 5];
print_r($numeros);
echo "<br>";
echo "Aplicar a cada elemento n*n: <br>";
$cuadrados = array_map(function ($numero) {
    return $numero * $numero;
}, $numeros);
print_r($cuadrados);

//* array_unique()
echo "<br><br>";
echo "ELIMINAR VALORES DUPLICADOS :array_unique()   ------------------------------------- <br><br>";
$numeros = [1, 2, 2, 3, 4, 4, 5];
print_r($numeros);
echo "<br>";
$numerosUnicos = array_unique($numeros);
print_r($numerosUnicos);

//* array_slice()
echo "<br><br>";
echo "EXTRAER UN FRAGMENTO :array_slice()   ------------------------------------- <br><br>";
$frutas = ["manzana", "plátano", "naranja", "uva", "pera"];
print_r($frutas);
echo "<br>";
echo "obtener tres elementos a partir de la posicion dos ([1]) del arreglo <br>";
$frutasRebanadas = array_slice($frutas, 1, 3);
print_r($frutasRebanadas);

//* extract()
echo "<br><br>";
echo "IMPORTAR VARIABLES DESDE UN ARREGLO ASOCIATIVO EN EL AMBITO ACTUAL :extract()   ------------------------------------- <br><br>";
$datos = [
    "nombre" => "Juan",
    "edad" => 30,
    "ciudad" => "Madrid"
];
print_r($datos);
echo "<br>";
extract($datos);

echo "Nombre: $nombre, Edad: $edad, Ciudad: $ciudad";


// 
echo "<br><br><br>";
echo "DECLARACIONES DE TIPO ESCALAR CON MODO ESTRICTO:   ------------------------------------- <br><br>";
// Habilitar el modo estricto
//declare(strict_types=1); //se debe declarar en la primera línea del script

// Declaración de tipo escalar para parámetros y valor de retorno
function suma(int $a, int $b) {
    return $a + $b;
}

// Intento de usar un valor no entero
$resultado = suma(5, "3"); // Esto generará un error en tiempo de ejecución si esta habilitado strict_types=1

echo "El resultado de la suma es: $resultado";

echo "<br><br>";
echo "DECLARACIONES DE TIPO DEVOLUCION CON MODO ESTRICTO:   ------------------------------------- <br><br>";
// Habilitar el modo estricto
//declare(strict_types=1); //se debe declarar en la primera línea del script

// Declaración de tipo de retorno
function suma2(int $a, int $b): int {
    return $a + $b;
}

// Llamada a la función
$resultado = suma2(5, 3);

echo "El resultado de la suma es: $resultado";

echo "<br><br>";
echo "OPERADOR DE NAVE ESPACIAL:   ------------------------------------- <br><br>";
// Comparación de números enteros
echo "Comparación de números enteros:<br>";
echo "5 <=> 5: " . (5 <=> 5) . "<br>";  // Igual (0)
echo "5 <=> 3: " . (5 <=> 3) . "<br>";  // Mayor (1)
echo "3 <=> 5: " . (3 <=> 5) . "<br>";  // Menor (-1)

// Comparación de números decimales
echo "<br>Comparación de números decimales:<br>";
echo "2.5 <=> 2.5: " . (2.5 <=> 2.5) . "<br>";   // Igual (0)
echo "2.5 <=> 3.14: " . (2.5 <=> 3.14) . "<br>";  // Menor (-1)
echo "3.14 <=> 2.5: " . (3.14 <=> 2.5) . "<br>";  // Mayor (1)

// Comparación de cadenas
echo "<br>Comparación de cadenas:<br>";
echo '"manzana" <=> "manzana": ' . ("manzana" <=> "manzana") . "<br>";   // Igual (0)
echo '"manzana" <=> "naranja": ' . ("manzana" <=> "naranja") . "<br>";   // Menor (-1)
echo '"naranja" <=> "manzana": ' . ("naranja" <=> "manzana") . "<br>";   // Mayor (1)




echo "<br><br><br>";
//* End
?>