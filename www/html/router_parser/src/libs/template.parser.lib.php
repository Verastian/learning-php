<?php
class TemplateParser
{
  public static function render($template, $datos, $caseInsensitive = false)
  {
    $path = dirname(__DIR__); //obtener el directorio padre del directorio actual.
    $file = "$path/views/$template";
    if (!file_exists($file)) {
      die("El archivo <code>$file</code> es inexistente");
    }

    $ci = $caseInsensitive ? 'i' : '';

    $contenido = file_get_contents($file);
    foreach ($datos as $k => $v) {
      $contenido = preg_replace("/{{\s*(" . $k . ")\s*?}}/$ci", $v, $contenido);
    }

    return $contenido;
  }
}