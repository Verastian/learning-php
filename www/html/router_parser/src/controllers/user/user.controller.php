<?php
class UserController
{
  private $userService;
  public function __construct()
  {
    $this->userService = new UserService();
  }

  public function form()
  {
    include('src/views/user/user.form.view.php');
  }
  public function index()
  {
    $users = $this->userService->getAllUsers();
    include('src/views/user/user.view.php');

  }
  // * Get User
  public function show()
  {
    // Verifica si el parámetro 'id' está presente en la URL
    if (isset($_GET['id'])) {
      $userId = $_GET['id'];

      $user = $this->userService->getUserById($userId);

      include('src/views/user/user.details.view.php');
    } else {

      echo "No se proporcionó un ID de usuario válido";
    }
  }
  public function create()
  {
    // Iniciar el búfer de salida
    ob_start();
    // validar y sanitizar los valores recibidos de $_POST 
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($name && $email && $password) {
      $this->userService->createUser($name, $email, $password);

      header('Location: /router_parser/user/index');
      exit; // detener la ejecución después de la redirección
    } else {
      echo "Por favor, proporcione todos los valores necesarios para crear un usuario.";
    }
    // Liberar el búfer de salida
    ob_end_flush();
  }

}