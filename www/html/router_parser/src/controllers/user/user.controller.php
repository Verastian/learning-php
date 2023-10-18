<?php
class UserController
{
  private $userService;
  public function __construct()
  {
    $this->userService = new UserService();
  }
  public function index()
  {
    $users = [
      'ivantheragingpython',
      'fabriiferroni',
      'lexgimipiki',
      'manzdev'
    ];
    $html = implode("", array_map(function ($u) {
      return "<li>$u</li>";
    }, $users));

    $datos = [
      'USER' => 'Fabitodev',
      'USERLIST' => $html
    ];




    $contenido = TemplateParser::render('user.view.php', $datos, true);
    return $contenido;
  }
}