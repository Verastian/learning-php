<?php
class HomeController
{
  function index()
  {
    $datos = [
      'USER' => 'Fabitodev',
      'FECHA' => date('Y-m-d')
    ];

    $contenido = TemplateParser::render('home.view.php', $datos, true);
    return $contenido;
  }
}
?>