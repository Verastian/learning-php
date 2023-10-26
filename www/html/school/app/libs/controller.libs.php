<?php
/**
 * Clase auxiliar controlador
 */
class Controller
{

    function __construct()
    {
    }

    public function model($model = '')
    {
        if (file_exists("../app/models/" . $model . ".model.php")) {
            require_once("../app/models/" . $model . ".model.php");
            return new $model();
        } else {
            die("El modelo " . $model . " no existe.");
        }

    }

    public function view($view = '', $data = [])
    {
        // echo " <br/> Controller lib " . $view . "<br/>";
        if (file_exists("../app/views/" . $view . ".view.php")) {
            require_once("../app/views/" . $view . ".view.php");
        } else {
            die("La view " . $view . " no existe.");
        }

    }
}


?>