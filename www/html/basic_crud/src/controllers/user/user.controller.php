<?php
// Iniciar el búfer de salida
ob_start();
class UserController
{
  private $userService;
  public function __construct()
  {
    $this->userService = new UserService();
  }
  // * VIEW FORM
  public function form()
  {
    $id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $currentUser = $id ? $this->userService->getUserById($id) : null;
    include('src/views/user/user.form.view.php');
  }
  // * VIEW INDEX
  public function index()
  {
    $users = $this->userService->getAllUsers();
    include('src/views/user/user.view.php');

  }
  // * VIEW DETAILS
  public function show()
  {
    // Verifica si el parámetro 'id' está presente en la URL
    if (isset($_GET['id'])) {
      // Sanitizar y validar 
      $userId = filter_var($_GET['id'], FILTER_VALIDATE_INT);

      // Verifica si el ID es un entero válido y mayor que 0
      if ($userId && $userId > 0) {
        $user = $this->userService->getUserById($userId);
        include('src/views/user/user.details.view.php');
      } else {
        echo "El ID de usuario proporcionado no es válido.";
      }
    } else {
      echo "No se proporcionó un ID de usuario válido";
    }
  }
  // * CREATE METHOD
  public function create()
  {
    // Validar y sanear los valores de $_POST
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null;
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;

    $errors = array();
    // Validar el formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $nameError = "El formato del correo electrónico no es válido.";
      $errors['email'] = $nameError;

    }
    // Validar el nombre: solo permite letras y espacios
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameError = "El nombre solo debe contener letras y espacios.";
      $errors['name'] = $nameError;

    }

    // Validar la contraseña: al menos 8 caracteres con al menos un número y un carácter especial
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/", $password)) {
      $nameError = "La contraseña debe tener al menos 8 caracteres que incluyan al menos un número y un carácter especial.";
      $errors['password'] = $nameError;
    }
    if (!empty($errors)) {
      $data = array(
        'errors' => $errors,
      );
      // include('src/views/user/user.form.view.php');
      return $data;
      // die();
    } else {

      $result = $this->userService->createUser($name, $email, $password);

      if ($result['success']) {
        header('Location: /basic_crud/user');
        exit;
      } else {
        echo $result['message'];
      }

      // Liberar el búfer de salida
      ob_end_flush();
    }

  }
  // * CREATE UPDATE
  public function update()
  {
    // Validar y sanitizar los valores recibidos de $_POST
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Verificar si los valores son válidos
    if ($id === false || $id === null) {
      echo "ID no válido. No se puede actualizar el usuario.";
      return;
    }
    if ($name === false || $name === null || $email === false || $email === null) {
      echo "Los datos del usuario no son válidos. Por favor, proporcione valores válidos.";
      return;
    }

    // Verificar si el usuario existe antes de intentar actualizarlo
    $existingUser = $this->userService->getUserById($id);
    if (!$existingUser) {
      echo "El usuario con el ID proporcionado no existe. No se puede actualizar.";
      return;
    }

    $updateResult = $this->userService->updateUser($id, $name, $email, $password);

    if ($updateResult['success']) {
      header('Location: /basic_crud/user');
      exit;
    } else {
      echo $updateResult['message'];
    }
    // Liberar el búfer de salida
    ob_end_flush();
  }
  // * DELETE METHOD
  public function delete()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
      // Sanitizar y validar 
      $userId = filter_var($_POST['user_id'], FILTER_VALIDATE_INT);

      // Verifica si el ID es un entero válido y mayor que 0
      if ($userId && $userId > 0) {
        $success = $this->userService->deleteUser($userId);
        if ($success) {
          header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
          echo "Error al eliminar el usuario.";
        }
        // Liberar el búfer de salida
        ob_end_flush();
      } else {
        echo "El ID de usuario proporcionado no es válido.";
      }
    }
  }
}
?>